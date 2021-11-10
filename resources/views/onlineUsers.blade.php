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
               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    @include('searchUsers')

                    <div class="card-body">
                        <div class="container">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="70%">Username</td>
                                        <th width="10%">Status</td>
                                        <th width="10%">Action</td>
                                    </tr>
                                    @foreach ($userDatas as $userData)
                                        <tr>
                                            <td>
                                                @if ($userData->username == $verifyUser->username)
                                                @else
                                                    {{ $userData->username }}
                                            </td>
                                            @if ($userData->is_online == '1')
                                            <td><span class="badge badge-success">Online</span> </td>
                                                
                                            @else
                                            <td><span class="badge badge-secondary">Offline</span> </td>
                                            @endif
                                    @endif
                                    <td>
                                        @if ($userData->username == $verifyUser->username)
                                        @else
                                            <a title="Click to View Profile"
                                                href="{{ url('user/startChatting/' . $userData->username) }}"
                                                class="btn btn-outline-primary btn-sm pull-right">
                                                Chat
                                            </a>
                                        @endif
                                    </td>
                                    </tr>

                                    @endforeach
                                </table>
                            </div>
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
