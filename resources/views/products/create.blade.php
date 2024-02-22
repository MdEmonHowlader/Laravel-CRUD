<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Product</a>
          </li>
        </ul>
      </nav>
      @if ($massege=Session::get('success'))
      <div class="alert alert-success alert-block">
        <strong>
            {{$massege}}
        </strong>

      </div>
          
      @endif
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3">
                    <form method="POST" action="/products/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name </label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                    
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                                
                            @endif

                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</body>
</html>