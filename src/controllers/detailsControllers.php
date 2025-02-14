<?php
require_once './src/models/users.php';
require_once './src/models/data.php';

class DetailsController
{
    private $users;
    private $data;

    public function __construct()
    {
        session_start();
        $this->users = new Users();
        $this->data = new Data(); 
    }

    public function Posts()
    {
        require('./src/templates/details.php');
    }

    public function readpost($id)
    {
        $commentaire =   $this->data->readComment($id);
        $post = $this->data->getArticleById($id);
        require('./src/templates/details.php');
    }

    public function comment($data)
    {
        // Ajout du blog dans la base de données
     // $resul =   $this->data->readComment();
    $this->data->addCategorie($data['categorie'], $data['categorieName']);
    $this->data->addBlogIfNotExists($data['id'], $data['titre'], $data['contenu'], $data['categorie']);

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        } elseif (isset($data['comment']) && !empty($data['comment'])) {
            $comment = $data['comment'];
            $id_user = $_SESSION['user']['iduser'];
            $id_blog = $data['id'];

            $this->users->comment($comment, $id_user, $id_blog);
            header('Location: index.php?controller=details&action=readpost&id=' . $id_blog);
            exit();
        }
        else{
            echo "Veuillez remplir le champ commentaire";
            exit();
        }
    }

}
