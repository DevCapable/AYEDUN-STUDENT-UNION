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
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                @include('admin.search-user')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table below shows all the Available users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-x:auto;">
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
                                                href="#" title="Delete User?" class="btn btn-outline-danger">
                                                <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Suspend User!"
                                                onclick="return confirm('Are you sure you want to Suspend {{ $user->fullname }}?')"
                                                href="{{ url('administrator/suspendUser', $user->id_number) }}"
                                                title="Suspend User" class="btn btn-outline-danger">
                                                <i class="fas fa-lock  fa-sm"> Suspend </i></a>

                                                <a data-toggle="tooltip" data-placement="top" title="Send warning!"
                                                onclick="return confirm('Are you sure you want to send Warning {{ $user->fullname }}?')"
                                                href="{{ url('administrator/sendWaring', $user->username) }}"
                                                title="Send warning" class="btn btn-outline-danger">
                                                <i class="fas fa-flag  fa-sm"> Send Warning </i> 
                                                @php
                                                  $signalWave =  DB::table('admin_sent_mails')->where('email',$user->username)->count()
                                                @endphp
                                                <span class="badge bg-primary float-right">{{ $signalWave }}</span></a>
                                            
                                                @elseif ($user->status == 'suspended')
                                            <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                onclick="return confirm('Are you sure you want to delete {{ $user->fullname }}?')"
                                                href="#" title="Delete User?" class="btn btn-outline-danger">
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

                        <!-- /.details -->
                        <!-- /.card -->
                        <!-- details -->
                        <details>
                            <summary>Click View User Post ()</summary>
                            <!-- /.card -->
                            <div class="card" >
                                <div class="card-header">
                                    <h3 class="card-title">All users Post</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                   
                                        <table id="example2" class="table table-bordered table-hover" style="overflow: hidden;" >
                                            <tr>
                                                <td colspan="11" id="header">
                                                    <h1>All User Post<h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="340px">@sortablelink('USER NAME')</th>
                                                <th width="135px">POST</th>
                                                <th width="135px">@sortablelink('IMAGE')</th>
                                                <th width="80px">IMAGE CAPTION</th>
                                                <th width="100px">VIDEO</th>
                                                <th width="80px">VIDEO CAPTION</th>
                                                <th width="100px">ACTION</th>
                                            </tr>
                                            @foreach ($userPost as $Post)
                                            <tr>
                                                <td width="80px">{{ $Post->username }}</td>
                                                <td width="135px">{!! $Post->posting !!}</td>
                                                <td width="80px">
                                                    @if ($Post->video == '')
                                                    NULL
                                                    @else
                                                    {{ $Post->image }}
                                                    @endif
                                                </td>
                                                <td width="100px">{{ $Post->imageCaption }}</td>
                                                <td width="80px">
                                                    @if ($Post->video == '')
                                                    NULL
                                                    @else
                                                    {{ $Post->video }}
                                                    @endif
                                                </td>
                                                <td width="100px">{{ $Post->videoCaption }}</td>
                                                <td width="340px">
                                                    <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                                        onclick="return confirm('Are you sure you want to delete {{ $Post->username }}  Post?')"
                                                        href="{{ url('administrator/deleteUserPost',$Post->id ) }}"
                                                        title="Delete User?" class="btn btn-outline-danger">
                                                        <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Activate User!"
                                                        onclick="return confirm('Are you sure you want to Send Warnin Signal {{ $Post->id }}?')"
                                                        href="{{ url('administrator/SendSignal', $Post->username) }}"
                                                        title="Send Warning Signals" class="btn btn-outline-warning">
                                                        <i class="fas fa-unlock  fa-sm"> Warning</i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                </div>
                                <div class="card-footer">
                                    <div class="card card-body bg-transparent">
                                        {{ $userPost->links() }}
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