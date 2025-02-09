<?php ob_start(); ?>

<main class="pt-24">
<div class=" flex justify-center items-center m-auto container">
        <img src="./src/public/assets/hearth.jpg" alt="hearth" class="w-full  h-[600px] shadow-inner rounded object-cover object-center">
        <div class="absolute inset-0 flex flex-col items-center justify-center  text-white text-center bg-black/50">
            <h2 class="text-3xl font-bold mb-3.5">Découvertes Exceptionnelles des Femmes</h2>
        </div>
 </div>

<diV></div>
    <div class="text-center mt-40">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Hello World!</h1>
        <h2 class="text-2xl text-gray-600">Welcome to our blog</h2>
    </div>

    <section class="flex flex-col gap-2.5">
<?php
session_start();
foreach ($datas['response']['results'] as $article) {
    $id = $article['id'];
    echo '<div class="bg-white p-6 mb-2 mt-5 shadow rounded- flex flex-row gap-5 w-full">
          <div class="w-1/2"> <img src= " '.$article['fields']['thumbnail'].'  " alt="Découverte" class="w-full h-fit object-cover"></div>
            <div>
            <h3 class="text-xl font-bold text-gray-700">' . $article['fields']['headline'] . '</h3>
            <p class="text-gray-600">' . substr($article['fields']['bodyText'], 0, 300) . '...</p>
            <div class="flex flex-col gap-10">
            <a href="index.php?controller=posts&action=readpost&id=' . $id . '" class="text-blue-500 hover:text-blue-700 mt-2 inline-block">Lire l\'article complet</a>
             <span class="text-gray-400  mt-20">'.$article['webPublicationDate'].'</span>
            </div>
             
          </div>
           
            </div>';
}?>
</section>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
