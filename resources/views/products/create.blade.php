<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Ajouter un Nouveau Produit
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-200">

                <form action="{{ route('products.store') }}" method="POST" class="p-8">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom du Produit</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-3 transition-all duration-200 hover:border-blue-300" required>
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-4 py-3 transition-all duration-200 hover:border-blue-300 bg-white" required>
                            <option value="">-- Choisir une catégorie --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Prix (DH)</label>
                            <input type="number" step="0.01" name="price" id="price" class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 px-4 py-3 transition-all duration-200 hover:border-green-300" required>
                        </div>

                        <div class="mb-6">
                            <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-2">Quantité en Stock</label>
                            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 px-4 py-3 transition-all duration-200 hover:border-purple-300" required>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-end space-x-4">
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 px-6 py-3 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium">
                            Annuler
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-blue-600 hover:to-purple-700 hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold shadow-md">
                            Enregistrer le Produit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>