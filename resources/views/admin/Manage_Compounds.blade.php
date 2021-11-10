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
    summary{
      background-color: greenyellow;
      font-size: 15px;
    }
    summary:hover{
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
            <h1>MANAGE COMPOUNDS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Compounds</li>
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
                <h3 class="card-title">Table below shows all the Available Compounds</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <td colspan="11" id="header">
                      <h1>All Compounds<h1>
                    </td>
                  </tr>
                  <tr>
                    <th width="340px">@sortablelink('S/N')</th>
                    <th width="135px">@sortablelink('Name of compound')</th>
                    <th width="135px">@sortablelink('Head of compound')</th>
                    <th width="80px">@sortablelink('History of compound')</th>
                    <th width="100px">@sortablelink('Origin of compound')</th>
                    <th width="80px">@sortablelink('Culture of compound')</th>
                    <th width="80px">Phone</th>
                    
                    <th width="100px">ACTION</th>
                  </tr>

                  @foreach($compounds as $compound) 
                  <tr>

                    <td width="80px">{{ $compound->id }}</td>

                    <td width="135px">{{ $compound->Name_of_Compound }}</td>
                    <td width="80px">{{ $compound->head_of_compound }}</td>
                    <td width="100px">{{ $compound->history_of_compound }}</td>
                    <td width="80px">{{ $compound->origin }}</td>
                    <td width="100px">{{ $compound->culture_of_compound }}</td>
                    <td width="100px">{{ $compound->phone }}</td>
                    <td width="340px">
                      <a title="Click to Delete Compound"  onclick="return confirm('Are you sure you want to delete {{$compound->Name_of_Compound}} {{'COMPOUND'}}?')" href="{{ url('administrator/Delete_Compound/'.$compound->id) }}"> <button id="delete-btn" value="0329/133" class="btn btn-outline-danger btn-sm">
                        <i class="fa fa-trash font-weight-bolder"></i>
                      </button></a>
                     
                      <a title="Click to Like" href="{{ url('administrator/Edit_Compound/'.$compound->id) }}"> <button id="edit-btn" value="0329/133" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-edit font-weight-bolder"></i>
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
      <!-- Form To Add Compound-->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> <strong>ADD COMPOUND<strong></h4>
  </div>
    <div class="card card-body bg-transparent">
      
     
      <form method="POST" novalidate>
        @csrf
        <div class="row">
          <form method="POST" enctype="multipart/form-data">
            @csrf
              <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
                </div>
          </form>
          <div class="col-md-6">
           
           <div class="form-group {{ $errors->has('Name_of_Compound') ? 'has-error' : '' }}">
                <label for="Name_of_Compound">Compound Name</label>
                <input type="text" name="Name_of_Compound" id="Name_of_Compound" class="form-control"
                    value="{{ old('Name_of_Compound') }}">
                @if ($errors->has('Name_of_Compound'))
                <span class="font-weight-bold">{{ $errors->first('Name_of_Compound') }}</span>
                @endif
            </div>
        </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('head_of_compound') ? 'has-error' : '' }}">
                    <label for="head_of_compound">Head of Compound</label>
                    <input type="text" name="head_of_compound" id="head_of_compound" class="form-control"
                        value="{{ old('head_of_compound') }}">
                    @if ($errors->has('head_of_compound'))
                    <span class="font-weight-bold">{{ $errors->first('head_of_compound') }}</span>
                    @endif
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-group {{ $errors->has('history_of_compound') ? 'has-error' : '' }}">
                    <label for="history_of_compound" class="form-label">History of Compound</label>
                    <input type="text" name="history_of_compound" class="form-control" id="history_of_compound"
                        value="{{ old('history_of_compound') }}">
                    @if ($errors->has('history_of_compound'))
                    <span class="font-weight-bold">{{ $errors->first('history_of_compound') }}</span>
                    @endif
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group {{ $errors->has('origin') ? 'has-error' : '' }}">
                    <label for="origin">Origin</label>
                    <input type="text" name="origin" id="origin" class="form-control"
                        value="{{ old('origin') }}">
                    @if ($errors->has('origin'))
                    <span class="font-weight-bold">{{ $errors->first('origin') }}</span>
                    @endif
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group {{ $errors->has('culture_of_compound') ? 'has-error' : '' }}">
                  <label for="culture_of_compound">Culture of Compound</label>
                  <select type="text" name="culture_of_compound" id="culture_of_compound" class="form-control"
                      value="{{ old('culture_of_compound') }}">
                      <option value="">...Select...</option>
                      <option value="Equngun">Equngun</option>
                      <option value="Hepa">Hepa</option>
                      <option value="Ifa">Ifa</option>
                      <option value="Elewe">Elewe</option>
                      <option value="None">None</option>
                      @if ($errors->has('culture_of_compound'))
                      <span class="font-weight-bold">{{ $errors->first('culture_of_compound') }}</span>
                      @endif
                  </select>
              </div>           
           </div>
           <div class="col-md-6">
                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">Comp. Head Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control"
                        value="{{ old('phone') }}">
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
    title: 'Administrator! Here You Can Manage Compound'
  })
</script>
</body>
</html>
