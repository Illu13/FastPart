<link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
<div class="carousel-wrapper w-full">
    <div class="carousel" data-flickity>
    @foreach($randomProducts as $product)
            <div class="carousel-cell mr-24 pl-1">
                <x-product-card :product="$product"></x-product-card>
            </div>
    @endforeach
    </div>
</div>
