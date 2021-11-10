<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin | Dashboard</title>
  @include('admin.layouts.styles')
  <style>
    .help-block {
      color: #dc3545;
    }

    .has-error {
      color: #dc3545;
    }

    summary {
      background-color: greenyellow;
      font-size: 15px;
    }

    summary:hover {
      color: rgb(240, 218, 218);
      background-color: green;
    }
  </style>
</head>

<body style="padding-top: 1px">
  <!-- sidebar -->
    @include('admin.layouts.sidebar')
  <!-- Navbar -->
 <!---NAVBAR HERE-->
 @include('admin.layouts.navbar')
 <!-- NAVBAR ENDS HERE--->
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MISS ASU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Miss ASU</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (Session::has('success'))
        <div class="alert alert-success">
          <span>{{ session('success') }}</span>
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">
          <span>{{ session('error') }}</span>
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table below shows all the Available Sport Directors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <td colspan="12" id="header">
                      <h1>All Miss ASU<h1>
                    </td>
                  </tr>
                  <tr>
                    <th width="340px">@sortablelink('Fullname')</th>
                    <th width="340px">@sortablelink('Compound')</th>
                    <th width="135px">@sortablelink('Gender')</th>
                    <th width="135px">@sortablelink('Descipline')</th>
                    <th width="135px">@sortablelink('Institution')</th>
                    <th width="135px">@sortablelink('Date Of Birth')</th>
                    <th width="135px">@sortablelink('Tenure Year From')</th>
                    <th width="135px">@sortablelink('Tenure Year To')</th>
                    <th width="135px">@sortablelink('Sport')</th>
                    <th width="135px">@sortablelink('History')</th>
                    <th width="200px">@sortablelink('DP')</th>
                    <th width="100px">ACTION</th>
                  </tr>
                  @foreach($MissAsus as $MissAsu)
                  <tr>
                    <td width="80px">{{ $MissAsu->full_name }}</td>
                    <td width="135px">{{ $MissAsu->compound }}</td>
                    <td width="80px">{{ $MissAsu->gender }}</td>
                    <td width="100px">{{ $MissAsu->discepline }}</td>
                    <td width="80px">{{ $MissAsu->institution }}</td>
                    <td width="100px">{{ $MissAsu->date_of_birth }}</td>
                    <td width="100px">{{ $MissAsu->year_of_tenure_from }}</td>
                    <td width="100px">{{ $MissAsu->year_of_tenure_to }}</td>
                    <td width="100px">{{ $MissAsu->sport }}</td>
                    <td width="100px">{{ $MissAsu->history }}</td>
                    <td width="700px"><img src="{{ asset($MissAsu->picture) }}" class="img-thumbnail"
                      width="200px" width="200px" style="box-shadow: 0px 2px 7px 2px gray ;"
                      alt="Ayedun Students' Union" style="border-radius: 100px"/></td>
                    <td width="340px">


                      <a onclick="return confirm('Are you sure you want to delete {{$MissAsu->full_name}}?')"
                        href="{{url('administrator/Delete_MissAsu', $MissAsu->id)}}" title="Delete sport Director">
                        <i class="fas fa-trash text-danger  fa-lg"></i></a>

                      <a title="Click to Like" href="{{ url('administrator/Edit_MissAsu/'.$MissAsu->id) }}"> <button
                          id="edit-btn" value="0329/133" class="btn btn-outline-info btn-sm">
                          <i class="fa fa-edit font-weight-bolder"></i>
                        </button></a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>


              <div class="card-footer">
                <div class="card card-body bg-transparent">
                  {{ $MissAsus->links() }}
                </div>
              </div>
            </div>
            <!-- /.col -->

            <!-- Form To Add Compound-->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> <strong>ADD NEW ELECTED MISS ASU<strong></h4>
              </div>
              <div class="card card-body bg-transparent">

                <form method="POST" novalidate>
                  @csrf
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control"
                          value="{{ old('full_name') }}" placeholder="Enter your full Name">
                        @if ($errors->has('full_name'))
                        <span class="font-weight-bold">{{ $errors->first('full_name') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('compound') ? 'has-error' : '' }}">
                        <label for="compound">Compound</label>
                        <select type="text" name="compound" id="compound" class="form-control"
                          value="{{ old('compound') }}">
                          <option value="">...Select...</option>
                          @foreach ($getCompound as $compound)

                          <option value=" {{ $compound ->Name_of_Compound}}"> {{ $compound ->Name_of_Compound}}</option>

                          @endforeach
                          @if ($errors->has('compound'))
                          <span class="font-weight-bold">{{ $errors->first('compound') }}</span>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <label for="gender">Gender</label>
                        <select type="text" name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                          <option value="">...Select...</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>

                          @if ($errors->has('gender'))
                          <span class="font-weight-bold">{{ $errors->first('gender') }}</span>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('discepline') ? 'has-error' : '' }}">
                        <label for="discepline" class="form-label">Descipline</label>
                        <input type="text" name="discepline" class="form-control" id="discepline"
                          value="{{ old('discepline') }}" placeholder="Enter your descipline">
                        @if ($errors->has('discepline'))
                        <span class="font-weight-bold">{{ $errors->first('discepline') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">
                        <label for="institution">Institution</label>
                        <select type="text" name="institution" id="institution" class="form-control"
                        value="{{ old('institution') }}">
                        <option value="">...Select...</option>
                        @foreach ($listOfSchools as $listOfSchool)

                        <option value=" {{ $listOfSchool ->ListSchools}}"> {{ $listOfSchool ->ListSchools}}</option>

                        @endforeach
                        @if ($errors->has('institution'))
                        <span class="font-weight-bold">{{ $errors->first('institution') }}</span>
                        @endif
                      </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                        <label for="date_of_birth">Date_of_birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                          value="{{ old('date_of_birth') }}">
                        @if ($errors->has('date_of_birth'))
                        <span class="font-weight-bold">{{ $errors->first('date_of_birth') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('year_of_tenure_from') ? 'has-error' : '' }}">
                        <label for="year_of_tenure_from">Year_of_tenure_from</label>
                        <input type="date" name="year_of_tenure_from" id="year_of_tenure_from" class="form-control"
                          value="{{ old('year_of_tenure_from') }}">
                        @if ($errors->has('year_of_tenure_from'))
                        <span class="font-weight-bold">{{ $errors->first('year_of_tenure_from') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('year_of_tenure_to') ? 'has-error' : '' }}">
                        <label for="year_of_tenure_to">Year_of_tenure_to</label>
                        <input type="date" name="year_of_tenure_to" id="year_of_tenure_to" class="form-control"
                          value="{{ old('year_of_tenure_to') }}">
                        @if ($errors->has('year_of_tenure_to'))
                        <span class="font-weight-bold">{{ $errors->first('year_of_tenure_to') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('sport') ? 'has-error' : '' }}">
                        <label for="sport">Sport</label>
                        <select type="text" name="sport" id="sport" class="form-control" value="{{ old('sport') }}">
                          <option value="">...Select...</option>
                          <option value="Hockey">Hockey</option>
                          <option value="Ludo">Ludo</option>
                          <option value="Draft">Draft</option>
                          <option value="Volley Ball">Volleyy Ball</option>
                          <option value="Table Tennies">Table Tennies</option>
                          <option value="Long Tennies">Long Tennies</option>
                          <option value="Swimming">Swimming</option>
                          <option value="Town Race">Town Race</option>
                          <option value="None">None</option>



                          @if ($errors->has('sport'))
                          <span class="font-weight-bold">{{ $errors->first('sport') }}</span>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('history') ? 'has-error' : '' }}">
                        <div>
                          <textarea id="text" cols="30" rows="4" name="history"
                            placeholder="Short history..."></textarea>
                        </div>
                        @if ($errors->has('history'))
                        <span class="font-weight-bold">{{ $errors->first('history') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                        <span class="font-weight-bold">{{ $errors->first('phone') }}</span>
                        @endif
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Create</button>
                    <a  href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-info btn-lg btn-block">Go Back</a>
                  </div>
                </form>

              </div>
              <div class="card-footer">
                <div class="card card-body bg-transparent">
                  Please enter a valid information
                </div>
              </div>

              <!-- /.row -->



            </div>
          </div>
          <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')
@include('admin.layouts.scripts')
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  Toast.fire({
    icon: 'success',
    title: 'Administrator! Here You Can Manage MISS ASU'
  })
</script>
</body>

</html>