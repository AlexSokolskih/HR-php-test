<!doctype html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/app.js" defer></script>
        <title>Заказы</title>

    </head>
    <style>
    </style>
    <body>
    <div class="container">
        <h1>Orders</h1>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#expired">просроченные</a>
            </li>
            <li>
                <a data-toggle="tab" href="#current">текущие</a>
            </li>
            <li>
                <a data-toggle="tab" href="#new">новые</a>
            </li>
            <li>
                <a data-toggle="tab" href="#completed">выполненные</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="expired">
                @component('orders.table', ['orders' => $ordersExpired ])
                @endcomponent
            </div>
            <div class="tab-pane" id="current">
                @component('orders.table', ['orders' => $ordersCurrent ])
                @endcomponent
            </div>
            <div class="tab-pane" id="new">
                @component('orders.table', ['orders' => $ordersNew ])
                @endcomponent
            </div>
            <div class="tab-pane" id="completed">
                @component('orders.table', ['orders' => $ordersCompleted ])
                @endcomponent
            </div>
        </div>
    </div>
    <div class="container">

    </div>
    </body>
</html>
