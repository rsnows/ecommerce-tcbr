@if(isset($productList))
    <div class="row">
        @foreach($productList as $prod)
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{ asset($prod->picture) }}" class="card-img-top" />
                        <div class="card-body">
                            <h6 class="card-title">{{ $prod->name }} - R$ {{ $prod->value }}</h6>
                            <a href="{{ route('addToCart', ['product_id' => $prod->id]) }}" class="btn btn-sm btn-secondary">Adicionar Item</a>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
@endif