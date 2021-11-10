<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Update Password</title>

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
         /* Add a green text color and a checkmark when the requirements are right */
         .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -20px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -20px;
            content: "✖";
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
                        alt="ASU logo" class="img-rounded"><br>
                    <b><i class="fa fa-lock"></i> PASSWORD RETRIEVAL PANEL</b></h4> <br><br><br>
                    <p><i>Dear {{ $FindEmail->fullname}} <br> Please Keep safe all sensitive Information.</i></p>
                    </strong>
                
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg"><i class="fa fa-lock"></i> Update Password</p>
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
                <form method="POST" onSubmit="return checkPassword(this)" action="{{ url('user/updatePassword') }}" novalidate>
                    @csrf
                    <i style="display: none">
                    <input type="text" name="email" id="" value="{{ $FindEmail->email}}"></i>
                    <div id="message1"
                                        style="background-color: rgba(236, 228, 228, 0.479); font-size:10px">
                                        <h6 style="color: red">Password must contain the following:</h6>
                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                        <p id="number" class="invalid">A <b>number</b></p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label class="control-label" for="password"><i
                                                class="fa fa-lock"></i>Password:</label>
                                        <div>
                                            <input type="password" class="form-control" id="myInput1" name="password1"
                                                placeholder="Enter Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                            <input type="checkbox" onclick="myFunction()"> Show Password
                                            @if ($errors->has('password'))
                                            <span class="font-weight-bold">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="message2"
                                        style="background-color: rgba(236, 228, 228, 0.479); font-size:10px">
                                        <h6 style="color: red">Password must contain the following:</h6>
                                        <p id="letter2" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital2" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                        <p id="number2" class="invalid">A <b>number</b></p>
                                        <p id="length2" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label class="control-label" for="password"><i
                                                class="fa fa-lock"></i>Confirm Password:</label>
                                        <div>
                                            <input type="password" class="form-control" id="myInput2" name="password"
                                                placeholder="Confirm Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                            <input type="checkbox" onclick="myFunction2()"> Show Password
                                            @if ($errors->has('password'))
                                            <span class="font-weight-bold">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit"  class="btn btn-outline-primary btn-lg btn-block"
                            onclick="matchPassword()"><i class="fa fa-unlock"></i>
                                Retrieve Password</button>
                        </div>
                </form>
                <div class="col-12">
                    <a href="{{ ('/') }}" class="btn btn-outline-info btn-block"><i class="fa fa-home"></i> Go Home</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.social-auth-links -->


            <p class="mb-0">
                <a href="{{ ('/')}}" class="text-center">Register new Account?</a><br>
                <strong style=" color: red"> <i>Note! Please keep required password retrieval deatails safe, its important!</i></strong>
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

    
<!--  // Second password1 fild-->
<script>
    var password1 = document.getElementById("myInput1");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");



    // When the user clicks on the password field, show the message box
    password1.onfocus = function () {
        document.getElementById("message1").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    password1.onblur = function () {
        document.getElementById("message1").style.display = "none";
    }

    // When the user starts to type something inside the password field
    password1.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (password1.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (password1.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (password1.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (password1.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>

<script>
    function myFunction() {
        var x = document.getElementById("myInput1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<!--  // Second password2 fild-->
<script>
    var password2 = document.getElementById("myInput2");
    var letter2 = document.getElementById("letter2");
    var capital2 = document.getElementById("capital2");
    var number2 = document.getElementById("number2");
    var length2 = document.getElementById("length2");



    // When the user clicks on the password field, show the message box
    password2.onfocus = function () {
        document.getElementById("message2").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    password2.onblur = function () {
        document.getElementById("message2").style.display = "none";
    }

    // When the user starts to type something inside the password field
    password2.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (password2.value.match(lowerCaseLetters)) {
            letter2.classList.remove("invalid");
            letter2.classList.add("valid");
        } else {
            letter2.classList.remove("valid");
            letter2.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (password2.value.match(upperCaseLetters)) {
            capital2.classList.remove("invalid");
            capital2.classList.add("valid");
        } else {
            capital2.classList.remove("valid");
            capital2.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (password2.value.match(numbers)) {
            number2.classList.remove("invalid");
            number2.classList.add("valid");
        } else {
            number2.classList.remove("valid");
            number2.classList.add("invalid");
        }

        // Validate length
        if (password2.value.length >= 8) {
            length2.classList.remove("invalid");
            length2.classList.add("valid");
        } else {
            length2.classList.remove("valid");
            length2.classList.add("invalid");
        }
    }
</script>
<script>
    function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script>
    function checkPassword(form) {
        password1 = form.password1.value;
        password = form.password.value;

        // If password not entered 
        if (password1 == '')
            alert("Please enter Password");

        // If confirm password not entered 
        else if (password == '')
            alert("Please enter confirm password");

        // If Not same return False.     
        else if (password1 != password) {
            alert("\nPassword did not match: Please try again...")
            return false;
        }

        // If same return True. 
        else {
            alert("Password Match: Please keep it safe!")
            return true;
        }
    }
</script>
</body>

</html>