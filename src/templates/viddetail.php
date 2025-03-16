<?php ob_start(); ?>

<main class="pt-24">
    <div class="text-center mb-8 justify-center flex flex-wrap items-center m-auto w-[900px]">

        <div class="mt-24 container mx-auto shadow-lg border-2 flex flex-col justify-center p-10 border-black bg-white">
            <?php
            if (!empty($vid)) {
                echo '<iframe width="100%" height="500" src="' . $vid . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
            ?>
        </div>
    </div>

</main>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>
