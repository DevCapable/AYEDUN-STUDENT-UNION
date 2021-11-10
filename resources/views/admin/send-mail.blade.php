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

    summary {
      background-color: greenyellow;
      font-size: 15px;
    }

    summary:hover {
      color: rgb(240, 218, 218);
      background-color: green;
    }
  </style>
</head>

<body style="padding-top: 1px">
  <!-- sidebar -->
  @include('admin.layouts.sidebar')
  <!-- Navbar -->
  <!---NAVBAR HERE-->
  @include('admin.layouts.navbar')
  <!-- NAVBAR ENDS HERE--->
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('send-mail-to-all-users') }}" class="btn btn-primary btn-block mb-3"><i class="far fa-envelope"></i> Send Mail To All Users <i class="fa fa-arrow-alt-circle-right" ></i></a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="{{ url('administrator/Inbox')}}" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">{{ $AllMessage }}</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{ url('administrator/sent-mail')}}" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                    <span class="badge bg-primary float-right">{{ $AllSentMessages }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('administrator/sent-mail')}}" class="nav-link">
                    <i class="far fa-envelope"></i> Sent Mails
                    <span class="badge bg-primary float-right">{{ $sentMail }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>

              </ul>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Mail</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
             <!-- FORM TO SEND ALL USERS A COSTUMIZED MAIL -->
            <form method="POST" action="{{ url('administrator/send-mail') }}" novalidate>
              @csrf
              <div class="card-body p-0">
                <div class="mailbox-controls">

                </div>
                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped">
                    <tbody>
                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email 1</label>
                        <select type="text" name="email1" id="email" class="form-control"
                          value="{{ old('email') }}">
                          <option value="">...Select...</option>
                          @foreach ($getUsers as $users)

                          <option value=" {{ $users ->email}}"> {{ $users
                            ->email}}</option>

                          @endforeach
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email 2</label>
                        <select type="text" name="email2" id="email" class="form-control"
                          value="{{ old('email') }}">
                          <option value="">...Select...</option>
                          @foreach ($getUsers as $users)

                          <option value=" {{ $users ->email}}"> {{ $users
                            ->email}}</option>

                          @endforeach
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email 3</label>
                        <select type="text" name="email3" id="email" class="form-control"
                          value="{{ old('email') }}">
                          <option value="">...Select...</option>
                          @foreach ($getUsers as $users)

                          <option value=" {{ $users ->email}}"> {{ $users
                            ->email}}</option>

                          @endforeach
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email 4</label>
                        <select type="text" name="email4" id="email" class="form-control"
                          value="{{ old('email') }}">
                          <option value="">...Select...</option>
                          @foreach ($getUsers as $users)

                          <option value=" {{ $users ->email}}"> {{ $users
                            ->email}}</option>

                          @endforeach
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email 5</label>
                        <select type="text" name="email5" id="email" class="form-control"
                          value="{{ old('email') }}">
                          <option value="">...Select...</option>
                          @foreach ($getUsers as $users)

                          <option value=" {{ $users ->email}}"> {{ $users
                            ->email}}</option>

                          @endforeach
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Type Email Here</label>
                        <input type="text" name="email6" id="" class="form-control" placeholder="Type new email here">
                          @if ($errors->has('email'))
                          <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                          @endif
                        </select>
                      </div>

                      <div class="form-group {{ $errors->has('tilte') ? 'has-error' : '' }}">
                        <div>
                          <label for="title">Title</label><br>
                          <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                        @if ($errors->has('title'))
                        <span class="font-weight-bold">{{ $errors->first('title') }}</span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                        <div>
                          <label for="message">Mail</label><br>
                          <textarea id="text" rows="4" name="message" placeholder="Type Message Here..."
                            style="width: 100%"></textarea>
                        </div>
                        @if ($errors->has('message'))
                        <span class="font-weight-bold">{{ $errors->first('message') }}</span>
                        @endif
                      </div>
                    </tbody>
                  </table>
                  <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
              </div>
              <div class="row">
                <div class="col-md-12">

                  <button type="submit" class="btn btn-outline-primary btn-lg btn-block"> Send Mail</button>
                </div>
              </div>
            </form>
            <!-- /.card-body -->
           
           





            <!-- /.float-right -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  @include('admin.layouts.footer')
  @include('admin.layouts.scripts')
  <script>
    $(function () {
      //Enable check and uncheck all functionality
      $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      })

      //Handle starring for font awesome
      $('.mailbox-star').click(function (e) {
        e.preventDefault()
        //detect type
        var $this = $(this).find('a > i')
        var fa = $this.hasClass('fa')

        //Switch states
        if (fa) {
          $this.toggleClass('fa-star')
          $this.toggleClass('fa-star-o')
        }
      })
    })
  </script>
</body>

</html>