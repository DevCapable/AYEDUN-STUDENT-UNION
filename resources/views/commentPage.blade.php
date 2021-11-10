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


        span {
            float: right;
        }

        .card:hover {
            box-shadow: 0px 2px 7px 2px gray;
        }

        img {
            border-radius: 100px;
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
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">Comments</h3>
                        <h3 class="pull-right"><a href="javascript:void(0)" onclick="window.history.back();"
                                class="btn btn-info">Go
                                Back</a></h3>
                    </div>


                    <div class="card-header">
                        <p
                            style=" text-align: center; height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">

                            @if ($checkPost->video == '' && $checkPost->image == '')
                            {!! $checkPost->posting !!}
                            @elseif ($checkPost->posting =='' && $checkPost->video=='')
                            <img src="{{ asset($checkPost->image) }}" class="img-thumbnail" width="60%" height="70%" />

                        <p
                            style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                            {!! $checkPost->ImageCaption !!}
                        </p>
                        @elseif ($checkPost->posting =='' && $checkPost->image =='')


                        <video width="100%" height="190%" controls>
                            <source src="{{ asset($checkPost->video) }}" type="video/mp4">
                        </video>
                        <p
                            style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                            {!! $checkPost->VideoCaption !!}
                        </p>
                        @endif
                        </p>
                    </div>
                        @foreach ($comments as $item)

                        <table class="table" style="width: 100%">

                            <tr>
                                <td>
                                    <a title="Click to View Profile"
                                        href="{{ url('user/view_user_profile/' . $item->userId) }}"
                                        class="btn btn-outline-primary btn-sm pull-left"> {{ $item->username }}</a>

                                </td>

                                <td >
                                    <i > {{ $item->comment }}</i>
                                </td>



                                <td style="float: right ;">
                                    <span style="float: left" class="badge badge-info pull-right">{{
                                        Carbon\Carbon::parse($item->created_at)->diffForHumans()}} </span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <details style="float: right">
                                        <summary>ooo</summary>
                                        <table>

                                            <tr>
                                                <td style="float: right" colspan="4">
                                                    @if ($verifyUser->id == $item->userId)
                                                    <a title="Click to View Delete"
                                                        href="{{ url('user/deleteCommentToPost/' . $item->id) }}"
                                                        class="btn btn-outline-danger btn-sm pull-center">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a title="Click to View Edit"
                                                        href="{{ url('user/editCommentToPost/' . $item->id) }}"
                                                        class="btn btn-outline-info btn-sm pull-center">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    @else
                                                    <a title="Click to View Profile"
                                                        href="{{ url('user/view_user_profile/' . $item->id) }}"
                                                        class="btn btn-outline-primary btn-sm pull-center">
                                                        <i class="fa fa-user"></i>
                                                    </a>

                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </details>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $comments->links() }}
                        </div>
                    </div>
                    <form method="POST" action="{{ url('user/commentPage') }}" novalidate>
                        @csrf
                        <!-- comment here-->
                        <div class="card-body">
                            <i style="display: none">
                                <input class="form-control" type="text" name="username"
                                    value="{{ $verifyUser->username }}">
                                <input type="number" name="userId" id="userId" class="form-control"
                                    value="{{$verifyUser->id }}"><br>
                                <input type="text" name="postId" id="postId" class="form-control"
                                    value="{{$checkPost->id }}"><br>
                            </i>
                            <center> <textarea style="align-self" id="" cols="30" rows="4" name="comment"
                                    placeholder="What's on your mind..."></textarea><br>
                                @if ($errors->has('posting'))
                                <span class="font-weight-bold">{{ $errors->first('posting') }}</span>
                                @endif
                            </center>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i
                                    class=" fa fa-comments"></i> Comment</button>
                        </div>
                        <div class="card-footer">
                            <div class="card card-body bg-transparent">

                            </div>
                        </div>
                    </form>
                </div>
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