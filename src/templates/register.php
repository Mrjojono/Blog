<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <link rel="stylesheet" href="./src/public/output.css">

</head>
<body class="bg-gray-200 flex justify-center items-center min-h-screen">

<div class="form p-8 rounded-lg shadow-lg w-[500px] h-full bg-gray-400">


<?php 
if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
    if(!empty($message)){
        echo "<div class='text-center justify-center w-full h-auto text-2xl p-2 flex text-black bg-red-400 opacity-55 border-2 border-red-500'> 
        " . htmlspecialchars($message) . "
    </div>";
    } 
}
?>
    <h1 class="text-center text-3xl mb-6 text-black">register</h1>

    <form method="POST" action="index.php?controller=user&action=registers" class="p-4 rounded-lg">
        <div class="input-group mb-4">
            <label for="nom" class="block text-gray-700 mb-2">Nom:</label>
            <input type="text" name="nom" id="nom" placeholder="Quel est votre nom?" required class=" rounded-2xl w-full p-2 border bg-amber-50 focus:outline-none focus:shadow-lg focus:shadow-gray-700 border-gray-300 ">
        </div>


        <div class="input-group mb-4">
            <label for="prenom" class="block text-gray-700 mb-2">Prenom:</label>
            <input type="text" name="prenom" id="prenom" placeholder="Quel est votre Prenom?" required class=" rounded-2xl w-full p-2 border bg-amber-50 focus:outline-none focus:shadow-lg focus:shadow-gray-700 border-gray-300 ">
        </div>




        <div class="input-group mb-4">
            <label for="mail" class="block text-gray-700 mb-2">Email:</label>
            <input type="email" name="mail" id="mail" placeholder="Entrer votre adresse mail" required class=" rounded-2xl w-full p-2 border bg-amber-50 focus:outline-none focus:shadow-lg focus:shadow-gray-700 border-gray-300 ">
        </div>

        <div class="input-group mb-4">
            <label for="password" class="block text-gray-700 mb-2">Password:</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required class=" rounded-2xl w-full p-2 border bg-amber-50 focus:outline-none focus:shadow-lg focus:shadow-gray-700 border-gray-300 ">
    
        </div>
        <div class="input-group mb-4">
            <label for="repeatpassword" class="block text-gray-700 mb-2"> Repeat Password:</label>
            <input type="password" name="repeatpassword" id="repeatpassword" placeholder="Repeter mot de passe" required class=" rounded-2xl w-full p-2 border bg-amber-50 focus:outline-none focus:shadow-lg focus:shadow-gray-700 border-gray-300 "  >  
        </div>
        <div class="flex justify-center flex-row  items-center gap-3">
        <button type="submit" class="p-3 bg-red-900 w-[200px] rounded-2xl text-white hover:bg-red-700 transition duration-300">
  S'inscrire
        </button>

            <a href="index.php?controller=user&action=login" class="p-3  bg-gray-900 w-[200px] text-center rounded-2xl  text-white  hover:bg-gray-950 transition duration-300">Se connecter</a>

</div>
     
    </form>
</div>

</body>
</html>
