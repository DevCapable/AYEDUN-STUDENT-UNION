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
<body class="hold-transition login-page" style="padding-top: 200px">
    
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-header">
        <h4 class="card-title"style="color: RED"><img style="border-radius: 100px; " src="{{ asset('img/ASU_LOGO.png') }}" height="50" width="60"
            class="img-responsive" alt="ASU logo" class="img-rounded">
            <b><i class="fa fa-lock" ></i> ACCOUNT SUSPENDED</b>
    <p><i>Please Request For Activation To Avoid Total Deletion.</i></p>
    YOU ARE SEEING THIS AS A RESULT OF SYSTEM RULES BEING VOILATED.</strong></h4>
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg"><i class="fa fa-envelope"></i> Send Administrator a Complaint</p>
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
            <label for="email">Registered Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Registered Email Required">
            @if ($errors->has('email'))
                <span class="font-weight-bold">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('Myname') ? 'has-error' : '' }}">
            <label for="Myname">Registered Username</label>
            <input type="text" name="Myname" id="Myname" class="form-control" value="{{ old('Myname') }}" placeholder="Registered username Required">
            @if ($errors->has('Myname'))
                <span class="font-weight-bold">{{ $errors->first('Myname') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
            <label for="reason" class="form-label">Reasons</label>
            <input type="reason" name="reason" class="form-control" id="reason" placeholder="E.g My Account Has Been Suspended">
            @if ($errors->has('reason'))
                <span class="font-weight-bold">{{ $errors->first('reason') }}</span>
            @endif
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-unlock" ></i> Request For Activation</button>
          </div>
        </form>
        <div class="col-12">
         <a href="{{ ('/') }}" class="btn btn-outline-info btn-block"><i class="fa fa-home" ></i> Go Home</a>
        </div>
          <!-- /.col -->
        </div>
      <!-- /.social-auth-links -->

    
      <p class="mb-0">
        <a href="{{ ('/')}}" class="text-center">Register new Account?</a>
        <strong style=" color: red"> <i>Note! You have maximum of 3 weeks to request for Activation failure to do so liable for total deletion of your Account</i></strong>
      </p><br>
     
      <p style="color: black"><b> Place a call for swift response <br> <i class="fa fa-phone"></i> 08162291993</b></p>
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
