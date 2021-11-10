<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Dashboard</title>
    @include('layouts.styles')

    <style>
        .chat_message_area {
            position: relative;
            width: 100%;
            height: auto;
            background-color: #FFF;
            border: 1px solid #CCC;
            border-radius: 3px;
        }

        #group_chat_message {
            width: 100%;
            height: auto;
            min-height: 80px;
            overflow: auto;
            padding: 6px 24px 6px 12px;
        }

        .image_upload {
            position: absolute;
            top: 3px;
            right: 3px;
        }

        .image_upload>form>input {
            display: none;
        }

        .image_upload img {
            width: 24px;
            cursor: pointer;
        }
    </style>
</head>
@include('layouts.header')

<body style="padding-top: 100px">
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
                </form><a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-info">Go
                    Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">Edit/Update Your Post
                        </h3>
                        <h3 class="pull-right"><a style="float: right" class="btn btn-primary btn-sm"
                                href="/school/students/register">Chat Here
                            </a></h3>
                    </div>
                    <div class="card-body" style="">
                        <div class="row el-element-overlay">
                            @foreach ($All_post as $item)
                            <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                <div class="card bg-white card-hover">
                                    <div class="card-header">
                                        @if ($verifyUser->id == $item->userId)
                                       
                                        <a title="Click to Edit" href="{{ url('user/editPost/' . $item->id) }}">
                                            <button id="edit-btn" value="0329/133" class="btn btn-outline-info btn-sm">
                                                <i class="fa fa-edit font-weight-bolder"></i>
                                            </button>
                                        </a>
                                        @endif
                                        <span class="badge badge-success pull-right">
                                            {{ strtoupper($item->username) }}</span>
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
                                            <img src="{{ asset($item->image) }}" class="img-thumbnail" width="100%"
                                                height="190%" />
                                        <p
                                            style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                            {!! $item->ImageCaption !!}
                                        </p>
                                        @elseif ($item->posting =='' && $item->image =='')
                                        <video width="100%" height="100%" controls>
                                            <source src="{{ asset($item->video) }}" type="video/mp4">
                                        </video>
                                        <p
                                            style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                            {!! $item->VideoCaption !!}
                                        </p>
                                        @endif
                                        </p>
                                    </div>


                                    <div class="card-footer">
                                        <a href="{{ url('user/view_user_profile/' . $item->userId) }}"
                                            class="btn btn-outline-primary btn-sm pull-right">
                                            PROFILE<i class="fa fa-eye"></i>
                                        </a>
 
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($item->video == '' && $item->image == '')
                        <form action="{{ url('user/updatePosting') }}" method="post" novalidate>
                            @csrf
                            <div class="input-group">
                                <input style="display: none" type="text" name="postId" placeholder="Type Message ..." class="form-control"
                                value="{!! $item->id !!}" readonly>
                                <input type="text" name="posting" placeholder="Type Message ..." class="form-control"
                                    value="{!! $item->posting !!}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </span>
                        </form>
                        @elseif ($item->posting =='' && $item->video=='')
                        <form action="{{ url('user/updatePosting') }}" method="post" novalidate>
                            @csrf
                            <div class="input-group">
                                <input style="display: none" type="text" name="postId" placeholder="Type Message ..." class="form-control"
                                value="{!! $item->id !!}" readonly>
                                <input type="text" name="imageCaption" placeholder="Type Message ..."
                                    class="form-control" value="{!! $item->ImageCaption !!}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </span>
                        </form>
                        @elseif ($item->posting =='' && $item->image =='')
                        <form action="{{ url('user/updatePosting') }}" method="post" novalidate>
                            @csrf
                            <div class="input-group">
                                <input style="display: none" type="text" name="postId" placeholder="Type Message ..." class="form-control"
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
                <!-- /.card-footer-->
            </div>
        </div>
        <!-- ============================================================== -->
    </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    </div>
    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>