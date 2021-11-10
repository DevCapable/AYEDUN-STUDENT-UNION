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
                        <h1>UPDATE COMPOUND</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Compound</li>
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
                                    <img src="{{ asset($compound->head_image) }}" , alt="user Picture"
                                        id="image-previewer" class="pull-right" style="width: 120px;
                                        height: 120px;
                                        border: 2px solid #2cabe3;" />
                                </div>
                            </div>
                            <div class="card card-body bg-transparent">
                                
                                <form method="POST" action="{{ url('administrator/ChangeCompoundDp') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" >
                                  <div class="col-md-12" style="display:none">
                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                        <label for="id">Serial Number</label>
                                        <input type="text" name="id" id="id" class="form-control"
                                            value="{{ $compound->id }}" readonly>
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
                                <form method="POST" novalidate action="{{ url('administrator/Update_Compound') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                <label for="id">Serial Number</label>
                                                <input type="text" name="id" id="id" class="form-control"
                                                    value="{{ $compound->id }}" readonly>
                                                @if ($errors->has('id'))
                                                    <span class="font-weight-bold">{{ $errors->first('id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('Name_of_Compound') ? 'has-error' : '' }}">
                                                <label for="Name_of_Compound">Compound Name</label>
                                                <input type="text" name="Name_of_Compound" id="Name_of_Compound"
                                                    class="form-control" value="{{ $compound->Name_of_Compound }}">
                                                @if ($errors->has('Name_of_Compound'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('Name_of_Compound') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('head_of_compound') ? 'has-error' : '' }}">
                                                <label for="head_of_compound">Head of Compound</label>
                                                <input type="text" name="head_of_compound" id="head_of_compound"
                                                    class="form-control" value="{{ $compound->head_of_compound }}">
                                                @if ($errors->has('head_of_compound'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('head_of_compound') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('history_of_compound') ? 'has-error' : '' }}">
                                                <label for="history_of_compound" class="form-label">History of
                                                    Compound</label>
                                                <input type="text" name="history_of_compound" class="form-control"
                                                    id="history_of_compound"
                                                    value="{{ $compound->history_of_compound }}">
                                                @if ($errors->has('history_of_compound'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('history_of_compound') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('origin') ? 'has-error' : '' }}">
                                                <label for="origin">Origin</label>
                                                <input type="text" name="origin" id="origin" class="form-control"
                                                    value="{{ $compound->origin }}">
                                                @if ($errors->has('origin'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('origin') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label for="phone">Comp. Head Phone</label>
                                                <input type="number" name="phone" id="phone" class="form-control"
                                                    value="{{ $compound->phone }}">
                                                @if ($errors->has('phone'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('culture_of_compound') ? 'has-error' : '' }}">
                                                <label for="culture_of_compound">culture_of_compound <i
                                                        style="color: red">[Optional]</i></label>
                                                <select type="text" name="culture_of_compound" id="culture_of_compound"
                                                    class="form-control" value="{{ old('culture_of_compound') }}">
                                                    <option value="{{ $compound->culture_of_compound }}">...Select...
                                                    </option>
                                                    <option value="Equngun">Equngun</option>
                                                    <option value="Hepa">Hepa</option>
                                                    <option value="Ifa">Ifa</option>
                                                    <option value="Elewe">Elewe</option>
                                                    <option value="None">None</option>
                                                    @if ($errors->has('culture_of_compound'))
                                                        <span
                                                            class="font-weight-bold">{{ $errors->first('culture_of_compound') }}</span>
                                                    @endif
                                                </select>
                                                @if ($errors->has('culture_of_compound'))
                                                    <span
                                                        class="font-weight-bold">{{ $errors->first('culture_of_compound') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-outline-primary btn-lg btn-block">Update</button>
                                        <a href="javascript:void(0)" onclick="window.history.back();"
                                            class="btn btn-outline-info btn-lg btn-block">Go Back</a>
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
          title: 'Administrator! You are on Edit Compound Page'
        })
      </script>
</body>

</html>
