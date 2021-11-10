<!DOCTYPE html>
<html>
<head>
    <title>laravel 8 image upload example - ItSolutionStuff.com.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    
<body>
<div class="container">
     
    <div class="panel panel-primary">
        <div class="panel-heading"><h2>Upload Your Image</h2></div>
        <div class="panel-body">
        
            @if (Session::has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button><strong>{{ session('success') }}</strong>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button><strong>{{ session('error') }}</strong>
                </div>
            @endif 
        
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
        
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div><br><a href="{{ url('user/home')}}" class="btn btn-outline-success"> Go Home </a>
                </div>
            </form>
       
    </div>
</div>
</body>
  
</html>