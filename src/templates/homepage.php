<?php ob_start(); ?>


<main class="pt-24"> 
    <div class="text-center mb-8 justify-center flex flex-wrap items-center m-auto w-[900px]">
        <!--un nom convenable pour le blog devra etre choisie-->
        <p class="mt-5 font-bold ">Theblog</p>
        <p class="text-lg text-gray-700 leading-relaxed mt-2.5">
      Ce blog est un espace de partage et d'inspiration où nous mettons en avant des histoires puissantes de femmes et d'individus engagés dans des combats de justice sociale et d'égalité. Ici, nous croyons que chaque voix compte et que l'écriture est un outil de transformation. Rejoignez-nous pour lire, partager et être inspirés.
    </p>
        <h1 class="text-4xl font-bold mb-2">Writings for our Futur </h1>
        <p class="mt-4 text-gray-500">
      Nous créons un environnement inclusif où chacun peut s'exprimer librement et en toute sécurité. Laissez-vous emporter par des récits qui éclairent des sujets variés : les défis sociaux, l'émancipation, les combats quotidiens et les victoires des femmes.
    </p>
    </div>

    <div class="relative flex justify-center items-center m-auto container">
        <img src="./src/public/assets/hearth.jpg" alt="hearth" class="w-full max-w-7xl h-[600px] shadow-inner rounded object-cover object-center">
        <div class="absolute inset-0 flex flex-col items-center justify-center  text-white text-center bg-black/50">
            <h2 class="text-3xl font-bold mb-3.5">Écrire du texte ici</h2>
            <p class="text-lg"><a href="post.php" class="inline-block px-6 py-3 text-white bg-pink-600 hover:bg-pink-700 rounded-lg text-xl">
      Lisez nos histoires inspirantes
    </a></p>
        </div>
    </div>


    <div class="text-center mt-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Hello World!</h1>
        <h2 class="text-2xl text-gray-600">Welcome to our blog</h2>
    </div>

    <!--  une interactions sera faites ici pour faire voir les blog 4 derniers articles -->
    <div class="flex flex-wrap justify-center gap-10 mb-10">
        <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="w-[400px] h-[50vh] rounded overflow-hidden shadow-lg bg-white">
                <img src="./src/public/assets/hearth.jpg" class="w-full h-2/3 object-cover">
                <div class="p-4">
                    <p>Text sur le blog</p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
