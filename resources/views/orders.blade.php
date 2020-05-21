<!doctype html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Weather</title>

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
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->partner->name }}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    </body>
</html>
