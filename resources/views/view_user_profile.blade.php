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

        .card:hover {
            box-shadow: 0px 2px 7px 2px gray;
        }

        body {
            font-family: Arial;
        }

    </style>
</head>

<body style="padding-top: 100px">
    @include('layouts.header')
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
        <div class="row mt-12">
            <div class="col-md-12 offset-col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">USER PROFILE</h4>
                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        @if (Session::has('danger'))
                            <div class="alert alert-danger">
                                <span>{{ session('danger') }}</span>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <section class="blog-page">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="blog-item">
                                                    <div>
                                                        <span style="float: left"
                                                            class="badge badge-info pull-right">Account Active since
                                                            {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                                        </span><br>
                                                    </div>
                                                    <div class="down-content">

                                                        <div class="row">
                                                            <details>
                                                                <summary style="background-color:red; color:#fff;">
                                                                    ...See <i class="fa fa-eye"></i>
                                                                    @if ($user->username == $UserId->username)
                                                                        You About info
                                                                    @else {{ $UserId->fullname }}
                                                                        About info
                                                                    @endif
                                                                </summary>
                                                                <table class="table"
                                                                    style=" margin-left:0px;">
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <img src="{{ asset($UserId->picture) }}"
                                                                                class="img-thumbnail" width="100px"
                                                                                width="100px"
                                                                                style="box-shadow: 0px 2px 7px 2px gray ;"
                                                                                alt="Ayedun Students' Union" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            ID NUMBER:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->id_number }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            FULL NAME:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->fullname }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            USER NAME:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->username }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            EMAIL:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->email }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            GENDER:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->gender }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            DATE OF BIRTH:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->date_of_birth }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            COMPOUND:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->compound }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>
                                                                            SCHOOL:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->institution }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            PLACE OF RESIDENCE:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->place_of_residence }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>
                                                                            MARITAL STATUS:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->marital_status }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            PHONE NUMBER:
                                                                        </th>
                                                                        <td>
                                                                            {{ $UserId->phone }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            @if ($user->username == $UserId->username)
                                                                                <button class="btn btn-info" style="float: right; background-color: #4CAF50;
                   color: white;
                   padding: 14px 20px;
                   margin: 8px 0;
                   border: none;
                   cursor: pointer;
                   width: 100%;"> <a style="text-decoration: none; color: #fff; "
                                                                                        href={{ url('user/Edit_profile') }}>Edit/Update</a></button>
                                                                            @else

                                                                                <button class="btn btn-info" style="float: right; background-color: #4CAF50;
                                                  color: white;
                                                  padding: 14px 20px;
                                                  margin: 8px 0;
                                                  border: none;
                                                  cursor: pointer;
                                                  width: 100%;"> <a style="text-decoration: none; color: #fff; "
                                                                                        href={{ url('user/home') }}>GO
                                                                                        HOME</a></button>
                                                                            @endif

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </table>
                                                            </details>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-lg-12 col-md-12" style="padding: 20px;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">
                                    {{ strtoupper($UserId->username) }}'S POSTS</h3>
                                <h3 class="pull-right"><a class="btn btn-primary btn-sm"
                                        href="{{ url('user/startChatting/'. $UserId->username ) }}"><i class="fa fa-envelope"></i> Send Message
                                    </a> <a href="javascript:void(0)" onclick="window.history.back();"
                                        class="btn btn-info">Go Back</a></h3>
                            </div>
                            <div class="card-body">
                                <div class="row el-element-overlay">
                                    @foreach ($All_post as $item)<br />
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="card bg-white card-hover"  style=" 10px; margin-top: 10px">
                                                <div class="card-header">
                                                    @if ($user->id == $item->userId)
                                                        <a title="Click to Delete"  onclick="return confirm('Are you sure you want to delete this {{ $item->username }}?')"
                                                            href="{{ url('user/delete_my_post/' . $item->id) }}">
                                                            <button id="delete-btn" value="0329/133"
                                                                class="btn btn-outline-danger btn-sm">
                                                                <i class="fa fa-trash font-weight-bolder"></i>
                                                            </button>
                                                        </a>
                                                        <a title="Click to Edit"
                                                            href="{{ url('user/editPost/' . $item->id) }}">
                                                            <button id="edit-btn" value="0329/133"
                                                                class="btn btn-outline-info btn-sm">
                                                                <i class="fa fa-edit font-weight-bolder"></i>
                                                            </button>
                                                        </a>
                                                    @endif
                                                    <span class="badge badge-success pull-right">
                                                        {{ strtoupper($item->username) }}
                                                </div>
                                               
                                                    <div class="card-title"
                                                        style="  height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">

                                                        <p>

                                                            @if ($item->video == '' && $item->image == '')
                                                                {!! $item->posting !!}
                                                            @elseif ($item->posting =='' && $item->video=='')
                                                                <img src="{{ asset($item->image) }}"
                                                                    class="img-thumbnail" width="100%" height="190%" />

                                                                <p>
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
                                                    @php
                                                        $isLiked = $item->likes
                                                            ->whereIn('post_id', [$item->id])
                                                            ->whereIn('user_id', [$user->id])
                                                            ->count();
                                                    @endphp

                                                    @if ($isLiked)
                                                        <a title="Click to Like"
                                                            href="{{ url('user/like/' . $item->id) }}"
                                                            class="btn btn-primary btn-sm pull-left">
                                                            <i class="fa fa-thumbs-up"></i>
                                                            <span>{{ $item->likes->count() }}</span>
                                                        </a>
                                                    @else
                                                        <a title="Click to Unlike"
                                                            href="{{ url('user/unlike/' . $item->id) }}"
                                                            class="btn btn-inverse btn-sm pull-left">
                                                            <i class="fa fa-thumbs-up"></i>
                                                            <span>{{ $item->likes->count() }}</span>
                                                        </a>
                                                    @endif
                                                    
                                                    <a title="Click to comment"
                                                        href="{{ url('user/commentPage/' . $item->id) }}"
                                                        class="btn btn-outline-info btn-sm pull-left">
                                                        <i class="fa fa-comments"></i>
                                                        @php
                                                        $kounter = 0;
                                                    @endphp
                                                    @foreach ($whoComment as $Comment)
                                                    @if ($Comment->postId==$item->id)
                                                    @php
                                                    $kounter = $kounter+1;
                                                     @endphp
                                                    @endif
                                                    
                                                    @endforeach 
                                                    @php
                                                    $kounter +1;
                                                @endphp
                                                    <span>{{ $kounter }}</span>                                                   
                                                    
                                                    </a>

                                                    <a href="{{ url('user/view_user_profile/' . $user->id) }}"
                                                        class="btn btn-primary btn-sm pull-right">
                                                        PROFILE
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card card-body bg-transparent">
                                    {{ $All_post->links() }}
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

    </div>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
</body>

</html>
