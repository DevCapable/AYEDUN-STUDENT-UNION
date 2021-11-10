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

    </style>
</head>

<body style="padding-top: 100px">
    @include('layouts.header')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <form method="POST" action="{{ url('user/image-upload') }}" id="logout" novalidate>
                    <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"> <a
                            style="color: white; text-decoration:none" href="/user/image-upload"> Upload Profile
                            Picture</a></button>
                </form>
                <form method="POST" action="{{ url('user/logout') }}" id="logout" novalidate>
                    @csrf
                    <button style=" float: right;" type="submit" class="btn btn-sm btn-primary">Log Out</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
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
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Student Information Update</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" novalidate id="update-profile">
                            <input type="hidden" value="/9j/">
                            <div class="row">
                                <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                                    <img src="{{ asset($user->picture) }}" , alt="user Picture" id="image-previewer"
                                        class="pull-right" style="width: 120px;
                                                    height: 120px;
                                                    border: 2px solid #2cabe3;" />
                                </div>
                            </div>
                       

                            <div class="row">


                                <form method="POST" novalidate>
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="email">ID Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->id_number }}"
                                                data-val="true" id="email" name="" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                            <label for="fullname">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->fullname }}"
                                                id="fullname" name="fullname">
                                            @if ($errors->has('fullname'))
                                                <span class="font-weight-bold">{{ $errors->first('fullname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="email">Email address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->email }}"
                                                data-val="true" id="email" name="" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <input type="text" class="form-control" value="{{ $user->username }}"
                                                id="username" name="" readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                            <label for="date_of_birth">Date of birth <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" value="{{ $user->date_of_birth }}"
                                                data-val="true" id="date_of_birth" name="date_of_birth">
                                            @if ($errors->has('date_of_birth'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('date_of_birth') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('compound') ? 'has-error' : '' }}">
                                            <label for="compound">Compound <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->compound }}"
                                                data-val="true" id="compound" name="compound" readonly>
                                            @if ($errors->has('compound'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('compound') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">
                                            <label for="institution">Institution <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->institution }}"
                                                data-val="true" id="institution" name="institution">
                                            @if ($errors->has('institution'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('institution') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('place_of_residence') ? 'has-error' : '' }}">
                                            <label for="place_of_residence">Place of residence <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ $user->place_of_residence }}" id="place_of_residence"
                                                name="place_of_residence">
                                            @if ($errors->has('place_of_residence'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('place_of_residence') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                                            <label for="marital_status">Marital status <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ $user->marital_status }}" id="marital_status"
                                                name="marital_status">
                                            @if ($errors->has('marital_status'))
                                                <span
                                                    class="font-weight-bold">{{ $errors->first('marital_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group {{ $errors->has('security_question') ? 'has-error' : '' }}">
                                            <label for="security_question">Current security_question is :
                                                <span><strong>{{ $user->security_question }}</strong></span></label>
                                            <select type="text" name="security_question" id="security_question"
                                                class="form-control" value="{{ old('security_question') }}">
                                                <option value="{{ $user->security_question }}">...Change it?...
                                                </option>
                                                <option value="What is your mother's name">What is your mother's name
                                                </option>
                                                <option value="What was your childhood nickname">What was your childhood
                                                    nickname</option>
                                                <option value="What is your street name">What is your street name
                                                </option>
                                                <option value="What is your favorite food">What is your favorite food
                                                </option>
                                                <option value="What age you got married">What age you got married
                                                </option>

                                                @if ($errors->has('security_question'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('security_question') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('answers') ? 'has-error' : '' }}">
                                            <label for="answers">Answers <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->answers }}"
                                                id="answers" name="answers">
                                            @if ($errors->has('answers'))
                                                <span class="font-weight-bold">{{ $errors->first('answers') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->gender }}"
                                                id="gender" name="gender">
                                            @if ($errors->has('gender'))
                                                <span class="font-weight-bold">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                            <label for="phone">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $user->phone }}"
                                                id="phone" name="phone">
                                            @if ($errors->has('phone'))
                                                <span class="font-weight-bold">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="submit" id="submit-btn" class="btn btn-primary pull-right ml-3"
                                        novallidate>
                                        Update Record
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <h5 class="card-title text-uppercase text-center">
                            <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-info">Go
                                Back</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div>
    </div>
    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>
