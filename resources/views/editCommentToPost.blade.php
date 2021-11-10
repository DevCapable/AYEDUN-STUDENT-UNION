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
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">Edit/Update Your
                            Post
                        </h3>
                        <h3 class="pull-right"><a style="float: right" class="btn btn-primary btn-sm"
                                href="/school/students/register">Chat Here
                            </a></h3>
                    </div>
                    <div class="card-body" style="">
                        <div class="row el-element-overlay">
                            <form action="{{ url('user/updateCommentToPost') }}" method="post" novalidate>
                                @csrf
                                <div class="input-group">
                                    <input style="display: none" type="text" name="commentid"
                                        placeholder="Type Message ..." class="form-control"
                                        value="{!! $toComment->id !!}" readonly>
                                    <input type="text" name="comment" placeholder="Type Message ..."
                                        class="form-control" value="{!! $toComment->comment !!}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Edit/Update</button>
                                    </span>
                            </form>
                        </div>
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
    <br><br><br><br><br><br> <br>



    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>
