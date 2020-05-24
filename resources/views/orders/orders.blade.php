<!doctype html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Заказы</title>

    </head>
    <style>
    </style>
    <body>
    <div class="container">
        <h1>Orders</h1>
    </div>
    <div class="container">
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
    </div>
    </body>
</html>
