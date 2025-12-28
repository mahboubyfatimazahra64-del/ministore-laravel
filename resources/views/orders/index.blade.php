<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Historique des Ventes') }}
            </h2>
            <a href="{{ route('orders.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-green-700 transition">
                + Nouvelle Vente
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-indigo-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Chiffre d'Affaires</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($orders->sum('total_price'), 2) }} DH</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Ventes</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $orders->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Panier Moyen</p>
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $orders->count() > 0 ? number_format($orders->avg('total_price'), 2) : 0 }} DH
                    </p>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-4 text-gray-700 font-bold">Réf</th>
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
                            <td class="p-4 text-sm">#{{ $order->id }}</td>
                            <td class="p-4 font-medium text-sm">{{ $order->client->full_name ?? 'Client inconnu' }}</td>
                            <td class="p-4">
                                @foreach($order->products as $product)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mb-1">
                                        {{ $product->name }} (x{{ $product->pivot->quantity }})
                                    </span>
                                @endforeach
                            </td>
                            <td class="p-4 font-bold text-green-600 text-sm">{{ number_format($order->total_price, 2) }} DH</td>
                            <td class="p-4 text-gray-500 text-xs">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-4 flex justify-center space-x-2">
                                <a href="{{ route('orders.edit', $order->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-xs font-bold">Modifier</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Safi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-xs font-bold">Annuler</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">Aucune vente.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>