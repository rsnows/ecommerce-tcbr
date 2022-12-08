@extends("layout")
@section("content")
    @if(isset($categoryList) && count($categoryList) > 0)
        <ul>
            <li><a href="{{ route('category') }}">Todas</a></li>
            @foreach($categoryList as $cat)
            <li><a href="{{ route('categoryById', ['category_id' => $cat->id]) }}">{{ $cat->category_name }}</a></li>
            @endforeach
        </ul>
    @endif

    @include("_products", ['productList' => $productList])

@endsection