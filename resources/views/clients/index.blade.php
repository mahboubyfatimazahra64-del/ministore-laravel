<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Clients</h2>
            <a href="{{ route('clients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">+ Ajouter un Client</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-3 text-gray-600">Nom Complet</th>
                            <th class="p-3 text-gray-600">Téléphone</th>
                            <th class="p-3 text-gray-600">Email</th>
                            <th class="p-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $client->full_name }}</td>
                            <td class="p-3">{{ $client->phone ?? '-' }}</td>
                            <td class="p-3">{{ $client->email ?? '-' }}</td>
                            <td class="p-3 text-right">
                                <a href="{{ route('clients.edit', $client) }}" class="text-indigo-600 mr-3">Modifier</a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Supprimer?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>