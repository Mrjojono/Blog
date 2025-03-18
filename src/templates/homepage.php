<?php ob_start();
?>

<main class="pt-24">
    <div class="text-center mb-8 flex flex-wrap items-center justify-center mx-auto w-[900px] animate-fadeIn">

        <?php
        if (isset($_SESSION['user'])) { ?>
            <h1 class="text-4xl font-bold mb-2" style="font-family: 'Playwrite HU', sans-serif;">Bienvenue
                <?php echo htmlspecialchars($_SESSION['user']['NOM']); ?> sur
                <span class="text-red-500">Gourmet blog</span> !
            </h1>'

        <?php } else { ?>
            <h1 class="text-4xl font-bold mb-2" style="font-family: 'Playwrite HU', sans-serif;">Bienvenue sur
                <span class="text-red-500">Gourmet blog</span> !
            </h1>'
        <?php }
        ?>

        <p class="mt-5 font-semibold text-gray-700">
            Un espace dédié aux passionnés de cuisine et aux recettes gourmandes
        </p>

        <p class="text-lg text-gray-700 leading-relaxed mt-2.5">
            Découvrez des recettes savoureuses, des astuces de chefs et des idées innovantes pour régaler vos papilles.
            Que vous soyez amateur ou expert en cuisine, rejoignez-nous pour explorer de nouvelles saveurs et partager
            votre passion culinaire !
        </p>

        <h2 class="text-3xl font-bold mt-6 text-gray-900" style="font-family: 'Playwrite HU', sans-serif;"> Saveurs &
            Créativité en Cuisine </h2>

        <p class="mt-4 text-gray-500">
            Chaque plat raconte une histoire. Découvrez des recettes authentiques, des expériences culinaires et des
            conseils pour réussir vos repas comme un chef. Rejoignez notre communauté de gourmets !
        </p>
    </div>


    <div class="relative flex justify-center items-center mx-auto container mt-10 animate-fadeIn">
        <img src="./src/public/assets/doritos.jpeg" alt="Délicieuses recettes"
            class="w-full max-w-7xl h-[600px] shadow-lg rounded-lg object-cover object-center">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center bg-black/50 p-6">
            <h2 class="text-3xl font-bold mb-3" style="font-family: 'Playwrite HU', sans-serif;">Découvrez nos recettes
                gourmandes et saines 🍽️</h2>
            <p class="text-lg">
                <a href="index.php?controller=news&action=getVideo"
                    class="inline-block px-6 py-3 text-white bg-pink-600 hover:bg-pink-700 rounded-lg text-xl transition">
                    Explorer les recettes
                </a>
            </p>
        </div>
    </div>

    <div class="text-center mt-12 animate-fadeIn">
        <h1 class="text-4xl font-bold text-gray-800 mb-4"> Mes RECETTE GOURMANDE</h1>
        <h2 class="text-2xl text-gray-600">Plongez dans un univers où saveurs et créativité se rencontrent 🍕✨</h2>
    </div>

    <!-- Section des articles -->
    <div class="flex flex-wrap justify-center gap-10 mb-10 mt-10">
        <?php if (!empty($cards)) {
            foreach ($cards as $blog): ?>
                <div class="card w-[400px] h-auto rounded-lg overflow-hidden shadow-lg bg-white transition hover:shadow-2xl animate-fadeIn">
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
                            <div class="flex flex-row gap-4 mt-4 items-center">
                                <form method="post" action="index.php?controller=posts&action=Edit">
                                    <input type="hidden" name="id" value="<?php echo $blog['IDBLOG']; ?>" />
                                    <button type="submit"
                                        class="bg-blue-100 w-full p-2 rounded cursor-pointer hover:bg-blue-600 hover:shadow-2xl hover:shadow-blue-800 transition">
                                        Editer
                                    </button>
                                </form>
                                <form>
                                     <button type="button" name="supprimer" data-id="<?php echo $blog['IDBLOG']; ?>"
                                    class="bg-red-500/[50%] w-full cursor-pointer p-2 rounded hover:bg-red-700/[50%] hover:shadow-2xl hover:shadow-black transition">
                                    Supprimer
                                </button>
                                </form>
                               
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        <?php endforeach;
        } ?>
    </div>

 

    <!-- Modale (initialement cachée) -->
    <div id="modal" class="fixed inset-0 z-10 hidden ">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl sm:w-full sm:max-w-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="size-12 bg-red-100 flex items-center justify-center rounded-full">
                            <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Supprimer Le post</h3>
                            <p class="text-sm text-gray-500 mt-2">Êtes-vous sûr de vouloir supprimer votre Post ? Cette action est irréversible.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-3 flex justify-end">


                    <button id="closeModal" name="annuler" class="px-4 py-2 text-gray-900 bg-white rounded-md hover:bg-gray-200">Annuler</button>


                    <button id="confirmDelete" class="ml-3 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">Confirmer</button>
                </div>
            </div>
        </div>
    </div>





</main>

<?php $content = ob_get_clean(); ?>
<?php
$title = "Homepage";
require('layout.php');
?>