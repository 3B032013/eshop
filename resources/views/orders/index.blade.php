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
                    {{ __("所有訂單") }}<br>
                    @foreach ($orders as $order)
                        訂單id：{{$order->id}}<br>
                        訂單下訂時間：{{$order->created_at}}<br>
                        <a href={{ route('orders.show',$order->id) }}>點擊查看訂單內容</a>
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
