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
            box-shadow: 0px 2px 7px 2px gray ;
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
            <div class="col-lg-12 col-md-12" style="padding-top: 20px;">
                <div class="card">
                    <div class="card-body">
                         <!--SEARCH HERE-->
                     @include('national-search')
                         <!---SEARXH ENDS HERE--->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12" style="padding-top: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">National Presidents' List</h3>
                        <h3 class="pull-right"> <a
                                href="javascript:void(0)" onclick="window.history.back();" class="btn btn-info">Go
                                Back</a></h3>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        <div class="row el-element-overlay">
                            @foreach ($NationalPresidentDetails as $NationalPresidentDetail)<br />
                            <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                <div class="card bg-white card-hover" >
                                    <div class="card-header">
                                        
                                        <span class="badge badge-success pull-right">{{ $NationalPresidentDetail->gender }}</span>
                                        <br>
                                        <span class="badge badge-success pull-left">From ({{ $NationalPresidentDetail->year_of_tenure_from }}) To ({{ $NationalPresidentDetail->year_of_tenure_to }})</span>
                                    </div>
                                    <div class="card-body" style="height: 100%; width: 100%">
                                        <div class="card-title text-center">
                                            <img src="{{ asset($NationalPresidentDetail->picture)}}" class="img_thumbnails" width="200px"
                                                height="200px" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;"
                                                alt="Ayedun Students' Union"/><br />
                                            {{ strtoupper($NationalPresidentDetail->full_name) }}
                                        </div>
                                        <br />
                                    </div>
                                    <div class="card-footer">
                                        <a title="Click to comment" href="{{ url('NationalPresidentDetail/like/'.$NationalPresidentDetail->id) }}"
                                            class="btn btn-outline-info btn-sm pull-left">
                                            <i class="fa fa-comments"></i>
                                        </a>
                                        <a href="{{ url('user/ViewNationalPresidentProfile/'.$NationalPresidentDetail->id) }}"
                                            class="btn btn-outline-primary btn-sm pull-right">
                                            <i class="fa fa-eye"></i> PROFILE
                                        </a>
                                        <span class="badge badge-success pull-right">{{ $NationalPresidentDetail->compound }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $NationalPresidentDetails->links() }}
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