<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<style>

*, ::after, ::before {
    box-sizing: border-box;
}
.card-header{
  color:  #48695d;

}
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
.table{
color: #7ea094f0;
}
tbody{
    color: #48695d !important;
}
.table-striped>tbody>tr:nth-of-type(odd) {
    color: #48695d !important;
}

.table tbody tr .action-link a{
  background-color: #7ea094f0;
  border-radius: 10px;
  padding: 5px 10px;
  text-decoration: none;
  color: #102713;
}

</style>
<body>
<div class="card ">
  <div class="card-header  text-center">
     Product Database
  </div>
  <div class="card-body mx-5">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('create-product')}}">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('create-category')}}">Add Category</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link active" aria-current="page" href="{{'/'}}">Refresh </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
  
  <table class="table table-striped">
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
  <p>{{ $message }}</p>
  </div>
  @endif
  @if ($message = Session::get('destroy'))
  <div class="alert alert-danger" role="alert">
  <p>{{ $message }}</p>
  </div>
  @endif
      <thead>
          <tr>
              <th>Serial No.</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Category Name</th>
              <th class="text-center">Action</th>
          </tr>
      </thead>
      <tbody>
        @php($sl = 1)
        @foreach( $products as $product)
        @foreach( $product->categories as $category)
        <tr>
          <td>{{$sl++}}</td>
          <td><img src="{{$product->product_image}}" width="50" height="50" alt="product image"></td>
          <td>{{$product->product_name}}</td>
          <td>{{$category->category_name}}</td>
          <td class="action-link text-center">
            <a href="{{url('edit-product'.$product->id)}}">Edit</a>
            <a href="{{url('delete-product'.$product->id)}}">Delete</a>
            <a href="{{url('show-product'.$product->id)}}">Show</a>
          </td>
        </tr>
        @endforeach
        @endforeach
      </tbody>
  </table>
</div>
</div>
</body>
</html>
