<?php ob_start(); ?>

<main class="pt-24">
    <div class="text-center mb-8 justify-center flex flex-wrap items-center m-auto w-[900px]">

        <div class="mt-24 container mx-auto shadow-lg border-2 flex flex-col justify-center p-10 border-black bg-white">
            <?php if (!empty($post)) : ?>
                <img src="<?= !empty($post['image']) ? htmlspecialchars($post['image']) : './src/public/assets/default.jpg'; ?>"
                     alt="Image du post" class="w-full h-fit p-3 object-cover rounded">

                <h1 class="text-4xl font-bold bg-amber-50 text-gray-800 mb-4 p-4 rounded-lg">
                    <?= htmlspecialchars($post['TITRE']); ?>
                </h1>

                <div class="bg-white shadow-2xl shadow-black p-6 mb-2 mt-5 rounded flex flex-row gap-5 w-full">
                    <p class="text-justify"><?= nl2br(htmlspecialchars($post['CONTENU'])); ?></p>
                </div>
            <?php else : ?>
                <p class="text-red-500">Le post demandé n'existe pas.</p>
            <?php endif; ?>
        </div>

        <!-- Formulaire d'ajout de commentaire -->
        <form method="post" action="index.php?controller=details&action=comment"
              class="mt-5 container mx-auto shadow-lg border-2 mb-20 flex flex-col justify-center p-10 border-black bg-gray-300">

            <h1 class="text-4xl font-bold bg-amber-50 text-gray-800 mb-4 p-4 rounded-lg">Commentaires</h1>

            <textarea name="comment" class="w-full h-24 p-2 border-2 border-black rounded-lg"
                      placeholder="Ajouter votre commentaire" required></textarea>

            <button type="submit" class="bg-amber-950 w-36 p-2 text-white rounded-2xl mt-2 
                hover:bg-amber-800 transition">Envoyer
            </button>
            <input type="hidden" name="iduser" value="<?= htmlspecialchars($_SESSION['user']['IDUSER']) ?>"/>
            <input type="hidden" name="id_blog" value="<?= htmlspecialchars($post['IDBLOG']); ?>">
        </form>


        <div class="bg-white w-full mt-4 border-2 border-amber-50 text-justify p-4 rounded-lg shadow-md">


            <?php $users = new Users();
            if (!empty($commentaires)) : ?>
                <?php foreach ($commentaires as $com) : ?>
                    <?php $anse = $users->getUser(htmlspecialchars($com['IDUSER'])); ?>
                    <div class="flex flex-row gap-1 items-center ">
                        <img src="./src/public/assets/profil.jpg" alt="image_profile"
                             class="rounded-full h-20 w-20 p-5"/>
                        <h2 class="text-xl font-bold mb-4"><?= $anse[0]['NOM']; ?></h2>
                    </div>

                    <div class="bg-gray-100 p-4 mb-2 rounded">
                        <div class="flex items-center mb-2">
                            <span class="text-gray-500 text-sm"><?= $com['DATECOM']; ?></span>
                        </div>
                        <p class="text-gray-800"><?= htmlspecialchars($com['CONTENU']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun commentaire pour le moment.</p>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
