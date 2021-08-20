@php
    function findCategory($selected_prodcuts ,$category){
        foreach ($selected_prodcuts as $selected_prodcut){
            if($selected_prodcut == $category){
                return true;
            }
        }
        return false;
    }
@endphp

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
    .action-link .btn {
        background-color: #7ea094f0;
        border-radius: 10px;
        padding: 5px 10px;
        text-decoration: none;
        color: #102713;
        font-weight: bold;
    }

    .card-header {
        color: #102713;
        font-weight: bold;
    }

    .card-body .form-group .form-lavel {
        color: #162f19;
        font-weight: bold;

    }
</style>

<body>
    <div class="card">
        <div class="card-header  text-center">
            Edit Products
        </div>
        <div class="card-body">
            <form action="{{route('product-update',$product->id)}}" method="post" class="ml-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label for="category_name" class="form-lavel">Category Name :</label>
                     <select name="category_name">
                        
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{findCategory($selected_prodcut, $category->id) ? 'selected' : ''}}>                      
                            {{$category->category_name}}
                        </option>
                        @endforeach
                        
                    </select>
                    @error('category_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    
                    <div class="form-group mb-3">
                        <label for="product_name" class="form-lavel">Product Name :</label>
                        <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                        @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>   
                    <div class="form-group mb-3">
                        <label for="product_image" class="form-lavel">Image :</label>
                        <input type="file" name="product_image" class="form-control" value="">
                        <img src="{{$product->product_image}}" width="50" height="50" alt="">
                        @error('product_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="action-link">
                        <input type="submit" name="ctg-btn" class="btn btn-block" value="Update">
                    </div>
               
            </form>
        </div>
    </div>
</body>

</html>
