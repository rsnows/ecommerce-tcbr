@extends("layout")
@section("content")
    <div class="col-2">
        @if(isset($categoryList) && count($categoryList) > 0)
            <div class="list-group">
                    <a href="{{ route('category') }}"
                    class="list-group-item list-group-item-action @if($category_id == 0) active @endif">Todas</a>
                    @foreach($categoryList as $cat)
                    <a href="{{ route('categoryById', ['category_id' => $cat->id]) }}"
                    class="list-group-item list-group-item-action @if($cat->id == $category_id) active @endif">{{ $cat->category_name }}</a>
                    @endforeach
            </div>
        @endif
    </div>
    
    <div class="col-10">
        @include("_products", ['productList' => $productList])

    </div>


@endsection