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
            @include('searchUsers')
            <!---SEARXH ENDS HERE--->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12" style="padding-top: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pull-left text-uppercase text-info font-weight-bolder">All Compounds</h3>
                        <h3 class="pull-right"> <a href="javascript:void(0)" onclick="window.history.back();"
                                class="btn btn-info">Go
                                Back</a></h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-x:auto;">
                        <table id="example2" class="table table-bordered table-hover" style="overflow-x:auto;">

                            <tr>

                                <th width="80px">@sortablelink('Name of compound')</th>
                                <th width="80px">@sortablelink('Head of compound')</th>
                                <th width="60px">@sortablelink('Origin of compound')</th>
                                <th width="30px">@sortablelink('Culture of compound')</th>
                                <th width="30px">ACTION</th>
                            </tr>
                            @foreach ($compounds as $compound)
                                <tr>

                                    <td width="80px">{{ $compound->Name_of_Compound }}</td>
                                    <td width="80px">{{ $compound->head_of_compound }}</td>
                                    <td width="60px">{{ $compound->origin }}</td>
                                    <td width="30px">{{ $compound->culture_of_compound }}</td>
                                    <td width="30px">

                                        <a title="Click to View history"
                                            href="{{ url('/historyOfAyedun') }}"> <button
                                                id="edit-btn" value="0329/133" class="btn btn-outline-info btn-sm">
                                                <i class="fa fa-eye font-weight-bolder"></i> View History
                                            </button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                            {{ $compounds->links() }}
                        </div>
                    </div>

                </div>
                <!-- /.col -->
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
