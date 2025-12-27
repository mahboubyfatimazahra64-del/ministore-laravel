<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-6">Ajouter un Nouveau Client</h2>
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium">Nom Complet</label>
                    <input type="text" name="full_name" class="w-full border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Téléphone</label>
                    <input type="text" name="phone" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Adresse</label>
                    <textarea name="address" class="w-full border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-bold">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
