<?php ob_start(); ?>

<main class="pt-24">
    <div class="text-center mb-8 flex flex-wrap items-center justify-center m-auto w-full max-w-3xl">

        <form method="post" action="index.php?controller=posts&action=create" enctype="multipart/form-data"
              class="mt-5 w-full shadow-lg border border-gray-300 rounded-lg bg-white p-10 transition-all hover:shadow-2xl animate-fadeIn">

            <h1 class="text-4xl font-bold text-gray-900 mb-6"> Modification blog </h1>


            <div class="mb-6">
                <label for="headline" class="block text-lg font-semibold text-gray-800 mb-2">Titre du blog</label>
                <input type="text" name="headline" id="headline" placeholder="Entrez le titre de votre blog"
                       class="w-full h-12 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                       required>
            </div>


            <div class="mb-6">
                <label for="thumbnail" class="block text-lg font-semibold text-gray-800 mb-2">Image du blog</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                       class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                       required>
                <p class="text-sm text-gray-500 mt-1">Formats acceptés : JPEG, PNG, GIF. Taille maximale : 5MB.</p>


                <div id="image-preview" class="mt-4 hidden">
                    <p class="text-sm text-gray-700">Aperçu :</p>
                    <img id="preview-img" class="w-40 h-40 mt-2 rounded-lg shadow-lg object-cover">
                </div>
            </div>


            <div class="mb-6">
                <label for="bodyText" class="block text-lg font-semibold text-gray-800 mb-2">Contenu du blog</label>
                <textarea name="bodyText" id="bodyText" placeholder="Écrivez le contenu de votre blog ici..."
                          class="w-full h-48 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                          required></textarea>
            </div>

            <div class="mb-6">
                <label for="vid" class="block text-lg font-semibold text-gray-800 mb-2">Ajouter une
                    video(optionnel)</label>
                <input type="text" name="video_url" id="vid" placeholder="Entrer l'url de la video"
                       class="w-full h-12 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                >
            </div>


            <button type="submit"
                    class="bg-amber-600 w-40 p-3 text-white font-semibold rounded-lg shadow-md hover:bg-amber-700 transition-all">
                Modifier✨
            </button>
        </form>
    </div>
</main>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        const headline = document.getElementById('headline').value.trim();
        const thumbnail = document.getElementById('thumbnail').files[0];
        const bodyText = document.getElementById('bodyText').value.trim();

        if (!headline || !thumbnail || !bodyText) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs.');
        }
    });

    // Aperçu de l'image sélectionnée
    document.getElementById('thumbnail').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('preview-img').src = event.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
