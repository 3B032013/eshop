<x-app-layout>c
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("你的購物車內容") }}<br>
                    @foreach ($cartItems as $cartItem)
                        商品id：{{$cartItem->product_id}}<br>
                        商品類別：{{$cartItem->product->category->name}}<br>
                        商品名稱：{{$cartItem->product->name}}
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
