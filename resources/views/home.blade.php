<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Dashboard</title>
    @include('layouts.styles')
    <style>
        .help-block {
            color: #dc3545;
        }

        .has-error {
            color: #dc3545;
        }

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

        .card:hover {
            box-shadow: 0px 2px 7px 2px gray;
        }

    </style>
</head>

<body style="padding-top: 100px">
    @include('layouts.header')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @if (Session::has('user'))
                    <div class="alert alert-success" style="margin-right:300px">
                        Online
                    </div>
                @endif
            </div>
            <div class="col-sm-6">

                <form method="POST" action="{{ url('user/image-upload') }}" id="logout" novalidate>
                    <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"> <a
                            style="color: white; text-decoration:none" href="/user/image-upload"> Upload Profile
                            Picture</a></button>
                </form>
                
                
            </div>
        </div>
        <div class="row mt-12">
            <div class="col-md-12 offset-col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">WELCOME TO HOME</h4>

                    </div>
                    <div class="card-body">
                        <!--NOTIFICATION STARTS HERE-->
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close"
                                    data-dismiss="alert">×</button><strong>{{ session('success') }}</strong>
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close"
                                    data-dismiss="alert">×</button><strong>{{ session('error') }}</strong>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><span style="color: red">{{ $error }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!--NOTIFICATION ENDS HERE-->
                        <div class="row">
                            <div class="col-sm-6">
                                <section class="blog-page">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="blog-item">
                                                    <div class="date"> <span style="float: left"
                                                            class="badge badge-info pull-right">You Are Active just
                                                            {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                                        </span><br></div>
                                                    <div class="down-content">
                                                        <img src="{{ asset($user->picture) }}" class="img-thumbnail"
                                                            width="75" />
                                                        <div class="row">

                                                            <details>
                                                                <summary style="background-color:red; color:#fff;">
                                                                    ...See <i class="fa fa-eye"></i> You
                                                                    About info </summary>
                                                                <table class="table"
                                                                    style="padding-left: 20px; margin-left: 30px;">

                                                                    <tr>
                                                                        <th>
                                                                            FULL NAME:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->fullname }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            USER NAME:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->username }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            EMAIL:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->email }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            GENDER:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->gender }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            DATE OF BIRTH:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->date_of_birth }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            COMPOUND:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->compound }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>
                                                                            SCHOOL:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->institution }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            PLACE OF RESIDENCE:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->place_of_residence }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>
                                                                            MARITAL STATUS:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->marital_status }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            PHONE NUMBER:
                                                                        </th>
                                                                        <td>
                                                                            {{ $user->phone }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <button class="btn btn-info" style="float: right; background-color: #4CAF50;
                                                  color: white;
                                                  padding: 14px 20px;
                                                  margin: 8px 0;
                                                  border: none;
                                                  cursor: pointer;
                                                  width: 100%;"> <a style="text-decoration: none; color: #fff; "
                                                                                    href={{ url('user/Edit_profile') }}>Edit/Update</a></button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>

                                                                            <details>
                                                                                <summary>
                                                                                    <center>
                                                                                        <p
                                                                                            style="text-align: center;color: red">
                                                                                            <i class="fa fa-eye"></i>
                                                                                            Password Recovery Details
                                                                                </summary>
                                                                                <hr>
                                                                                </p>
                                                                                </center>
                                                                                <table>

                                                                                    <tr>
                                                                                        <td style="color: red">

                                                                                            Security Question
                                                                                        </td>
                                                                                        <td> {{ $user->security_question }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="color: red">
                                                                                            Answer
                                                                                        </td>
                                                                                        <td> {{ $user->answers }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </details>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </details>
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
                                <form method="POST" action="{{ url('user/posting') }}">
                                    @csrf
                                    <div id="comment" class="tabcontent">
                                        <h3>Post Comment Here </h3>
                                        <div class="form-group {{ $errors->has('posting') ? 'has-error' : '' }}">
                                            <textarea id="editor" cols="40" rows="4" name="posting"
                                                placeholder="What's on your mind..."></textarea><br>
                                            @if ($errors->has('posting'))
                                                <span class="font-weight-bold">{{ $errors->first('posting') }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <button type="submit" id="postbutton" novallidate>POST</button>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="{{ url('user/UploadImagePost') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div id="picture" class="tabcontent">
                                        <h3>Post Pictures Here</h3>
                                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

                                            <input type="file" name="image"><br>
                                            @if ($errors->has('image'))
                                                <span class="font-weight-bold">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div
                                            class="form-group {{ $errors->has('ImageCaption') ? 'has-error' : '' }}">

                                            <textarea id="text" cols="40" rows="4" name="ImageCaption"
                                                placeholder="Image Caption..."></textarea><br>
                                            @if ($errors->has('ImageCaption'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('ImageCaption') }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <button type="submit" id="postbutton" novallidate>POST</button>

                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="{{ url('user/UploadVideoPost') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div id="video" class="tabcontent">
                                        <h3>Post Video Here</h3>
                                        <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                                            <input type="file" name="video">
                                            @if ($errors->has('Video'))
                                                <span class="font-weight-bold">{{ $errors->first('Video') }}</span>
                                            @endif
                                        </div>
                                        <div
                                            class="form-group {{ $errors->has('VideoCaption') ? 'has-error' : '' }}">
                                            <textarea id="text" cols="40" rows="4" name="VideoCaption"
                                                placeholder="Video Caption..."></textarea><br>
                                            @if ($errors->has('VideoCaption'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('VideoCaption') }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <button type="submit" id="postbutton" novallidate>POST</button>

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
        <div class="row">
            <!--SEARCH HERE-->
            @include('searchUsers')
            <!---SEARXH ENDS HERE--->
            <div class="col-lg-12 col-md-12" style="padding-top: 20px">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">User's Latest Post
                        </h3>
                        <h3 class="pull-right"><a style="float: right" class="btn btn-primary btn-sm"
                                href="{{ url('user/onlineUsers') }}">Chat Here
                            </a></h3>
                    </div>
                    <div class="card-body" style="">
                        <div class="row el-element-overlay">
                            @foreach ($All_post as $item)
                                <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                    <div class="card bg-white card-hover">
                                        <div class="card-header">
                                            @if ($user->id == $item->userId)
                                                <a title="Click to Delete"  onclick="return confirm('Are you sure you want to delete this {{ $item->username }}?')"
                                                    href="{{ url('user/delete_my_post/' . $item->id) }}">
                                                    <button id="delete-btn" value="0329/133"
                                                        class="btn btn-outline-danger btn-sm">
                                                        <i class="fa fa-trash font-weight-bolder"></i>
                                                    </button>
                                                </a>
                                                <a title="Click to Edit"
                                                    href="{{ url('user/editPost/' . $item->id) }}">
                                                    <button id="edit-btn" value="0329/133"
                                                        class="btn btn-outline-info btn-sm">
                                                        <i class="fa fa-edit font-weight-bolder"></i>
                                                    </button>
                                                </a>
                                            @endif
                                            <span class="badge badge-success pull-right">
                                                {{ strtoupper($item->username) }}</span>
                                            <span style="float: right" class="badge badge-info pull-right">
                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </span>
                                        </div>

                                        <div class="card-title">
                                            <p
                                                style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">

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
                                            </p>
                                        </div>


                                        <div class="card-footer">
                                            @php
                                                $isLiked = $item->likes
                                                    ->whereIn('post_id', [$item->id])
                                                    ->whereIn('user_id', [$user->id])
                                                    ->count();
                                            @endphp

                                            @if ($isLiked)
                                                <a title="Click to UnLike" href="{{ url('user/like/' . $item->id) }}"
                                                    class="btn btn-primary btn-sm pull-left">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    <span>{{ $item->likes->count() }}</span>
                                                </a>
                                            @else
                                                <a title="Click to like" href="{{ url('user/unlike/' . $item->id) }}"
                                                    class="btn btn-inverse btn-sm pull-left">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    <span>{{ $item->likes->count() }}</span>
                                                </a>
                                            @endif
                                            
                                            <a title="Click to comment"
                                                href="{{ url('user/commentPage/' . $item->id) }}"
                                                class="btn btn-outline-info btn-sm pull-left">
                                                <i class="fa fa-comments"></i>
                                                <span>{{ $whosComment }}</span>
                                            </a>
                                            <a href="{{ url('user/view_user_profile/' . $item->userId) }}"
                                                class="btn btn-outline-primary btn-sm pull-right">
                                                PROFILE<i class="fa fa-eye"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $All_post->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    </div>
    @include('layouts.footer')
    @include('layouts.scripts')
    <script>
        $(document).ready(function() {
            $('#editor').val('')
        })

        $(document).on('click', '.button', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/destroy') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            //
                        }
                    });
                });
        });

    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
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

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
     <script>
        const Toast = Swal.mixin({
          toast: true,
          position: '',
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        Toast.fire({
          icon: 'success',
          title: 'WELCOME!, Your Session is still on, Dont forget to Log out'
        })
      </script>
</body>

</html>
