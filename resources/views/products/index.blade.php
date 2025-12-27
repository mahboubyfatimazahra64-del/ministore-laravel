<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des Produits
            </h2>
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Ajouter un Produit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-3 font-bold uppercase text-sm text-gray-600">Produit</th>
                            <th class="p-3 font-bold uppercase text-sm text-gray-600">Catégorie</th>
                            <th class="p-3 font-bold uppercase text-sm text-gray-600 text-center">Prix</th>
                            <th class="p-3 font-bold uppercase text-sm text-gray-600 text-center">Quantité</th>
                            <th class="p-3 font-bold uppercase text-sm text-gray-600 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-3 text-gray-700 font-medium">{{ $product->name }}</td>
                                <td class="p-3">
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-bold uppercase">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td class="p-3 text-center text-green-600 font-bold">{{ number_format($product->price, 2) }} DH</td>
                                <td class="p-3 text-center text-gray-600">{{ $product->quantity }}</td>
                                <td class="p-3 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-6 text-center text-gray-500">Aucun produit trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>