<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le Client : {{ $client->full_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-4">
                    <label class="block text-sm font-medium">Nom Complet</label>
                    <input type="text" name="full_name" value="{{ $client->full_name }}" class="w-full border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Téléphone</label>
                    <input type="text" name="phone" value="{{ $client->phone }}" class="w-full border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ $client->email }}" class="w-full border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Adresse</label>
                    <textarea name="address" class="w-full border-gray-300 rounded-md">{{ $client->address }}</textarea>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <a href="{{ route('clients.index') }}" class="text-gray-600 px-4 py-2">Annuler</a>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
