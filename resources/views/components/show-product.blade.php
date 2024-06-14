<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex flex-col md:flex-row -mx-4 mt-20">
        <div class="md:flex-1">
            <div>
                <div class="h-64 md:h-96 rounded-lg sm:h-40 flex justify-center">
                    <img class="productPhoto" src="{{asset($product->photo)}}">
                </div>

                <div class="flex -mx-2 mb-4">

                </div>
            </div>
        </div>
        <div class="md:flex-1 px-4">
            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{$product->name}}</h2>
            <p class="text-black text-l">Estado del producto: {{$product->status}}</p>

            <div class="flex items-center space-x-4 my-4">
                <div>
                    <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                        <span class="font-bold price text-3xl">{{$product->price}}</span>
                        <span class="price mr-1 mt-1">€</span>

                    </div>
                </div>
                <div class="flex-1">
                    <p class="category text-xl font-semibold">{{$product->category->name}}</p>
                    <p class="brand text-sm">Marca: {{$product->brand}}</p>
                </div>
            </div>

            <p class="text-gray-500">{{$product->description}}</p>

            <div class="flex py-4 space-x-4">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item" value="{{$product->id}}">
                    <button type="submit" class="h-14 px-6 py-2 font-semibold rounded-xl cart text-white">
                        Añadir al carrito
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
