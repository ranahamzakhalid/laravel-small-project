<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('category')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>    
    </ul>
  </div>  
</nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">

        @if (session('status'))
          <div class="alert alert-success">{{session('status')}} </div>
        @endif

          <div class="card">
            <div class="card-header">
              <h3>Create Categories </h3>
              <a href="{{url('category')}}" class="btn btn-primary ">Back </a>
            </div>

              <div class="card-body">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
                <form action="{{url('category/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                  </div>

                  <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" row="3"> {{old('Description')}}</textarea>
                  </div>
                  
                  <div class="mb-3">
                    <label>Is_Active</label>
                    <input type="checkbox" name="is_active"  {{old('Is_Active') ==true ? checked:''}}/>
                  </div>

                  <div class="mb-3">
                    <label>Upload</label>
                    <input type="file" name="upload" value="{{old('Upload')}}"/>
                  </div>

                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

</body>
</html>