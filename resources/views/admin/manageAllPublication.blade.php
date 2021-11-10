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
                        <h1>ADMINISTRATOR PUBLICATIONS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Administrator Publications</li>
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
                                <h3 class="card-title">Table below shows all the Available Administrator Publications so far.</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tr>
                                        <td colspan="12" id="header">
                                            <h2>All Publications Till Now <i class=" fa fa-clock"></i>
                                                ({{ now() }})<h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="340px">@sortablelink('ADMIN NAME')</th>
                                        <th width="340px">@sortablelink('EPISTLE')</th>
                                        <th width="135px">@sortablelink('IMAGES')</th>
                                        <th width="135px">@sortablelink('IMAGE CAPTION')</th>
                                        <th width="135px">@sortablelink('VIDEOS')</th>
                                        <th width="135px">@sortablelink('VIDEO CAPTION')</th>
                                        <th width="135px">@sortablelink('DATE PUBLISHED')</th>

                                        <th width="100px">ACTION</th>
                                    </tr>
                                    @foreach ($AdminPosts as $ITEM)
                                        <tr>
                                            <td width="80px">{{ $ITEM->adminName }}</td>
                                            <td width="135px">{{ $ITEM->posting }}</td>
                                            <td width="700px">
                                                @if ($ITEM->image == '')
                                                    {{ 'NULL' }}

                                                @else
                                                    <img src="{{ asset($ITEM->image) }}" class="img-thumbnail"
                                                        width="100px" width="100px"
                                                        style="box-shadow: 0px 2px 7px 2px gray ;"
                                                        alt="Ayedun Students' Union" style="border-radius: 100px" />
                                                @endif
                                            </td>
                                            <td width="100px">{{ $ITEM->ImageCaption }}</td>
                                            <td width="700px">
                                                @if ($ITEM->video == '')
                                                    {{ 'NULL' }}
                                                @else
                                                    <video width="100px" height="100px" controls>
                                                        <source src="{{ asset($ITEM->video) }}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </td>
                                            <td width="100px">{{ $ITEM->VideoCaption }}</td>
                                            <td width="100px">{{ $ITEM->created_at }}</td>
                                            <td width="340px">
                                                <a onclick="return confirm('Are you sure you want to delete {{ $ITEM->id }}?')"
                                                    href="{{ url('administrator/deletePublication', $ITEM->id) }}"
                                                    title="Delete National President" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash  fa-lg"></i></a>

                                                <a title="Click to Like"
                                                    href="{{ url('administrator/editPublication/' . $ITEM->id) }}"
                                                    title="Edit National President"> <button id="edit-btn"
                                                        value="0329/133" class="btn btn-outline-info btn-sm">
                                                        <i class="fa fa-edit font-weight-bolder"></i>
                                                    </button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="card card-body bg-transparent">
                                    {{ $AdminPosts->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->


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
            title: 'Administrator! Here You Can Manage Your Publications'
        })

    </script>
</body>

</html>
