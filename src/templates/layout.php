<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <link rel="stylesheet" href="./src/public/output.css">
    <style>
        .animate-fadeIn {
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

       
        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrap {
            flex: 1;
        }
    </style>
</head>

<body class="bg-amber-100 flex flex-col min-h-screen">
    <!-- Barre de navigation -->
    <header class="bg-black p-4 shadow-md fixed w-full top-0 z-20">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-black bg-amber-300 px-4 py-2 rounded-lg text-xl font-bold">
                Mon Blog
            </h1>

            <ul class="text-white flex flex-row gap-6 text-lg">
                <li><a href="index.php?controller=homepage&action=homepage" class="hover:text-amber-300 transition">Accueil</a></li>
                <li><a href="index.php?controller=posts&action=Posts" class="hover:text-amber-300 transition">Post</a></li>
                <li><a href="index.php?controller=news&action=getArticles" class="hover:text-amber-300 transition">Actualités</a></li>
                <li><a href="index.php?controller=homepage&action=profil" class="hover:text-amber-300 transition">Profil</a></li>
                <li>
                    <?php if(isset($_SESSION['user'])): ?>
                        <a href="index.php?controller=user&action=logout" class="bg-red-500 hover:bg-red-700 px-5 py-2 rounded-2xl text-white transition">
                            Se déconnecter
                        </a>
                    <?php else: ?>
                        <a href="index.php?controller=user&action=login" class="bg-green-500 hover:bg-green-700 px-5 py-2 rounded-2xl text-white transition">
                            Se connecter
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </header>

    
    <div class="content-wrap pt-20 container mx-auto px-4">
        <?php echo $content; ?>
    </div>

   
    <footer class="bg-black text-white p-4 text-center w-[100%] mt-6">
        <p>&copy; <?= date('Y'); ?> Mon Blog - Tous droits réservés.</p>
    </footer>
</body>
</html>
