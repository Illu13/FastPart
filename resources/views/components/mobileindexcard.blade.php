
<div class="bg-white rounded-lg shadow cardIndex w-96">
        <img src="{{ asset($product->photo) }}" alt="Foto de perfil de {{ $product->name }}" height="350px">
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{ $product->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-white">{{$product->description}}</p>
        <div class="grid grid-cols-2">
            <div class="col-span-1 text-left text-gray-900">
                <p>{{$product->price}}€</p>
            </div>
            <div class="col-span-1 text-right text-gray-900">
                <p>{{$product->user->name}} {{$product->user->surname}}</p>
            </div>
        </div>
    </div>
</div>
