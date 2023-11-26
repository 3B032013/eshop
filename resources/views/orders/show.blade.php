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
                    {{ __("訂單編號 $order->id 的訂單內容") }}<br><br>
                    @foreach ($order->orderItems as $orderItem)
                        商品類別：{{$orderItem->product->category->name}}<br>
                        商品：{{$orderItem->product->name}}
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
