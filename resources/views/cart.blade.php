@extends("layout")
@section("content")
    <h3>Carrinho</h3>

    @if(isset($cart) && count($cart) > 0)

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Foto</th>
                <th>Valor</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $index => $p)
                <tr>
                    <td>
                        <a href="{{ route('removeFromCart', [ 'index' => $index])}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td>{{ $p->name }}</td>
                    <td><img src="{{ asset($p->picture) }}" height="50"></img></td>
                    <td>{{ $p->value }}</td>
                    <td>{{ $p->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Nenhum item no carrinho</p>
    @endif
@endsection