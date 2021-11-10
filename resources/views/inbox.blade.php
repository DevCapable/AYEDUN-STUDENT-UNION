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
                <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-info">Go
                    Back</a><a href="{{ url('user/onlineUsers') }}" class="btn btn-outline-info">Online Users</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">inbox</h3>
                        <h3 class="pull-right"></h3>
                    </div>
                    @foreach ($getMessageForUser as $item)
 
                    <table class="table" style="">

                        <tr>
                            <td>
                                <a title="Click to View Profile"
                                href="{{ url('user/view_user_profile/' . $item->id) }}"
                                class="btn btn-outline-primary btn-sm pull-left">{{ $item->from_who }}</a> 

                            </td>

                            <td style="float: inherit;">
                                <i> {{ $item->message }}</i>
                            </td>
                            <td style="float: right">
                                <span style="float: left" class="badge badge-info pull-right">{{
                                    Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                </span>
                            </td>
                            <td style="float: right">
                                @if ($item->from_who=='Administrator1' or $item->from_who=='Administrator2' )
                                <a title="Click to View Delete" href="{{ url('user/deleteMyMessage/' . $item->id) }}"
                                    class="btn btn-outline-danger btn-sm pull-right">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @else
                                <a title="Click to  Delete" href="{{ url('user/deleteMyMessage/' . $item->id) }}"
                                    class="btn btn-outline-danger btn-sm pull-right">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a title="Click to reply"
                                    href="{{ url('user/startChatting/' . $item->from_who) }}"
                                    class="btn btn-outline-primary btn-sm pull-right">
                                    reply
                                </a>
                                @endif

                            </td>
                        </tr>
                    </table>
                    @endforeach

                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $getMessageForUser->links() }}
                        </div>
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