<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Liste des Produits
            </h2>
            <a href="{{ route('products.create') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-purple-700 hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold shadow-md">
                + Ajouter un Produit
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-200">

                @if(session('success'))
                    <div class="mb-6 p-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 rounded-r-xl shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="p-8">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-600 border-b-2 border-purple-300">
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm">Produit</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm">Catégorie</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm text-center">Prix</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm text-center">Quantité</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50/80 hover:via-purple-50/80 hover:to-pink-50/80 transition-all duration-300 group transform hover:scale-[1.01] hover:shadow-md">
                                <td class="p-4 text-gray-800 font-bold group-hover:text-blue-600 transition-colors duration-300">{{ $product->name }}</td>
                                <td class="p-4">
                                    <span class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 text-purple-700 px-4 py-2 rounded-full text-xs font-bold uppercase shadow-md group-hover:shadow-lg transition-all duration-300">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td class="p-4 text-center text-green-600 font-black text-xl group-hover:text-green-700 transition-colors duration-300">{{ number_format($product->price, 2) }} DH</td>
                                <td class="p-4 text-center text-gray-600 font-bold group-hover:text-purple-600 transition-colors duration-300">{{ $product->quantity }}</td>
                                    <td class="p-4 text-right">
                                        <div class="flex justify-end gap-4">
                                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-white hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 px-4 py-2 rounded-xl transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-110">
                                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Modifier
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-white hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-600 px-4 py-2 rounded-xl transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-110" onclick="return confirm('Supprimer ce produit ?')">
                                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-12 text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-5v2m0 0v2m0-2h2m-2 0h-2"></path>
                                        </svg>
                                        <p class="text-lg font-medium">Aucun produit trouvé.</p>
                                        <p class="text-sm">Commencez par ajouter votre premier produit.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>