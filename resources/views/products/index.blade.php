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
     <div class="container">
        <div class="text-right">
            <a href="/products/create" class="btn btn-warning mt-2">New Product</a>
        </div>
        <table class="table table-hover table-dark mt-2">
          <thead>
            <tr>
              <th scope="col">Sno.</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $key=> $product)
                
            
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$product->name}}</td>
              <td>
                <img src="{{asset('product/'.$product->image)}}" width="50" height="50">
              </td>
              <td>
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                <a href="product/{{$product->id}}/delete" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
     
    </div>
</body>
</html>