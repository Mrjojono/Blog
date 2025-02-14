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

    <form method="post" action="index.php?controller=details&action=comment" class="mt-5 container mx-auto shadow-lg border-2 mb-20 flex flex-col justify-center p-10 border-black bg-gray-300">
        <h1 class="text-4xl font-bold bg-amber-50 text-gray-800 mb-4">Commentaires</h1>
        <textarea class="w-full h-24 p-2 border-2 border-black" placeholder=" Ajouter Votre commentaire" name="comment"></textarea>
        <button type="submit" class="bg-amber-950 w-36 p-2 disabled text-white rounded-2xl justify-center items-center cursor-pointer mt-2 hover:bg-amber-800 transition " >Envoyer</button>
    <!-- section des commentaire -->
     <!-- recuperation des infos sur le blog  -->
        <input type="hidden" name="id" value="<?php echo $post['response']['content']['id']; ?>"> 
        <input type="hidden" name="titre" value="<?php echo $content['headline']; ?>"> 
        <input type="hidden" name="contenu" value="<?php echo $content['bodyText']; ?>"> 
        <input type="hidden" name="categorie" value="<?php echo $post['response']['content']['sectionId']; ?>">
        <input type="hidden" name="categorieName" value="<?php echo $post['response']['content']['sectionName']; ?>">

    <div class="bg-white w-full mt-4 border-2 border-amber-50  text-justify ">
            <span>Username</span>
            <p>Commentaires indisponible pour l'instant</p>
        </div>

    <?php 
    /*
        require_once('./src/models/users.php');
        $users = new Users();

        foreach($commentaire as $com){
            $username = $users->getUser($com['IDUSER'])[0];
            echo '<div class="bg-white w-full mt-4 border-2 border-amber-50 text-justify p-4 rounded-lg shadow-md">
                <div class="flex items-center mb-2">
                    <span class="font-bold text-lg mr-2">' . $username['NOM'] . '</span>
                    <span class="text-gray-500 text-sm">' . $com['DATECOM'] . '</span>
                </div>
                <p class="text-gray-800">' . $com['CONTENU'] . '</p>
            </div>';
        }*/
    ?>

       
    </form>


    </div>

</main>



<?php $content = ob_get_clean();
 ?>
<?php require('layout.php'); 
?>
