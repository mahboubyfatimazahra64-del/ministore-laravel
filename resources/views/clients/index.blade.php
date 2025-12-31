<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Liste des Clients</h2>
            <a href="{{ route('clients.create') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-purple-700 hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold shadow-md">
                + Ajouter un Client
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-200">
                <div class="p-8">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-600 border-b-2 border-purple-300">
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm">Nom Complet</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm">Téléphone</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm">Email</th>
                                <th class="p-4 font-bold uppercase text-sm text-white tracking-wider drop-shadow-sm text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                            <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50/80 hover:via-purple-50/80 hover:to-pink-50/80 transition-all duration-300 group transform hover:scale-[1.01] hover:shadow-md">
                                <td class="p-4 text-gray-800 font-bold group-hover:text-blue-600 transition-colors duration-300">{{ $client->full_name }}</td>
                                <td class="p-4 text-gray-600 font-semibold group-hover:text-purple-600 transition-colors duration-300">{{ $client->phone ?? '-' }}</td>
                                <td class="p-4 text-gray-600 font-semibold group-hover:text-green-600 transition-colors duration-300">{{ $client->email ?? '-' }}</td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-4">
                                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:text-white hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 px-4 py-2 rounded-xl transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-110">
                                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Modifier
                                        </a>
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-white hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-600 px-4 py-2 rounded-xl transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-110" onclick="return confirm('Supprimer?')">
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
                                <td colspan="4" class="p-12 text-center text-gray-500">
                                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Aucun client trouvé.</p>
                                    <p class="text-sm">Commencez par ajouter votre premier client.</p>
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