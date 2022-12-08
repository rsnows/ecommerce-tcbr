@extends("layout")
@section("content")
    @include("_products", ['productList' => $productList])
@endsection