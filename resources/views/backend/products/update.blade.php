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
    <h2>Create Product</h2>
    <form action="{{route('product.update', $product->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input name="name" value="{{$product->name}}" type="text" class="form-control"  placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label >Author</label>
            <input name="author" value="{{$product->author}}" type="text" class="form-control"  placeholder="Enter Author">
        </div>
        <div class="form-group">
            <label >Category</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
                <option >{{$product->category->name}}</option>
                @foreach($categorys as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >Price</label>
            <input name="price" value="{{$product->price}}" type="text" class="form-control"  placeholder="Enter Price">

        </div>
        <div class="form-group">
            <label >Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$product->description}}</textarea>

        </div>
        <div class="form-group">
            <label >Image</label>
            <input value="{{$product->image}}" name="image" type="file" class="form-control"  >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
