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
                        <form method="get" id="search-student-form" novalidate>
                            <input name="__RequestVerificationToken" type="hidden"
                                value="CfDJ8MLwQWxgY8BJosaUQFmdheAJnS5exHRf9bKq3LM8bNRzWa036b1rgGUVUtkt9lLtdOWpHHwHzPnF-Os6JecE-KtGkDGHiTDA-M6grWSyNPa1h77TVyRkvZPWbJwqoqkF8gtJzCpc-nnejIeS3L-X7CA" />
                            <div class="form-group">
                                <label for="StudentSearchViewModel_Search"><strong>Search National
                                        President</strong></label>
                                <input type="text" placeholder="Enter Student's Surname e.g. Ade" class="form-control"
                                    data-val="true" data-val-required="Search field is required."
                                    id="StudentSearchViewModel_Search" name="StudentSearchViewModel.Search" value="" />
                                <span class="has-error text-danger field-validation-valid"
                                    data-valmsg-for="StudentSearchViewModel.Search" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <button id="search-btn" class="btn btn-primary btn-sm pull-right">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12" style="padding-top: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title pull-left text-uppercase text-info font-weight-bolder">{{ $compound->Name_of_Compound }} COMPOUND</h5>
                        <h3 class="pull-right"> <a href="javascript:void(0)" onclick="window.history.back();"
                                class="btn btn-info">Go
                                Back</a></h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-x:auto;">
                      <Div>
                          {!!  $compound->history_of_compound!!}
                      </Div>
                    </div>
                    <div class="card-footer">
                        <div class="card card-body bg-transparent">
                         HEAD OF COMPOUND PHONE: <strong> <i class="fa fa-phone"></i> {{ $compound->phone}}</strong>  HIGH-CHIEF {{ $compound->head_of_compound}}
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
