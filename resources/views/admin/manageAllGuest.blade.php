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
                        <h1>NONE INDIGEN / NONE STUDENT</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Guest</li>
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
                                <h3 class="card-title">Table below shows all the Available None Indigene/ None Student
                                    but might also come from Ayedun</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tr>
                                        <td colspan="12" id="header">
                                            <h2>Guest <i class=" fa fa-clock"></i> ({{ now() }})<h2>
                                        </td>
                                    </tr>
                                    <tr>

                                        <th width="340px">@sortablelink('ID NUMBER')</th>
                                        <th width="135px">@sortablelink('GUEST')</th>
                                        <th width="135px">@sortablelink('FULL NAME')</th>
                                        <th width="50px">@sortablelink('COMPOUND')</th>
                                        <th width="135px">@sortablelink('Institution')</th>
                                        <th width="100px">@sortablelink('EMAIL')</th>
                                        <th width="135px">@sortablelink('DATE OF BIRTH')</th>
                                        <th width="135px">@sortablelink('GENDER')</th>
                                        <th width="135px">@sortablelink('ADDRESS')</th>
                                        <th width="135px">@sortablelink('PHONE')</th>
                                        <th width="200px">@sortablelink('DP')</th>
                                        <th width="100px">ACTION</th>
                                    </tr>
                                    @foreach ($allGuest as $guest)
                                    <tr>

                                        <td width="135px">{{ $guest->id_number }}</td>
                                        <td width="100px">{{ $guest->guest }}</td>
                                        <td width="80px">{{ $guest->fullname }}</td>
                                        <td width="50px">{{ $guest->compound }}</td>
                                        <td width="100px">{{ $guest->institution }}</td>
                                        <td width="100px">{{ $guest->email }}</td>
                                        <td width="100px">{{ $guest->date_of_birth }}</td>
                                        <td width="100px">{{ $guest->gender }}</td>
                                        <td width="100px">{{ $guest->address }}</td>
                                        <td width="100px">{{ $guest->phone }}</td>
                                        <td width="700px"> <img src="{{ asset($guest->picture) }}" class="img-thumbnail"
                                                width="200px" width="200px" style="box-shadow: 0px 2px 7px 2px gray ;"
                                                alt="Ayedun Students' Union" style="border-radius: 100px" /></td>
                                        <td width="340px">
                                            @if ($guest->status == 'active')
                                            <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                onclick="return confirm('Are you sure you want to delete {{ $guest->fullname }}?')"
                                                href="{{ url('administrator/deleteUser', $guest->id_number) }}"
                                                title="Delete National President" class="btn btn-outline-danger">
                                                <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Suspend User!"
                                                onclick="return confirm('Are you sure you want to Suspend {{ $guest->fullname }}?')"
                                                href="{{ url('administrator/suspendUser', $guest->id_number) }}"
                                                title="Suspend User" class="btn btn-outline-danger">
                                                <i class="fas fa-lock  fa-sm"> Suspend </i></a>
                                            @elseif ($guest->status == 'suspended')
                                            <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                onclick="return confirm('Are you sure you want to delete {{ $guest->fullname }}?')"
                                                href="{{ url('administrator/deleteUser', $guest->id_number) }}"
                                                title="Delete National President" class="btn btn-outline-danger">
                                                <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Activate User!"
                                                onclick="return confirm('Are you sure you want to Suspend {{ $guest->fullname }}?')"
                                                href="{{ url('administrator/activateUser', $guest->id_number) }}"
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
                                    {{ $allGuest->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->





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
            title: 'Administrator! Here You Can Manage All StakeHolders'
        })

    </script>
</body>

</html>