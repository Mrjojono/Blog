<?php
require_once './src/models/users.php';
require_once './src/models/data.php';

class postsController
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
        require('./src/templates/posts.php');
    }

    public function create($data)
    {

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }
    
        if (empty($data['headline']) || empty($data['bodyText']) || !isset($_FILES['thumbnail'])) {
            echo "Tous les champs sont obligatoires.";
            exit();
        }
    
        
        $uploadDir = "./src/templates/uploads/";  
        $fileName = basename($_FILES["thumbnail"]["name"]);
        $uploadFile = $uploadDir . $fileName;
        $id_user = $_SESSION['user']['IDUSER'];
    
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES["thumbnail"]["type"], $allowedTypes) || $_FILES["thumbnail"]["size"] > 5 * 1024 * 1024) {
            echo "Fichier non valide. Assurez-vous qu'il s'agit d'une image et qu'elle ne dépasse pas 5MB.";
            exit();
        }
    
        if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $uploadFile)) {
            echo "Erreur lors du téléchargement de l'image.";
            exit();
        }
    
        $this->data->addBlog($id_user,$data['headline'], $data['bodyText'], $uploadFile);
        header('Location: index.php?controller=homepage&action=homepage');
    }

    public function view($id)
    {
        $commentaires =   $this->data->readComment($id);
//        var_dump($commentaires);
//        exit();
        $post = $this->data->getLocalArticleById($id);
        require('./src/templates/details2.php');
    }
    
}