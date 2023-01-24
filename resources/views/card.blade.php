<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg" alt="iPhone X 256GB">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} EUR.</p>
            <p>
            <form action ="{{ route('basket-add', $product) }}" method="POST">
            <button type="sumbit" class="btn btn-primary" role="button">Pievienot grozam</button>
            <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default"
                   role="button">Papildinformācija</a>
        @csrf
</form>
    </p>
        
        </div>
    </div>
</div>