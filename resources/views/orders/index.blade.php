<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Historique des Ventes</h2>
            <a href="{{ route('orders.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-green-700 transition">
                + Nouvelle Vente
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 shadow-sm" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-4 text-gray-700 font-bold">Réf Order</th>
                            <th class="p-4 text-gray-700 font-bold">Client</th>
                            <th class="p-4 text-gray-700 font-bold">Produits</th>
                            <th class="p-4 text-gray-700 font-bold">Total</th>
                            <th class="p-4 text-gray-700 font-bold">Date</th>
                            <th class="p-4 text-gray-700 font-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">#{{ $order->id }}</td>
                            <td class="p-4 font-medium">{{ $order->client->full_name }}</td>
                            <td class="p-4">
                                @foreach($order->products as $product)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                        {{ $product->name }} (x{{ $product->pivot->quantity }})
                                    </span>
                                @endforeach
                            </td>
                            <td class="p-4 font-bold text-green-600">{{ number_format($order->total_price, 2) }} DH</td>
                            <td class="p-4 text-gray-500 text-sm">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            
                            <td class="p-4 flex justify-center space-x-2">
                                <a href="{{ route('orders.edit', $order) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-yellow-600">
                                    Modifier
                                </a>

                                <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Etes-vous sûr d\'annuler cette vente ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-700">
                                        Annuler
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">
                                Aucune vente effectuée pour le moment.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>