<?php

class postsControllers
{
    public function Posts()
    {
        // Affiche la page d'accueil
        require('./src/templates/posts.php');
    }

    public function readpost($id)
    {
        // Affiche un article
        $data = new data();
        $post = $data->getArticleById($id);
        require('./src/templates/posts.php');
    }
}
