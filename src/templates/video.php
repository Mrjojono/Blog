<?php ob_start(); ?>

<main class="pt-24">

    <!-- Image d'accueil avec titre -->
    <div class="relative flex justify-center items-center m-auto container animate-fadeIn">
        <img src="./src/public/assets/doritos.jpeg" alt="Cuisine et saveurs"
             class="w-full h-[600px] shadow-lg rounded-lg object-cover object-center">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center bg-black/50 p-6">
            <h2 class="text-3xl font-bold mb-3" style="font-family: 'Playwrite HU', sans-serif;">Découvrez videos
                culinaires d'exception </h2>
        </div>
    </div>


    <div class="text-center mt-20 animate-fadeIn">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Nos Derniers Articles</h1>
        <h2 class="text-2xl text-gray-600">Explorez des recettes et astuces inédites</h2>
    </div>

    <section class="flex flex-col gap-5 mt-10">
        <?php
        session_start();
        foreach ($datas['items'] as $article) {

            $id = $article['id']['videoId'];
            $thumbnailUrl = $article['snippet']['thumbnails']['high']['url'];
            $title = $article['snippet']['title'];


            echo '<div class="bg-white p-6 shadow-lg rounded-lg flex flex-row gap-6 w-full animate-fadeIn transition hover:shadow-2xl">
                    <div class="w-1/3">
                        <img src="' . htmlspecialchars($thumbnailUrl) . '" alt="Illustration" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="w-2/3">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">' . htmlspecialchars($title) . '</h3>
                        <p class="text-gray-600 text-justify">Aperçu de la vidéo...</p> 
                        <div class="flex justify-between items-center mt-4">
                            <a href="index.php?controller=details&action=readvid&id=' . urlencode($id) . '" class="text-blue-500 hover:text-blue-700 font-medium">Voir la vidéo →</a>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </section>

</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
