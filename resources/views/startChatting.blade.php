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

        td {}

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
                    <div class="card-body">
                        <div id="group_chat_history"
                            style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:2px;">
         
              @foreach ($getMessageForUsers as $item1) 
                <table>
                     <tr>
                        <td> {{ $item1->from_who }}</td>
                        <td>
                        <p style="border-color: grey; border-style: solid; border-color:green; border-radius: 100px; padding: 10px; width: 100%">
                        {{ $item1->message }}
                        </p>
                        </td>
                        <td> <span class="badge badge-info -">
                                {{ Carbon\Carbon::parse($item1->created_at)->diffForHumans() }}
                            </span></td>
                    </tr>
                </table>
         @endforeach
                        </div>
                        <div class="card-footer">
                            {{ $getMessageForUsers->links() }}
                        </div>
                        <div class="card-footer">
                            <form action="{{ url('user/sendChat') }}" method="post" novalidate>
                                @csrf

                                <i style="display: none">

                                    <input type="text" name="from_who" placeholder="Type Message ..."
                                        class="form-control" value="{{ $verifyUser->username }}">
                                    <input type="text" name="to_who" placeholder="Type Message ..." class="form-control"
                                        value="{{ $fetchUserdata->username }}">
                                </i>
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>

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
