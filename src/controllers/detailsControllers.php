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
        $commentaire = $this->data->readComment($id);
        $commentaires = $this->data->getArticleById($id);
        require('./src/templates/details.php');
    }

    public function comment($data)
    {
        ;


        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        } elseif (!empty($data['comment'])) {
            $comment = $data['comment'];
            $id_user = $_SESSION['user']['IDUSER'];
            $id_blog = $data['id_blog'];

            $this->users->comment($comment, $id_user, $id_blog);
            header('Location: index.php?controller=posts&action=view&id=' . $id_blog);
            exit();
        } else {
            echo "Veuillez remplir le champ commentaire";
            exit();
        }
    }

}
