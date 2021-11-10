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
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table below shows all the Available users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tr>
                                        <td colspan="11" id="header">
                                            <h1>All Users<h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="340px">@sortablelink('fullname')</th>
                                        <th width="135px">Email</th>
                                        <th width="135px">@sortablelink('compound')</th>
                                        <th width="80px">Residence</th>
                                        <th width="100px">DATE OF BIRTH</th>
                                        <th width="80px">INSTITUTION</th>
                                        <th width="100px">MARITAL STATUS</th>
                                        <th width="80px">PHONE</th>
                                        <th width="100px">GENDER</th>
                                        <!--<th width="100px">@sortablelink('id', 'PHONE')</th>
                            <th width="100px">@sortablelink('id', 'GENDER')</th> -->
                                        <th width="100px">ACTION</th>
                                    </tr>

                                    @foreach ($users as $user)
                                        <tr>

                                            <td width="80px">{{ $user->fullname }}</td>

                                            <td width="135px">{{ $user->email }}</td>
                                            <td width="80px">{{ $user->compound }}</td>
                                            <td width="100px">{{ $user->place_of_residence }}</td>
                                            <td width="80px">{{ $user->date_of_birth }}</td>
                                            <td width="100px">{{ $user->institution }}</td>
                                            <td width="100px">{{ $user->marital_status }}</td>
                                            <td width="100px">{{ $user->phone }}</td>
                                            <td width="100px">{{ $user->gender }}</td>
                                            <td width="340px">
                                                @if ($user->status == 'active')
                                                    <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                        onclick="return confirm('Are you sure you want to delete {{ $user->fullname }}?')"
                                                        href="{{ url('administrator/deleteUser', $user->id_number) }}"
                                                        title="Delete National President"
                                                        class="btn btn-outline-danger">
                                                        <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Suspend User!"
                                                        onclick="return confirm('Are you sure you want to Suspend {{ $user->fullname }}?')"
                                                        href="{{ url('administrator/suspendUser', $user->id_number) }}"
                                                        title="Suspend User" class="btn btn-outline-danger">
                                                        <i class="fas fa-lock  fa-sm"> Suspend </i></a>
                                                @elseif ($user->status == 'suspended')
                                                    <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                        onclick="return confirm('Are you sure you want to delete {{ $user->fullname }}?')"
                                                        href="{{ url('administrator/deleteUser', $user->id_number) }}"
                                                        title="Delete National President"
                                                        class="btn btn-outline-danger">
                                                        <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Activate User!"
                                                        onclick="return confirm('Are you sure you want to Suspend {{ $user->fullname }}?')"
                                                        href="{{ url('administrator/activateUser', $user->id_number) }}"
                                                        title="Suspend User" class="btn btn-outline-success">
                                                        <i class="fas fa-unlock  fa-sm"> Activate</i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="card card-body bg-transparent">
                                    {{ $users->links() }}
                                </div>
                            </div>

                        </div>
                        <details>
                            <summary> Click View User Post (images)</summary>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Table below shows all pictures being posted by users</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="11" id="header">
                                                    <h1>All Pictures<h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="340px">@sortablelink('fullname')</th>
                                                <th width="135px">Email</th>
                                                <th width="135px">@sortablelink('compound')</th>
                                                <th width="80px">Residence</th>
                                                <th width="100px">DATE OF BIRTH</th>
                                                <th width="80px">INSTITUTION</th>
                                                <th width="100px">MARITAL STATUS</th>
                                                <th width="80px">PHONE</th>
                                                <th width="100px">GENDER</th>
                                                <!--<th width="100px">@sortablelink('id', 'PHONE')</th>
                            <th width="100px">@sortablelink('id', 'GENDER')</th> -->
                                                <th width="100px">ACTION</th>
                                            </tr>

                                            @foreach ($users as $user)
                                                <tr>

                                                    <td width="80px">{{ $user->fullname }}</td>

                                                    <td width="135px">{{ $user->email }}</td>
                                                    <td width="80px">{{ $user->compound }}</td>
                                                    <td width="100px">{{ $user->place_of_residence }}</td>
                                                    <td width="80px">{{ $user->date_of_birth }}</td>
                                                    <td width="100px">{{ $user->institution }}</td>
                                                    <td width="100px">{{ $user->marital_status }}</td>
                                                    <td width="100px">{{ $user->phone }}</td>
                                                    <td width="100px">{{ $user->gender }}</td>
                                                    <td width="340px">
                                                        <button id="delete-btn" value="0329/133"
                                                            class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash font-weight-bolder"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                </div>
                                <div class="card-footer">
                                    <div class="card card-body bg-transparent">
                                        {{ $users->links() }}
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </details>
                        <!-- /.details -->
                        <!-- /.card -->
                        <!-- details -->
                        <details>
                            <summary>Click View User Post (Videos)</summary>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="11" id="header">
                                                    <h1>All Videos<h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="340px">@sortablelink('fullname')</th>
                                                <th width="135px">Email</th>
                                                <th width="135px">@sortablelink('compound')</th>
                                                <th width="80px">Residence</th>
                                                <th width="100px">DATE OF BIRTH</th>
                                                <th width="80px">INSTITUTION</th>
                                                <th width="100px">MARITAL STATUS</th>
                                                <th width="80px">PHONE</th>
                                                <th width="100px">GENDER</th>
                                                <!--<th width="100px">@sortablelink('id', 'PHONE')</th>
                            <th width="100px">@sortablelink('id', 'GENDER')</th> -->
                                                <th width="100px">ACTION</th>
                                            </tr>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td width="80px">{{ $user->fullname }}</td>
                                                    <td width="135px">{{ $user->email }}</td>
                                                    <td width="80px">{{ $user->compound }}</td>
                                                    <td width="100px">{{ $user->place_of_residence }}</td>
                                                    <td width="80px">{{ $user->date_of_birth }}</td>
                                                    <td width="100px">{{ $user->institution }}</td>
                                                    <td width="100px">{{ $user->marital_status }}</td>
                                                    <td width="100px">{{ $user->phone }}</td>
                                                    <td width="100px">{{ $user->gender }}</td>
                                                    <td width="340px">
                                                        <button id="delete-btn" value="0329/133"
                                                            class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash font-weight-bolder"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                </div>
                                <div class="card-footer">
                                    <div class="card card-body bg-transparent">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </details>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- Form To Add Compound-->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> <strong>ADD COMPOUND<strong></h4>
                </div>
                <div class="card card-body bg-transparent">


                    <form method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                            <div class="col-md-6">

                                <div class="form-group {{ $errors->has('Name_of_Compound') ? 'has-error' : '' }}">
                                    <label for="Name_of_Compound">Compound Name</label>
                                    <input type="text" name="Name_of_Compound" id="Name_of_Compound"
                                        class="form-control" value="{{ old('Name_of_Compound') }}">
                                    @if ($errors->has('Name_of_Compound'))
                                        <span
                                            class="font-weight-bold">{{ $errors->first('Name_of_Compound') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('head_of_compound') ? 'has-error' : '' }}">
                                    <label for="head_of_compound">Head of Compound</label>
                                    <input type="text" name="head_of_compound" id="head_of_compound"
                                        class="form-control" value="{{ old('head_of_compound') }}">
                                    @if ($errors->has('head_of_compound'))
                                        <span
                                            class="font-weight-bold">{{ $errors->first('head_of_compound') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('history_of_compound') ? 'has-error' : '' }}">
                                    <label for="history_of_compound" class="form-label">History of Compound</label>
                                    <input type="text" name="history_of_compound" class="form-control"
                                        id="history_of_compound" value="{{ old('history_of_compound') }}">
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
                                        value="{{ old('origin') }}">
                                    @if ($errors->has('origin'))
                                        <span class="font-weight-bold">{{ $errors->first('origin') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('culture_of_compound') ? 'has-error' : '' }}">
                                    <label for="culture_of_compound">Culture of Compound</label>
                                    <select type="text" name="culture_of_compound" id="culture_of_compound"
                                        class="form-control" value="{{ old('culture_of_compound') }}">
                                        <option value="">...Select...</option>
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Comp. Head Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="font-weight-bold">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Create</button>
                                <a href="javascript:void(0)" onclick="window.history.back();"
                                    class="btn btn-outline-info btn-lg btn-block">Go Back</a>

                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer">
                    <div class="card card-body bg-transparent">
                        Please enter a valid information
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
            position: '',
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
            title: 'Administrator! Here You Can Manage All Users'
        })

    </script>
</body>

</html>
