<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title></title>
</head>
<style>
    .navbar .nav-link{
        background-color: #7ea094f0;
        margin-left: 10px;
        border-radius: 10px;
    }
    .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link {
    color: #102713;
    text-transform: uppercase;
    font-weight: bold;
}
</style>
<body>
    <div class="card">
        <div class="card-header  text-center">
            Create Category
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('create-product')}}">Add Product</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link active" aria-current="page" href="{{'/'}}">Home</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
        <div class="card-body">
            <form action="" method="post" class="ml-5" enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ $message }}</p>
                    </div>    
                @endif
                    <div class="form-group mb-3">
                        <label>Category Name</label>
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="submit" name="ctg-btn" class="btn btn-primary btn-block" value="Save">
            </form>
        </div>
    </div>

</body>

</html>