<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <link rel="stylesheet" href="./src/public/output.css">
</head>

<body class="bg-cover bg-center flex justify-center items-center min-h-screen" style="background-image: url('./src/public/assets/maco.jpeg');  backdrop-filter: blur(3px);">
    
    <div class="bg-white/80 backdrop-blur-lg p-8 rounded-lg shadow-lg w-full max-w-md animate-fadeIn">
     
        <?php 
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            if(!empty($message)){
                echo "<div class='text-center p-3 mb-4 text-red-700 bg-red-300 rounded-lg border border-red-500'> 
                " . htmlspecialchars($message) . "
                </div>";
            } 
        }
        ?>

        <h1 class="text-center text-3xl font-bold text-gray-900 mb-6"> Connexion</h1>

        <form method="POST" action="index.php?controller=user&action=logins" class="space-y-4">
           
            <div>
                <label for="mail" class="block text-gray-700 font-semibold mb-1">Email :</label>
                <input type="email" name="mail" id="mail" placeholder="Entrer votre adresse mail" required 
                    class="w-full p-3 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            </div>

             <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Mot de passe :</label>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required 
                        class="w-full p-3 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-1 inline-block hover:underline">Mot de passe oublié ?</a>
            </div>

           
            <div class="flex flex-col gap-3">
                <button type="submit" 
                    class="p-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                    Se connecter
                </button>
                <a href="index.php?controller=user&action=register" 
                    class="p-3 bg-gray-800 text-white text-center font-semibold rounded-lg hover:bg-gray-900 transition duration-300">
                    S'inscrire
                </a>
            </div>
        </form>
    </div>

    <script>
        // Afficher/Masquer le mot de passe
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>

</body>
</html>
