<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Modifier le livre</h2>
            </div>

            <form action="{{ route('livres.update', $livre) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                    <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('titre', $livre->titre) }}" required>
                </div>

                <div class="mb-4">
                    <label for="auteur_id" class="block text-gray-700 text-sm font-bold mb-2">Auteur</label>
                    <select name="auteur_id" id="auteur_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Sélectionnez un auteur</option>
                        @foreach($auteurs as $auteur)
                            <option value="{{ $auteur->id }}" {{ (old('auteur_id', $livre->auteur_id) == $auteur->id) ? 'selected' : '' }}>
                                {{ $auteur->nom }} {{ $auteur->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="annee_publication" class="block text-gray-700 text-sm font-bold mb-2">Année de publication</label>
                    <input type="number" name="annee_publication" id="annee_publication" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('annee_publication', $livre->annee_publication) }}" required min="1900" max="{{ date('Y') + 1 }}">
                </div>

                <div class="mb-4">
                    <label for="nombre_pages" class="block text-gray-700 text-sm font-bold mb-2">Nombre de pages</label>
                    <input type="number" name="nombre_pages" id="nombre_pages" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nombre_pages', $livre->nombre_pages) }}" required min="1">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Mettre à jour
                    </button>
                    <a href="{{ route('livres.index') }}" class="text-gray-600 hover:text-gray-800">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 