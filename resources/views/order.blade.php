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
                            <h1>Apstipriniet pasūtījumu:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Kopējās izmaksas: <b>{{ $order->getFullPrice() }} EUR.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>Ievadiet savu vārdu un tālruņa numuru, lai mūsu menedžeris varētu ar jums sazināties:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Vārds: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Telefona numurs:  </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                    <br>
                    <input type="hidden" name="_token" value="N9mQctDJ5NVVqdsKQrJ2PSQnInH8MRnOTPLkQbHT"> 
                    <br>    
                    @csrf               
                    <input type="submit" class="btn btn-success" value="Apstipriniet pasūtījumu">
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>