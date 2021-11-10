<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    @include('layouts.styles')
    <style>
        .help-block {
            color: #dc3545;
        }

        .has-error {
            color: #dc3545;
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

<body>
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('img/top-image.png') }}" height="60px" width="100%" class="img-responsive"
                alt="Cinque Terre" class="img-rounded">
        </div>
    </div>
    <div class="container">
        <div class="row mt-12">
            <div class="col-md-12 offset-col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><img style="border-radius: 100px; " src="img/ASU_LOGO.png" height="50"
                                width="60" class="img-responsive" alt="ASU logo" class="img-rounded">Registration Form
                        </h4>
                        <strong style="color: red">Note! <i>This Reg. Page is Strictly For Stakeholders/Sponshors
                                only</i></strong>
                    </div>
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
                    <div class="card-body">
                        <form method="POST" onSubmit="return checkPassword(this)" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('ID_NUMBER') ? 'has-error' : '' }}">
                                        <label for="ID_NUMBER">ID Number</label>
                                        <input type="text" name="ID_NUMBER" id="ID_NUMBER" class="form-control"
                                            value="{{ 'ASU'.Time().'@40'}}" readonly>
                                        @if ($errors->has('ID_NUMBER'))
                                        <span class="font-weight-bold">{{ $errors->first('ID_NUMBER') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('stakeholder') ? 'has-error' : '' }}">
                                        <input type="text" name="stake_holder" id="stakeholder" class="form-control"
                                            value="{{" STAKEHOLDER" }}" readonly>
                                        @if ($errors->has('stakeholder'))
                                        <span class="font-weight-bold">{{ $errors->first('stakeholder') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control"
                                            value="{{ old('fullname') }}" placeholder="Enter your active phone">
                                        @if ($errors->has('fullname'))
                                        <span class="font-weight-bold">{{ $errors->first('fullname') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ old('email') }}" placeholder="Enter your Email">
                                        @if ($errors->has('email'))
                                        <span class="font-weight-bold">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ old('username') }}" placeholder="Enter your Username">
                                        @if ($errors->has('username'))
                                        <span class="font-weight-bold">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <!-- ADDITIONAL FILEDS STARTS HERE-->

                                    <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                        <label for="date_of_birth">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                            value="{{ old('date_of_birth') }}" placeholder="Enter your date of birth">
                                        @if ($errors->has('date_of_birth'))
                                        <span class="font-weight-bold">{{ $errors->first('date_of_birth') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('compound') ? 'has-error' : '' }}">
                                        <label for="compound">Compound</label>
                                        <select type="text" name="compound" id="compound" class="form-control"
                                            value="{{ old('compound') }}">
                                            <option value="">...Select...</option>
                                            @foreach ($getCompound as $compound)

                                            <option value=" {{ $compound ->Name_of_Compound}}"> {{ $compound
                                                ->Name_of_Compound}}</option>

                                            @endforeach
                                            @if ($errors->has('compound'))
                                            <span class="font-weight-bold">{{ $errors->first('compound') }}</span>
                                            @endif
                                        </select>
                                    </div>


                                    <div class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">
                                        <label for="institution">Institution</label>
                                        <select type="text" name="institution" id="institution" class="form-control"
                                            value="{{ old('institution') }}">
                                            <option value="">...Select...</option>
                                            @foreach ($listOfSchools as $listOfSchool)

                                            <option value=" {{ $listOfSchool ->ListSchools}}"> {{ $listOfSchool
                                                ->ListSchools}}</option>

                                            @endforeach
                                            @if ($errors->has('institution'))
                                            <span class="font-weight-bold">{{ $errors->first('institution') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('place_of_residence') ? 'has-error' : '' }}">
                                        <label for="place_of_residence">Place Of Residence</label>
                                        <input type="text" name="place_of_residence" id="place_of_residence"
                                            class="form-control" value="{{ old('place_of_residence') }}"
                                            placeholder="Enter your place of residence ">
                                        @if ($errors->has('place_of_residence'))
                                        <span class="font-weight-bold">{{ $errors->first('place_of_residence') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                                        <label for="marital_status">Marital Status</label>
                                        <select type="text" name="marital_status" id="marital_status"
                                            class="form-control" value="{{ old('marital_status') }}">
                                            <option value="">...Select...</option>
                                            <option value="Married">Married</option>
                                            <option value="Single">Single</option>
                                            <option value="Divorce">Divorce</option>
                                            <option value="Can't Say">Can't Say</option>
                                            @if ($errors->has('marital_status'))
                                            <span class="font-weight-bold">{{ $errors->first('marital_status') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('post_held') ? 'has-error' : '' }}">
                                        <label for="post_held">Post Held</label>
                                        <select type="text" name="post_held" id="post_held" class="form-control"
                                            value="{{ old('post_held') }}">
                                            <option value="">...Select...</option>
                                            <option value="PRESIDENT">PRESIDENT</option>
                                            <option value="VICE PRESIDENT"> VICE PRESIDENT</option>
                                            <option value=" GENERAL SECRETARY">GENERAL SECRETARY</option>
                                            <option value="HONORABLE NAEKSS">HONORABLE NAEKSS</option>
                                            <option value="A.G.S">A.G.S</option>
                                            <option value="P.R.O 1">P.R.O</option>
                                            <option value="P.R.O 2">P.R.O 2</option>
                                            <option value="SPORT DIRECTOR">SPORT DIRECTOR</option>
                                            <option value="SPORT 2">SPORT 2</option>
                                            <option value="WELFARE">WELFARE</option>
                                            <option value="LIBRARY">LIBRARY</option>
                                            <option value="MISS ASU">MISS ASU</option>
                                            <option value="SOCIAL DIRECTOR">SOCIAL DIRECTOR</option>
                                            <option value="SOCIAL 2">SOCIAL 2</option>
                                            @if ($errors->has('post_held'))
                                            <span class="font-weight-bold">{{ $errors->first('post_held') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('tenure_year_from') ? 'has-error' : '' }}">
                                        <label for="tenure_year_from">Year tenure from</label>
                                        <input type="date" name="tenure_year_from" id="tenure_year_from"
                                            class="form-control" value="{{ old('tenure_year_from') }}">
                                        @if ($errors->has('tenure_year_from'))
                                        <span class="font-weight-bold">{{ $errors->first('tenure_year_from') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('tenure_year_to') ? 'has-error' : '' }}">
                                        <label for="tenure_year_to">Year tenure to</label>
                                        <input type="date" name="tenure_year_to" id="tenure_year_to"
                                            class="form-control" value="{{ old('tenure_year_to') }}">
                                        @if ($errors->has('tenure_year_to'))
                                        <span class="font-weight-bold">{{ $errors->first('tenure_year_to') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('security_question') ? 'has-error' : '' }}">
                                        <label for="security_question">security_question</label>
                                        <select type="text" name="security_question" id="security_question"
                                            class="form-control" value="{{ old('security_question') }}">
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
                                        <label for="answers">answers</label>
                                        <input type="text" name="answers" id="answers" class="form-control"
                                            value="{{ old('answers') }}"
                                            placeholder="Enter what you can easily remember">
                                        @if ($errors->has('answers'))
                                        <span class="font-weight-bold">{{ $errors->first('answers') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label for="text">Phone</label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="Enter your active phone">
                                        @if ($errors->has('phone'))
                                        <span class="font-weight-bold">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <!-- ADDITIONAL FILEDS ENDS HERE -->
                                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                        <label for="gender">Gender</label>
                                        <select type="text" name="gender" id="gender" class="form-control"
                                            value="{{ old('gender') }}">
                                            <option value="">...Select...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                            @if ($errors->has('gender'))
                                            <span class="font-weight-bold">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                        <label for="category">Post Category</label>
                                        <select type="text" name="category" id="category" class="form-control"
                                            value="{{ old('category') }}">
                                            <option value="">...Select...</option>
                                            <option value="National President">National President</option>
                                            <option value="KwaraPoly Chapter">KwaraPoly Chapter</option>
                                            <option value="Uni-Ilorin Chapter">Uni-Ilorin Chapter</option>
                                            <option value="Kwasu Chapter">Kwasu Chapter</option>
                                            <option value="Offa Poly Chapter">Offa Poly Chapter</option>
                                            <option value="Other">Other</option>

                                            @if ($errors->has('category'))
                                            <span class="font-weight-bold">{{ $errors->first('category') }}</span>
                                            @endif
                                        </select>
                                    </div>

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
                                                class="fa fa-lock"></i>Password:</label>
                                        <div>
                                            <input type="password" class="form-control" id="myInput2" name="password"
                                                placeholder="Enter Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                            <input type="checkbox" onclick="myFunction2()"> Show Password
                                            @if ($errors->has('password'))
                                            <span class="font-weight-bold">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block"
                                        onclick="matchPassword()">Submit</button>
                                    <button class="btn btn-outline-info" style="float: right; background-color: #4CAF50;
                                                  color: white;
                                                  padding: 14px 20px;
                                                  margin: 8px 0;
                                                  border: none;
                                                  cursor: pointer;
                                                  width: 100%;"> <a style="text-decoration: none; color: #fff; "
                                            href={{ url('/') }}>GO HOME</a></button>
                                    <button style=" float: right;" type="submit"
                                        class="btn btn-outline-primary btn-lg btn-block"><a
                                            style="text-decoration: none; color:rgb(49, 4, 248);"
                                            href="{{ ('/login') }}">Login</a></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('layouts.footer')
    @include('layouts.scripts')
</body>
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

<!--  // Second password1 fild-->
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

</html>