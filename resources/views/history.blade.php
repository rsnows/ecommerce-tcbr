@extends("layout")
@section("scriptjs")
<script>
    $(function(){
        $(".order-info").on("click", function(){
            let id = $(this).attr("data-value")
            $.post("{{ route('orderDetails') }}", { id: id }, (result) => {
                $("#order-content").html(result)
            })
        })
    })
</script>
@endsection
@section("content")

    <div class="col-12">
        <h2>Minhas Compras</h2>
    </div>

    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>Data da compra</th>
                <th>Situação</th>
                <th></th>
            </tr>
            @foreach($list as $order)
            <tr>
                <td>{{ $order->order_date->format("d/m/Y H:i") }}</td>
                <td>{{ $order->statusDesc() }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info order-info" data-value="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#orderModal">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="orderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da compra</h5>
                </div>
                <div class="modal-body">
                    <div id="order-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection