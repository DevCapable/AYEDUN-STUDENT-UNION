<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin | Dashboard</title>

  @include('admin.layouts.styles')
  <style>
    .help-block {
      color: #dc3545;
    }

    .has-error {
      color: #dc3545;
    }



    body {
      font-family: Arial;
    }

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
  </style>
  <style>
    #postbutton {
      background-color: green;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      font-size: 14;
      font-weight: bold;
    }

    #postbutton:hover {
      background-color: #00ffff;
      color: red;
      font-size: 14;
      font-weight: bold;
    }


    .card:hover {
      box-shadow: 0px 2px 7px 2px gray;
    }
  </style>
</head>

<body style="padding-top: 1px">
  @include('admin.layouts.sidebar')
  
    <!---NAVBAR HERE-->
    @include('admin.layouts.navbar')
   <!-- NAVBAR ENDS HERE--->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
             &nbsp;&nbsp;&nbsp;
              <form method="POST" action="{{ url('admin/logout') }}" novalidate>
                @csrf
                <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"><span class="iconify"
                    data-icon="fa-sign-out" data-inline="false"></span> </button>
              </form>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">

      <div class="row mt-12">
        <div class="col-md-12 offset-col-md-4">
          <div class="card">


            <div class="card-body">
              @if (Session::has('success'))
              <div class="alert alert-success">
                <span>{{ session('success') }}</span>
              </div>
              @endif
              @if (Session::has('danger'))
              <div class="alert alert-danger">
                <span>{{ session('danger') }}</span>
              </div>
              @endif
              
              @include('admin.search-user')
              <div class="row">
                <div class="col-sm-6">
                  <section class="blog-page">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <div class="blog-item"> <img  src="{{ asset('img/ASU_LOGO.png') }}" height="200" width="230" class="img-responsive" alt="Admin logo" class="img-rounded">
                            <div class="date"></div>
                            <div class="down-content">
                              <div class="row">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'comment')"><i id="post"
                        class="fa fa-comments"></i></button>
                    <button class="tablinks" onclick="openCity(event, 'picture')"><i id="post"
                        class="fa fa-image"></i></button>
                    <button class="tablinks" onclick="openCity(event, 'video')"><i id="post"
                        class="fa fa-video"></i></button>
                    <div style="font-size: 12px;"><br><i class="fa fa-arrow-left"></i> What's on your
                      mind? Click on Tabs</div>
                  </div>
                  <form method="POST" action="{{ url('administrator/postingPublication') }}">
                    @csrf
                    <div id="comment" class="tabcontent">
                      <h3>Publish Comment Here </h3>
                      <div class="form-group {{ $errors->has('posting') ? 'has-error' : '' }}">
                        <textarea id="editor" cols="40" rows="4" name="posting"
                          placeholder="What's on your mind..."></textarea><br>
                        @if ($errors->has('posting'))
                        <span class="font-weight-bold">{{ $errors->first('posting') }}</span>
                        @endif
                      </div>
                      <div>
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>
                      </div>
                    </div>
                  </form>
                  <form method="POST" action="{{ url('administrator/imagePublication') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="picture" class="tabcontent">
                      <h3>Poublish Pictures Here</h3>
                      <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

                        <input type="file" name="image"><br>
                        @if ($errors->has('image'))
                        <span class="font-weight-bold">{{ $errors->first('image') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('ImageCaption') ? 'has-error' : '' }}">

                        <textarea id="text" cols="40" rows="4" name="imageCaption"
                          placeholder="Image Caption..."></textarea><br>
                        @if ($errors->has('ImageCaption'))
                        <span class="font-weight-bold">{{ $errors->first('ImageCaption') }}</span>
                        @endif
                      </div>
                      <div>
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>

                      </div>
                    </div>
                  </form>
                  <form method="POST" action="{{ url('administrator/videoPublication') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="video" class="tabcontent">
                      <h3>Publish Video Here</h3>
                      <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                        <input type="file" name="video">
                        @if ($errors->has('Video'))
                        <span class="font-weight-bold">{{ $errors->first('Video') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('videoCaption') ? 'has-error' : '' }}">
                        <textarea id="text" cols="40" rows="4" name="VideoCaption"
                          placeholder="Video Caption..."></textarea><br>
                        @if ($errors->has('VideoCaption'))
                        <span class="font-weight-bold">{{ $errors->first('VideoCaption') }}</span>
                        @endif
                      </div>
                      <div>
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>

                      </div>
                    </div>
                  </form>
                  <!--- end of posting tabs-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalStudent }}</h3>

                <p style="font-size:20px;font-weight:bold">STUDENTS</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ url('administrator/Manage_Users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalStakekholder }}</h3>

                <p style="font-size:12px;font-weight:bold">STAKEHOLDERS/SPONSORS</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ url('administrator/manageAllStakeHolders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalGuest }}</h3>

                <p style="font-size:20px;font-weight:bold">GUEST </p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ url('administrator/manageAllGuest') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalCompound }}</h3>

                <p style="font-size:20px;font-weight:bold">COMPOUNDS</p>
              </div>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
              <a href="{{ url('administrator/Manage_Compounds')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

           
      <div class="row">
    
        <div class="col-lg-12 col-md-12" style="padding-top: 20px">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">ADMINISTRATOR PUBLICATION
                  </h3>
                  <h3 class="pull-right"><a style="float: right" class="btn btn-primary btn-sm"
                          href="{{ url('administrator/manageAllPublictions') }}">Manage Your Publications here
                      </a></h3>
              </div>
              <div class="card-body" style="overflow-x:auto;">
                  <div class="row el-element-overlay">
                      @foreach ($AdminPosts as $item)
                          <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                              <div class="card bg-white card-hover">
                                  <div class="card-header">              
                                      <span style="float: right" class="badge badge-info pull-right">
                                          {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                      </span>
                                  </div>

                                  <div class="card-title">
                                      <div
                                          style=" text-align: center; color: black; font-family: Arial, Helvetica, sans-serif;">

                                          @if ($item->video == '' && $item->image == '')
                                              {!! $item->posting !!}
                                          @elseif ($item->posting =='' && $item->video=='')
                                              <img src="{{ asset($item->image) }}" class="img-thumbnail"
                                                  width="100%" height="190%" />
                                              <p
                                                  style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                  {!! $item->ImageCaption !!}
                                              </p>
                                          @elseif ($item->posting =='' && $item->image =='')
                                              <video width="100%" height="100%" controls>
                                                  <source src="{{ asset($item->video) }}" type="video/mp4">
                                              </video>
                                              <p
                                                  style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                  {!! $item->VideoCaption !!}
                                              </p>
                                          @endif
                                      </div>
                                  </div>


                                  <div class="card-footer">
                                      <a onclick="return confirm('Are you sure you want to delete this {{ $item->adminName }}?')"  href="{{ url('administrator/deletePublication', $item->id) }}"
                                          class="btn btn-outline-danger btn-sm pull-right">
                                          DELETE <i class="fa fa-trash"></i>
                                      </a>
                                      <a title="Click to Edit"
                                      href="{{ url('administrator/editPublication/' . $item->id) }}">
                                          <button id="edit-btn" value="0329/133"
                                              class="btn btn-outline-info btn-sm">
                                              EDIT <i class="fa fa-edit font-weight-bolder"></i>
                                          </button>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
              <div class="card-footer">
                  <div class="card card-body bg-transparent">
                      {{ $AdminPosts->links() }}
                  </div>
              </div>
          </div>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- ============================================================== -->
  </div>

  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->
  </div>
  </div>
  </div>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }


  </script>



  @include('admin.layouts.footer')
  @include('admin.layouts.scripts')

</body>

</html>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  Toast.fire({
    icon: 'success',
    title: 'Administrator! Welcome Back home'
  })
</script>