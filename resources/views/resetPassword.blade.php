<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Forgotten Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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


        ul {
            display: inline-flex;
            list-style: none;
            color: #fff;
            margin: 0px;

        }


        #twitterb,
        #facebookb,
        #linkedinb,
        #googleb {
            background-color: #205d7a;
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

        #googleb:hover,
        #twitterb:hover,
        #linkedinb:hover,
        #facebookb:hover {
            color: red;
            background-color: #33ff77;
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
                <h4 class="card-title" style="color: RED"><img style="border-radius: 100px; "
                        src="{{ asset('img/ASU_LOGO.png') }}" height="50" width="60" class="img-responsive"
                        alt="ASU logo" class="img-rounded">
                    <b><i class="fa fa-lock"></i> PASSWORD RETRIEVAL PANEL</b>
                    <p><i>Please Provide a Valid Information Below.</i></p>
                    </strong>
                </h4>
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg"><i class="fa fa-envelope"></i> Request For New Password</p>
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
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            placeholder="Registered Email Required">
                        @if ($errors->has('email'))
                        <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('Myname') ? 'has-error' : '' }}">
                        <label for="Myname">Your Security Question</label>
                        <select type="text" name="security_question" id="security_question" class="form-control"
                            value="{{ old('security_question') }}">
                            <option value="">...Select...</option>
                            <option value="What is your mother's name">What is your mother's name
                            </option>
                            <option value="What was your childhood nickname">What was your childhood
                                nickname</option>
                            <option value="What is your street name">What is your street name</option>
                            <option value="What is your favorite food">What is your favorite food
                            </option>
                            <option value="What age you got married">What age you got married</option>

                            @if ($errors->has('security_question'))
                            <span class="font-weight-bold">{{ $errors->first('security_question')
                                }}</span>
                            @endif
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('answers') ? 'has-error' : '' }}">
                        <label for="answers" class="form-label">Answer</label>
                        <input type="answers" name="answers" class="form-control" id="answers"
                            placeholder="E.g My Account Has Been Suspended">
                        @if ($errors->has('answers'))
                        <span class="font-weight-bold">{{ $errors->first('answers') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-unlock"></i>
                                Request For Activation</button>
                        </div>
                </form>
                <div class="col-12">
                    <a href="{{ ('/') }}" class="btn btn-outline-info btn-block"><i class="fa fa-home"></i> Go Home</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.social-auth-links -->


            <p class="mb-0">
                <a href="{{ ('/')}}" class="text-center">Register new Account?</a>
                <strong style=" color: red"> <i>Do No Worry! If peradventure you seemed not remember required information to reset your password!, just get contact with Administrator, You can message throung HomePage Query Box or call numbers beside Thanks.</i></strong>
            </p><br>

            <p style="color: black"><b> Place a call for swift response <br> <i class="fa fa-phone"></i> 08162291993</b>
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