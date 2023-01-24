<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViAn veikals</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">ViAn veikals</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="{{ route('index') }}">Visas preces</a></li>
                <li class="active"><a href="{{ route('categories') }}">Kategorijas</a>
                </li>
                <li ><a href="{{ route('basket') }}">Grozs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/login">Pieslēgties</a></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ route('register') }}">Reģistrēties</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="starter-template">
                            <h1>Grozs</h1>
    <p>Pasūtījuma noformēšana</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nosaukums</th>
                <th>Daudzums</th>
                <th>Cena</th>
                <th>Izmaksas</th>
            </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                            <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $product->pivot->count }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <button type="submit" class="btn btn-success"
                                href=""><span 
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
</form>     
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-danger"
                                href=""><span 
                                class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                       @csrf         
</form>
</div>
                    </td>
                    <td>{{ $product->price }} EUR.</td>
                    <td>{{ $product->getPriceForCount() }} EUR.</td>
                </tr>
@endforeach
                
                           
                        <tr>
                <td colspan="3">Kopejas izmaksas</td>
                <td>{{ $order->getFullPrice() }} EUR.</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="/basket/place">Noformēt pasūtījumu</a>
        </div>
    </div>
    </div>
</div>
</body>
</html>
