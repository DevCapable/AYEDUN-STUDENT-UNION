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
                  <!-- /.card-header -->
                  <div class="card-body" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-hover" style="overflow-x:auto;">
                       
                        @foreach ($Likes as $Liker)
                        
                            <tr>
                                @if ($Liker->user_id == $AllUsers->)
                                <td width="80px">{{ $AllUsers->username }}</td>
                                @endif
                                <td > <img src="{{ asset($Liker->id) }}" style=" width:80px; border-radius: 100px;" class="img-thumbnail"
                                    width="75" /></td>
                                <td width="80px">{{ $Liker->user_id }}</td>
                                
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <div class="card card-body bg-transparent">
                        {{ $Likes->links() }}
                    </div>
                </div>

            </div>
            <!-- /.col -->
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
