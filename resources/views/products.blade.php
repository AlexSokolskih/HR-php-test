<!doctype html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script src="/js/script.js" defer></script>

        <title>Продукты</title>

    </head>
    <style>
    </style>
    <body>
    <div class="container">
        <h1>Products</h1>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ид_продукта</th>
                <th scope="col">наименование_продукта</th>
                <th scope="col">наименование_поставщика</th>
                <th scope="col">цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $products as $product )
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->vendor->name }}</td>
                    <td>
                        <form action="#" class="form-inline">
                            <div class="form-group mb-2 ">
                                <input type="text" value="{{ $product->price }}" class="form-control-plaintext my-product-input" data-productid="{{ $product->id }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2" onclick="changePrice(this)">Установить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    </body>
</html>
