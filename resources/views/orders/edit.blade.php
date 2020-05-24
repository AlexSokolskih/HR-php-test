<!doctype html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Редактированиe заказа</title>

    </head>
    <style>
    </style>
    <body>
    <div class="container">
        <h1>Редактированиe заказа</h1>
    </div>
    <div class="container">
        <form action="{{ route('orders.update', $order->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email клиента</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $order->client_email }}" requaired>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="partner">партнер</label>
                <select class="form-control" id="partner" name="partner" required>
                    @foreach($partners as $index => $partner )
                    <option value="{{ $partner->id }}"
                    @if($partner->id == $order->partner_id) selected @endif>
                        {{ $partner->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <br>
            <hr>
            <div class="form-group">
            <h5>Состав заказа:</h5>
                @foreach($order->products as $index => $product)
                <p><b>{{$product->name}}</b> {{ $product->pivot->quantity }} шт</p>
                @endforeach
            </div>
            <div class="form-group">
                <label for="status">Статус заказа</label>
                <select class="form-control" id="status" name="status" required>
                    @if($order->status == 0)
                        <option value="0" selected>новый</option>
                    @else
                        <option value="0">новый</option>
                    @endif
                    @if($order->status == 10)
                        <option value="10" selected>подтвержден</option>
                    @else
                        <option value="10">подтвержден</option>
                    @endif
                    @if($order->status == 20)
                        <option value="20" selected>завершен</option>
                    @else
                        <option value="20">завершен</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <h4>Cтоимость заказа: {{ $order->orderPrice }}</h4>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
    </body>
</html>
