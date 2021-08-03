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

<body>
    <div class="card">
        <div class="card-header  text-center">
            Products Information
        </div>
        <div class="card-body">
            <form action="{{route('product.index')}}" method="post" class="ml-5" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Category Name</label>
                    <select name="category_name" id="">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->category_name}}
                        </option>
                        @endforeach
                    </select>
                    @error('category_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    <div class="form-group mb-3">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                        @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product_image">Image</label>
                        <input type="file" name="product_image" class="form-control">
                        @error('product_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="submit" name="ctg-btn" class="btn btn-primary btn-block" value="Save">
            </form>
        </div>
    </div>

</body>

</html>