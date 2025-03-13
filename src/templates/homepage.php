<?php ob_start();
?>

<main class="pt-24">
    <div class="text-center mb-8 flex flex-wrap items-center justify-center mx-auto w-[900px] animate-fadeIn">

        <?php
        if (isset($_SESSION['user'])) {
            echo '<h1 class="text-4xl font-bold mb-2">Bienvenue, ' . $_SESSION['user']['NOM'] . ' !</h1>';
        } else {
            echo '<h1 class="text-4xl font-bold mb-2">Bienvenue sur <span class="text-red-500">TheCookingBlog</span> !</h1>';
        }
        ?>

        <p class="mt-5 font-semibold text-gray-700">
            Un espace dédié aux passionnés de cuisine et aux recettes gourmandes
        </p>

        <p class="text-lg text-gray-700 leading-relaxed mt-2.5">
            Découvrez des recettes savoureuses, des astuces de chefs et des idées innovantes pour régaler vos papilles.
            Que vous soyez amateur ou expert en cuisine, rejoignez-nous pour explorer de nouvelles saveurs et partager
            votre passion culinaire !
        </p>

        <h2 class="text-3xl font-bold mt-6 text-gray-900"> Saveurs & Créativité en Cuisine </h2>

        <p class="mt-4 text-gray-500">
            Chaque plat raconte une histoire. Découvrez des recettes authentiques, des expériences culinaires et des
            conseils pour réussir vos repas comme un chef. Rejoignez notre communauté de gourmets !
        </p>
    </div>


    <div class="relative flex justify-center items-center mx-auto container mt-10 animate-fadeIn">
        <img src="./src/public/assets/doritos.jpeg" alt="Délicieuses recettes"
             class="w-full max-w-7xl h-[600px] shadow-lg rounded-lg object-cover object-center">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center bg-black/50 p-6">
            <h2 class="text-3xl font-bold mb-3">Découvrez nos recettes gourmandes et saines 🍽️</h2>
            <p class="text-lg">
                <a href="post.php"
                   class="inline-block px-6 py-3 text-white bg-pink-600 hover:bg-pink-700 rounded-lg text-xl transition">
                    Explorer les recettes
                </a>
            </p>
        </div>
    </div>

    <div class="text-center mt-12 animate-fadeIn">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenue sur MA RECETTE GOURMANDE</h1>
        <h2 class="text-2xl text-gray-600">Plongez dans un univers où saveurs et créativité se rencontrent 🍕✨</h2>
    </div>

    <!-- Section des articles -->
    <div class="flex flex-wrap justify-center gap-10 mb-10 mt-10">
        <?php if (!empty($cards)) {
            foreach ($cards as $blog): ?>
                <div class="w-[400px] h-auto rounded-lg overflow-hidden shadow-lg bg-white transition hover:shadow-2xl animate-fadeIn">
                    <img src="<?= !empty($blog['image']) ? htmlspecialchars($blog['image']) : './src/public/assets/default.jpg'; ?>"
                         class="w-full h-48 object-cover" alt="Image du blog">

                    <div class="p-4">
                        <h2 class="text-xl font-bold"><?= htmlspecialchars($blog['TITRE']); ?></h2>
                        <p class="text-gray-600 text-sm"><?= substr(htmlspecialchars($blog['CONTENU']), 0, 100); ?>
                            ...</p>

                        <a href="index.php?controller=posts&action=view&id=<?= $blog['IDBLOG']; ?>"
                           class="mt-3 inline-block text-blue-500 hover:text-blue-700">
                            Lire la suite →
                        </a>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['IDUSER'] == $blog['IDUSER']): ?>
                        <form>
                            <div class="flex flex-row gap-4 mt-4 items-center">
                                <button type="submit"
                                        class="bg-blue-100 w-full p-2 rounded cursor-pointer hover:bg-blue-600 hover:shadow-2xl hover:shadow-blue-800 transition">
                                    Éditer
                                </button>
                                <button type="submit"
                                        class="bg-red-500/[50%] w-full cursor-pointer p-2 rounded hover:bg-red-700/[50%] hover:shadow-2xl hover:shadow-black transition">
                                    Supprimer
                                </button>
                            </div>
                            <?php endif; ?>
                        </form>

                    </div>
                </div>
            <?php endforeach;
        } ?>
    </div>

</main>

<?php $content = ob_get_clean(); ?>
<?php
$title = "Homepage";
require('layout.php');
?>
