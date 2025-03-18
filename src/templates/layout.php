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

<div class="loader flex justify-center items-center h-screen">
    <button type="button" class="bg-indigo-500 text-black px-5 py-2 rounded-lg flex items-center" disabled>
        <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
        </svg>
        Processing…
    </button>
</div>

<!-- Barre de navigation -->
<header class="bg-black p-4 shadow-md fixed w-full top-0 z-20">
    <div class="container mx-auto flex items-center justify-between">
        <h1 class="text-black bg-amber-300 flex flex-row  px-4 py-2 rounded-lg text-xl font-bold"
            style="font-family: 'Playwrite HU', sans-serif;">
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
<script>
  // Récupérer les éléments de la modale
const modal = document.getElementById('modal');
const closeModalButton = document.getElementById('closeModal');
const confirmDeleteButton = document.getElementById('confirmDelete');

let currentBlogId = null; // Variable pour stocker l'ID du blog

// Fonction pour ouvrir la modale
function openModal(blogId) {
  currentBlogId = blogId; // Stocker l'ID du blog
  modal.classList.remove('hidden');
  console.log('Modale ouverte avec l\'ID :', currentBlogId); // Log pour déboguer
}

// Fonction pour fermer la modale
function closeModal() {
  modal.classList.add('hidden');
  console.log('Modale fermée'); // Log pour déboguer
}

// Écouteur d'événement pour ouvrir la modale lors du clic sur "Supprimer"
document.querySelectorAll('button[name="supprimer"]').forEach(button => {
  button.addEventListener('click', (e) => {
    e.preventDefault(); // Empêcher le rechargement de la page
    const blogId = button.getAttribute('data-id'); // Récupérer l'ID du blog
    openModal(blogId); // Ouvrir la modale avec l'ID du blog
  });
});

// Écouteur d'événement pour fermer la modale lors du clic sur "Annuler"
closeModalButton.addEventListener('click', closeModal);

// Écouteur d'événement pour supprimer le blog
confirmDeleteButton.addEventListener('click', () => {
  if (currentBlogId) {
    console.log('Tentative de suppression du blog avec l\'ID :', currentBlogId);

    fetch(`index.php?controller=posts&action=delete&id=${currentBlogId}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `id=${currentBlogId}`,
    })
    .then(response => {
      console.log('Réponse du serveur (brute) :', response); // Log pour déboguer
      if (!response.ok) {
        throw new Error('Erreur réseau : ' + response.statusText);
      }
      return response.json();
    })
    .then(data => {
      console.log('Réponse du serveur (JSON) :', data); // Log pour déboguer
      if (data.success) {
        alert('Post supprimé avec succès !');
        closeModal();
        window.location.reload(); // Recharger la page
      } else {
        alert('Erreur lors de la suppression du post : ' + (data.message || ''));
      }
    })
    .catch(error => {
      console.error('Erreur:', error); // Log pour déboguer
      alert('Une erreur s\'est produite lors de la suppression du post.');
    });
  } else {
    alert('Aucun ID de post trouvé.');
  }
});
</script>
<script src="./src/public/index.js"></script>
<footer class="bg-black text-white p-4 text-center w-[100%] mt-6">
    <p>&copy; <?= date('Y'); ?> Mon Blog - Tous droits réservés.</p>
</footer>
</body>
</html>
