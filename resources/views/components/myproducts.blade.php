<div>
    <div class="grid grid-cols-4 gap-20 mt-10 w-full h-full">
        @foreach ($products as $product)
            <x-myproductcard :product="$product"/>
        @endforeach
    </div>
</div>
