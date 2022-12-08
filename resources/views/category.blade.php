<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Categories</h2>

    @if(isset($categoryList) && count($categoryList) > 0)
        <ul>
            @foreach($categoryList as $cat)
            <li>{{ $cat->category_name }}</li>
            @endforeach
        </ul>
    @endif

    @if(isset($productList) && count($productList) > 0)
        <ul>
            @foreach($productList as $prod)
            <li>{{ $prod->name }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>