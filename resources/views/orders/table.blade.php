
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ид_заказа</th>
        <th scope="col">название_партнера</th>
        <th scope="col">стоимость_заказа</th>
        <th scope="col">наименование_состав_заказа</th>
        <th scope="col">статус_заказа</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $orders as $order )
        <tr>
            <th scope="row"><a href="{{ route('orders.edit', $order->id) }}">{{ $order->id }}</a></th>
            <td>{{ $order->partner->name }}</td>
            <td>{{ $order->order_price }}</td>
            <td>
                @foreach( $order->products as $index => $product)
                    {{ $product->name }} <br>
                @endforeach
            </td>
            <td>
                @if($order->status == 0)
                    Новый
                @elseif($order->status == 10)
                    Подтвержден
                @elseif($order->status == 20)
                    Завершен
                @endif
            </td>
        </tr>

    @endforeach
    </tbody>
</table>