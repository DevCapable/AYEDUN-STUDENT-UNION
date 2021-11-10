
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css')}}">
  <style>
    .help-block {
        color: #dc3545;
    }

    .has-error {
        color: #dc3545;
    }
    
    #twitter,
    #facebook,
    #linkedin,
    #google {
        background-color: #205d7a;
        color: #fff;
        width: 40px;
        height: 40px;
        top: 52px;
        border-radius: 40px;
        font-size: 25px;
        text-align: center;
        margin-right: 0px;
        padding-top: 02%;
        transition: all 0.2s eas-in-out;
    }

    #facebook:hover,
    #twitter:hover,
    #linkedin:hover,
    #google:hover {
        opacity: .7;


    }

    #twitter {
        background-color: #00aced;

    }

    #google {
        background-color: #dd4b39;

    }

    #facebook {
        background-color: #3b5998;

    }

    #linkedin {
        background-color: #007bb6;

    }

    #dropdown {
        background-color: #1f2e2e;
        color: #fff;
        border-bottom: 1px dotted #fff;
    }

    #dropdown:hover {
        color: #1affd1;
    }

    /* MY SIDEBAR*/
    #mySidenav a {
        position: fixed;
        left: -80px;
        transition: 0.3s;
        padding: 15px;
        padding-right: 20px;
        padding-left: 2px;
        z-index: 1;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
    }

    #mySidenav a:hover {
        left: 0;
    }

    #about {
        top: 140px;
        background-color: #4CAF50;
    }

    #map {
        top: 200px;
        background-color: #2196F3;
    }

    #projects {
        top: 260px;
        background-color: #ff66d9;
    }

    #developer {
        top: 320px;
        background-color: #f44336;
    }

    #contact {
        top: 380px;
        background-color: #555
    }
    ul {
        display: inline-flex;
        list-style: none;
        color: #fff;
        margin: 0px;
    
    }
    
    
    #twitterb, #facebookb, #linkedinb, #googleb {
        background-color:#205d7a;
        color: #fff;
        width: 40px;
        height: 40px;
        top: 50px;
        border-radius: 40px;
        font-size: 25px;
        text-align: center;
        margin-right: 0px;
        padding-top: 15%;
        transition: all 0.2s eas-in-out;       
    }
    #googleb:hover , #twitterb:hover , #linkedinb:hover , #facebookb:hover {
        color: red; background-color: #33ff77;
    }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-header">
        <h4 class="card-title"><img style="border-radius: 100px; " src="img/ASU_LOGO.png" height="50" width="60"
            class="img-responsive" alt="ASU logo" class="img-rounded">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>LOG IN</strong></h4>
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if (Session::has('success'))
      <div class="alert alert-success">
          <span>{{ session('success') }}</span>
      </div>
  @endif
  @if (Session::has('error'))
      <div class="alert alert-danger">
          <span>{{ session('error') }}</span>
      </div>
  @endif
      <form method="POST" novalidate>
        @csrf
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="font-weight-bold">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @if ($errors->has('password'))
                <span class="font-weight-bold">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="{{ url('user/resetPassword')}}" class="text-center">I have Forgotten Password</a>
      </p>
      <p class="mb-0">
        <a href="{{ ('/register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<br><br>
<!-- footer starts here-->
@extends('layouts.footer')
<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


