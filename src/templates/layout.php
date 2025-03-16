<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <script src="https://cdn.tiny.cloud/1/amfghv9egyizjbgi0htvsmfa0o4xjoab5kpk3bb2379bksdt/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" href="./src/public/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playwrite+HU:wght@100..400&display=swap');

        .animate-fadeIn {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrap {
            flex: 1;
        }


        /* Masquer le contenu jusqu'à ce que la page soit chargée */
        body.loading {
            overflow: hidden;
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #f3f4f6; /* Couleur de fond */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

    </style>
</head>

<body class="loading  bg-amber-100 flex flex-col min-h-screen">
<div class="loader">
    <p>Chargement...</p>
</div>
<!-- Barre de navigation -->
<header class="bg-black p-4 shadow-md fixed w-full top-0 z-20">
    <div class="container mx-auto flex items-center justify-between">
        <h1 class="text-black bg-amber-300 flex flex-row  px-4 py-2 rounded-lg text-xl font-bold" style="font-family: 'Playwrite HU', sans-serif;">
           <img src="./src/public/assets/chef-hat.png" class="mr-2" alt="chefhat"> <span>  Gourmet</span>
        </h1>
        <ul class="text-white flex flex-row gap-6 text-lg">
            <li><a href="index.php?controller=homepage&action=homepage"
                   class="hover:text-amber-300 transition">Accueil</a></li>
            <li><a href="index.php?controller=posts&action=Posts" class="hover:text-amber-300 transition">Post</a></li>
            <li><a href="index.php?controller=news&action=getArticles" class="hover:text-amber-300 transition">Actualités</a>
            </li>
            <li><a href="index.php?controller=homepage&action=profil" class="hover:text-amber-300 transition">Profil</a>
            </li>
            <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="index.php?controller=user&action=logout"
                       class="bg-red-500 hover:bg-red-700 px-5 py-2 rounded-2xl text-white transition">
                        Se déconnecter
                    </a>
                <?php else: ?>
                    <a href="index.php?controller=user&action=login"
                       class="bg-green-500 hover:bg-green-700 px-5 py-2 rounded-2xl text-white transition">
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

<script src="./src/public/index.js"></script>
<footer class="bg-black text-white p-4 text-center w-[100%] mt-6">
    <p>&copy; <?= date('Y'); ?> Mon Blog - Tous droits réservés.</p>
</footer>
</body>
</html>
