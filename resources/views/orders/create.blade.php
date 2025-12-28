<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Effectuer une Vente</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Client</label>
                        <select name="client_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Sélectionner le client --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Produit</label>
                        <select name="product_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Sélectionner le produit --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} ({{ number_format($product->price, 2) }} DH) - Stock: {{ $product->quantity }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Quantité</label>
                        <input type="number" name="quantity" min="1" value="1" class="w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('orders.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Annuler</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Confirmer la Vente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>