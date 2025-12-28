<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier la Vente #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Client</label>
                        <select name="client_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Produit</label>
                        <select name="product_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    {{ $order->products->first()->id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} ({{ number_format($product->price, 2) }} DH)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Quantité</label>
                        <input type="number" name="quantity" min="1" 
                            value="{{ $order->products->first()->pivot->quantity }}" 
                            class="w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('orders.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>