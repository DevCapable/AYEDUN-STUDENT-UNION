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
    <!---Sidebar-->
 @include('admin.layouts.sidebar')
<!---NAVBAR HERE-->
@include('admin.layouts.navbar')
<!-- NAVBAR ENDS HERE--->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>UPDATE MISS ASU</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update MISS ASU</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                <div class="row">
                    <div class="col-12">

                        <!-- Form To Add Compound-->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> <strong>Admin Panel<strong></h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                                    <img src="{{ asset($MissAsus->picture) }}" class="img-thumbnail"
                                    width="100px" width="120px" style="box-shadow: 0px 2px 7px 2px gray ;"
                                    alt="Ayedun Students' Union" />
                                </div>
                            </div>
                            <div class="card card-body bg-transparent">

                                <form method="POST" action="{{ url('administrator/ChangeMissAsuDp') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" >
                                  <div class="col-md-12" style="display:none">
                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                        <label for="id">Serial Number</label>
                                        <input type="text" name="id" id="id" class="form-control"
                                            value="{{ $MissAsus->id }}" readonly>
                                        @if ($errors->has('id'))
                                        <span class="font-weight-bold">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
                                  </div>
                                  <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                  </div>
                                </div>
                              </form>
                                <form method="POST" novalidate action="{{ url('administrator/Update_MissAsu')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                <label for="id">Serial Number</label>
                                                <input type="text" name="id" id="id" class="form-control"
                                                    value="{{ $MissAsus->id }}" readonly>
                                                @if ($errors->has('id'))
                                                <span class="font-weight-bold">{{ $errors->first('id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
                                                <label for="full_name">Full Name</label>
                                                <input type="text" name="full_name" id="full_name" class="form-control"
                                                    value="{{ $MissAsus->full_name }}">
                                                @if ($errors->has('full_name'))
                                                <span class="font-weight-bold">{{ $errors->first('full_name')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('compound') ? 'has-error' : '' }}">
                                                <label for="compound">Compound</label>
                                                <input type="text" name="compound" id="compound" class="form-control"
                                                    value="{{ $MissAsus->compound }}" readonly>
                                                @if ($errors->has('compound'))
                                                <span class="font-weight-bold">{{ $errors->first('compound')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('discepline') ? 'has-error' : '' }}">
                                                <label for="discepline">Discepline</label>
                                                <input type="text" name="discepline" id="discepline"
                                                    class="form-control" value="{{ $MissAsus->discepline }}">
                                                @if ($errors->has('discepline'))
                                                <span class="font-weight-bold">{{ $errors->first('discepline')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">
                                                <label for="institution">Institution</label>
                                                <input type="text" name="institution" id="institution"
                                                    class="form-control" value="{{ $MissAsus->institution }}">
                                                @if ($errors->has('institution'))
                                                <span class="font-weight-bold">{{ $errors->first('institution')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                                <label for="date_of_birth" class="form-label">Date of birth</label>
                                                <input type="text" name="date_of_birth" class="form-control"
                                                    id="date_of_birth" value="{{$MissAsus->date_of_birth}}">
                                                @if ($errors->has('date_of_birth'))
                                                <span class="font-weight-bold">{{ $errors->first('date_of_birth')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('year_of_tenure_from') ? 'has-error' : '' }}">
                                                <label for="year_of_tenure_from">Year of tenure from</label>
                                                <input type="date" name="year_of_tenure_from" id="year_of_tenure_from"
                                                    class="form-control"
                                                    value="{{ $MissAsus->year_of_tenure_from }}">
                                                @if ($errors->has('year_of_tenure_from'))
                                                <span class="font-weight-bold">{{ $errors->first('year_of_tenure_from')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('year_of_tenure_to') ? 'has-error' : '' }}">
                                                <label for="year_of_tenure_to">Year of tenure to</label>
                                                <input type="date" name="year_of_tenure_to" id="year_of_tenure_to"
                                                    class="form-control" value="{{ $MissAsus->year_of_tenure_to }}">
                                                @if ($errors->has('year_of_tenure_to'))
                                                <span class="font-weight-bold">{{ $errors->first('year_of_tenure_to')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                                <label for="gender">Gender</label>
                                                <select type="text" name="gender" id="gender" class="form-control"
                                                    value="{{ old('gender') }}">
                                                    <option value="{{$MissAsus->gender}}">...Select...
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    @if ($errors->has('gender'))
                                                    <span class="font-weight-bold">{{ $errors->first('gender') }}</span>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label for="phone">Phone</label>
                                                <input type="number" name="phone" id="phone" class="form-control"
                                                    value="{{ $MissAsus->phone }}">
                                                @if ($errors->has('phone'))
                                                <span class="font-weight-bold">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('sports') ? 'has-error' : '' }}">
                                                <label for="sports">sports <i style="color: red">[Optional]</i></label>
                                                <select type="text" name="sport" id="sport" class="form-control"
                                                    value="{{ old('sport') }}">
                                                    <option value="{{$MissAsus->sports}}">...Select...</option>
                                                    <option value="Hockey">Hockey</option>
                                                    <option value="Ludo">Ludo</option>
                                                    <option value="Draft">Draft</option>
                                                    <option value="Volley Ball">Volleyy Ball</option>
                                                    <option value="Table Tennies">Table Tennies</option>
                                                    <option value="Long Tennies">Long Tennies</option>
                                                    <option value="Swimming">Swimming</option>
                                                    <option value="Town Race">Town Race</option>
                                                    <option value="None">None</option>
                                                    @if ($errors->has('sport'))
                                                    <span class="font-weight-bold">{{ $errors->first('sport') }}</span>
                                                    @endif
                                                </select>
                                                @if ($errors->has('sports'))
                                                <span class="font-weight-bold">{{ $errors->first('sports') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('history') ? 'has-error' : '' }}">
                                                <div>
                                                    <textarea id="text" cols="30" rows="4"
                                                        name="history">{{ $MissAsus->history }}</textarea>
                                                </div>
                                                @if ($errors->has('history'))
                                                <span class="font-weight-bold">{{ $errors->first('history') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-outline-primary btn-lg btn-block">Update</button>
                                            <a  href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-info btn-lg btn-block">Go Back</a>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            Please enter a valid information
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')
    @include('admin.layouts.scripts')
    <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        Toast.fire({
          icon: 'success',
          title: 'Administrator! You are on Edit Miss ASU Page'
        })
      </script>
</body>

</html>