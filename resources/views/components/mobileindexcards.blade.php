<div class="centrar mt-10 lg: hidden">
    @foreach($products as $product)
    <x-mobileindexcard :product="$product"/>

    @endforeach

</div>
