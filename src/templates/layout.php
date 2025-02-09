<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <link rel="stylesheet" href="./src/public/output.css">
</head>
<body  class="bg-amber-100">
<header>
    <nav class="bg-black p-4 shadow-md fixed w-full top-0 z-10">
        <div class="container mx-auto flex flex-row items-center justify-between">
            <h1 class="text-black bg-amber-300 px-4 py-2 rounded-lg text-lg font-bold">
                Blog
            </h1>
           

            <ul class="text-white flex flex-row gap-4 text-lg">
                <li class="hover:text-amber-300 cursor-pointer"><a href="index.php?controller=homepage&action=homepage">Home</a></li>
                <li class="hover:text-amber-300 cursor-pointer"><a href="index.php?controller=posts&action=Posts">Post</a></li>
                <li class="hover:text-amber-300 cursor-pointer" > <a href="index.php?controller=news&action=getArticles">Actualités</a></li>
                <li class="hover:text-amber-300 cursor-pointer">About</li>
                <li>
                <?php if(isset($_SESSION['user'])) {
                          echo "<button class='bg-red-400  hover:bg-red-700 w-36 p-2 text-white rounded-2xl justify-center items-center  cursor-pointer' > <a href='index.php?controller=user&action=logout'>Se déconnecter</a></button>"; }else{
                            echo "<button class='bg-red-400  hover:bg-red-700 w-36 p-2 text-white rounded-2xl justify-center items-center  cursor-pointer' > <a href='index.php?controller=user&action=login'>Se connecter</a></button>";
                          }
                          ?>   
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php echo $content;   ?>

    <?php // footer.php
echo '<footer class="bg-black text-white relative w-full mt-6  p-4 text-center">
        <p>&copy; '.date('Y').' Mon Blog - Tous droits réservés.</p>
      </footer>
';
?>

</body>
</html>
