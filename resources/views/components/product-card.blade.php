<div class="wrapper h-0">

    <div class="product-img">
        <img src="{{asset($product->photo)}}" width="500px" height="420px" alt="product photo">
    </div>
    <div class="product-info">
        <div class="product-text">
            <h1>{{$product->name}}</h1>
            <h2>{{$product->brand}}</h2>
            <p>{{$product->description}}</p>
        </div>
        <div class="product-price-btn mt-20">
            <p><span>{{$product->price}}</span>€</p>
            <a>
                <div class="w-full flex justify-center">
                    <form method="GET" action="{{ route('product.show', $product->id) }}">
                        <input type="submit" value="Ver producto">
                    </form>
                </div>
            </a>
        </div>
    </div>
</div>

