<table class="table table-bordered">
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach($itemList as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->amount }}</td>
        <td>{{ $item->item_value }}</td>
    </tr>
    @endforeach
</table>