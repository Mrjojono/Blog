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
                <li class="hover:text-amber-300 cursor-pointer">Home</li>
                <li class="hover:text-amber-300 cursor-pointer">Post</li>
                <li class="hover:text-amber-300 cursor-pointer" > <a href="">Actualités</a></li>
                <li class="hover:text-amber-300 cursor-pointer">About</li>
            </ul>
        </div>
    </nav>
</header>
<?php echo $content; ?>


    <?php // footer.php
echo '<footer class="bg-black text-white p-4 text-center">
        <p>&copy; '.date('Y').' Mon Blog - Tous droits réservés.</p>
      </footer>
</body>
</html>';
?>

</body>
</html>
