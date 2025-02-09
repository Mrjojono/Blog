<?php ob_start(); 
?>


<main class="pt-24">
    <div class="text-center mb-8 justify-center flex flex-wrap items-center m-auto w-[900px]">

    <div class="mt-24 container mx-auto shadow-lg border-2 flex flex-col justify-center p-10 border-black bg-white">
        <?php    
        if (!empty($post)) {
            $content = $post['response']['content']['fields'];
            echo  '<img src= " '.$content['thumbnail'].'  " alt="Découverte" class="w-full  h-fit p-3 ">';
            echo '<h1 class="text-4xl font-bold bg-amber-50 text-gray-800 mb-4">' . $content['headline'] . '</h1>';
            echo '<div class="bg-white shadow-2xl shadow-black p-6 mb-2 mt-5  rounded flex flex-row gap-5 w-full">
                <p class="text-justify">' . $content['bodyText'] . '</p>
            </div>';
        }
        ?>
    </div>
    <div class="mt-5 container mx-auto shadow-lg border-2 mb-20 flex flex-col justify-center p-10 border-black bg-gray-300">
        <h1 class="text-4xl font-bold bg-amber-50 text-gray-800 mb-4">Commentaires</h1>
        <textarea class="w-full h-24 p-2 border-2 border-black" placeholder=" Ajouter Votre commentaire"></textarea>
    <!-- section des commentaire -->
        <div class="bg-white w-full mt-4 border-2 border-amber-50  text-justify ">
            <span>Username</span>
            <p>Ceci est un Commentaires</p>
        </div>

        <div class="bg-white w-full mt-4 border-2 border-amber-50  text-justify ">
            <span>Username</span>
            <p>Ceci est un Commentaires</p>
        </div>
        

    </div>

    </div>

</main>



<?php $content = ob_get_clean();
 ?>
<?php require('layout.php'); 
?>
