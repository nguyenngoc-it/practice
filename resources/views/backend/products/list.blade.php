<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    @csrf
    <a href="{{route('product.create')}}">
        <button class="btn btn-primary">Add Product</button>
    </a>
    <h2>List Product</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Author</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td><img style="width: 100px; height: 80px" src="{{asset('storage/'. $product->image)}}" alt=""></td>
                <td>{{$product->author}}</td>
                <td>@if(isset($product->category))
                        {{$product->category->name}}
                    @endif
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{route('product.delete', $product->id)}}" onclick="return confirm('ban co muon xoa?')">
                        <button class="btn btn-primary">Delete</button>
                    </a>
                    <a href="{{route('product.edit', $product->id)}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
