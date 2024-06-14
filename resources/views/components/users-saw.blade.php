<div class="carousel-wrapper w-full mt-24">
    <div class="flex justify-center">
        <h1 class="text-2xl">Otros usuarios también vieron:</h1>
    </div>
    <div class="carousel" data-flickity>
        @foreach($relatedProducts as $product)
            <div class="carousel-cell mr-24 pl-1">
                <x-product-card :product="$product"></x-product-card>
            </div>
        @endforeach
    </div>
</div>
