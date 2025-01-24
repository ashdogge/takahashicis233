<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <h1>Products</h1>
    @foreach($products as $product)
        <ul>
            <img>
            <a href="/products/{{$product->id}}">{{$product->name}} ${{$product->price}}</a>
            <p>Item Number: {{$product->item_number}}</p>
            <img height="200" width="200" src="{{$product->image}}"></img>
            </li>
        </ul>
    @endforeach
</body>

</html>