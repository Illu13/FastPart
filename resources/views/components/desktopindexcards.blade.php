<div class="centrarFlex mt-10 grid grid-cols-3 gap-2">
    @foreach($products as $product)
        <div class="centrar col-span-1">
        <x-mobileindexcard :product="$product"/>
        </div>
    @endforeach
</div>
