<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Ajouter un emprunt</h2>
            </div>

            <form action="{{ route('emprunts.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="livre_id" class="block text-gray-700 text-sm font-bold mb-2">Livre</label>
                    <select name="livre_id" id="livre_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Sélectionnez un livre</option>
                        @foreach($livres as $livre)
                            <option value="{{ $livre->id }}" {{ old('livre_id') == $livre->id ? 'selected' : '' }}>
                                {{ $livre->titre }} ({{ $livre->auteur->nom }} {{ $livre->auteur->prenom }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="date_emprunt" class="block text-gray-700 text-sm font-bold mb-2">Date d'emprunt</label>
                    <input type="date" name="date_emprunt" id="date_emprunt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date_emprunt', date('Y-m-d')) }}" required>
                </div>

                <div class="mb-4">
                    <label for="date_retour" class="block text-gray-700 text-sm font-bold mb-2">Date de retour</label>
                    <input type="date" name="date_retour" id="date_retour" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date_retour') }}" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Ajouter
                    </button>
                    <a href="{{ route('emprunts.index') }}" class="text-gray-600 hover:text-gray-800">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 