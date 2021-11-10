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
                            <li class="breadcrumb-item active">Edit Publication</li>
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
                                <h3 class="card-title">Edit Your Content Here.</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row el-element-overlay">
                                    @foreach ($fetcPost as $item)
                                        <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                            <div class="card bg-white card-hover">
                                                <div class="card-header">
                                                    <a title="Click to Edit"
                                                        href="{{ url('administrator/editPublication/' . $item->id) }}">
                                                        <button id="edit-btn" value="0329/133"
                                                            class="btn btn-outline-info btn-sm">
                                                            <i class="fa fa-edit font-weight-bolder"></i>
                                                        </button>
                                                    </a>
                                                    <span style="float: right" class="badge badge-info pull-right">
                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <div class="card-title">
                                                    <p
                                                        style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">

                                                        @if ($item->video == '' && $item->image == '')
                                                            {!! $item->posting !!}
                                                        @elseif ($item->posting =='' && $item->video=='')
                                                            <img src="{{ asset($item->image) }}" class="img-thumbnail"
                                                                width="100%" height="190%" />
                                                            <p
                                                                style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                                {!! $item->ImageCaption !!}
                                                            </p>
                                                        @elseif ($item->posting =='' && $item->image =='')
                                                            <video width="100%" height="100%" controls>
                                                                <source src="{{ asset($item->video) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                            <p
                                                                style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                                {!! $item->VideoCaption !!}
                                                            </p>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="card-footer">

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                @if ($item->video == '' && $item->image == '')
                                    <form action="{{ url('administrator/updatePublication') }}" method="post"
                                        novalidate>
                                        @csrf
                                        <div class="input-group">
                                            <input style="display: none" type="text" name="postId"
                                                placeholder="Type Message ..." class="form-control"
                                                value="{!! $item->id !!}" readonly>
                                            <input type="text" name="posting" placeholder="Type Message ..."
                                                class="form-control" value="{!! $item->posting !!}">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </span>
                                    </form>
                                @elseif ($item->posting =='' && $item->video=='')
                                    <form action="{{ url('administrator/updatePublication') }}" method="post"
                                        novalidate>
                                        @csrf
                                        <div class="input-group">
                                            <input style="display: none" type="text" name="postId"
                                                placeholder="Type Message ..." class="form-control"
                                                value="{!! $item->id !!}" readonly>
                                            <input type="text" name="imageCaption" placeholder="Type Message ..."
                                                class="form-control" value="{!! $item->ImageCaption !!}">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </span>
                                    </form>
                                @elseif ($item->posting =='' && $item->image =='')
                                    <form action="{{ url('administrator/updatePublication') }}" method="post"
                                        novalidate>
                                        @csrf
                                        <div class="input-group">
                                            <input style="display: none" type="text" name="postId"
                                                placeholder="Type Message ..." class="form-control"
                                                value="{!! $item->id !!}" readonly>
                                            <input type="text" name="videoCaption" placeholder="Type Message ..."
                                                class="form-control" value="{!! $item->VideoCaption !!}">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </span>
                                    </form>
                                @endif
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
