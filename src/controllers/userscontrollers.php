<?php
require ('./src/models/users.php');

class userscontrollers{

    private $users; // Propriété pour réutiliser l'objet Categories

    public function __construct()
    {
        // Initialisation du modèle Categories
        $this->users = new users();
    }

   public function registers(){
        $this->users->register();
        header('Location: index.php?controller=login&action=login');
    }

   public  function login(){
        require ('./src/templates/login.php');
//        $users = new users();
//        $result = $users->login();
//        if(count($result) > 0){
//            $_SESSION['user'] = $result[0];
//            header('Location: index.php?controller=posts&action=index');
//        }else{
//            header('Location: index.php?controller=login&action=login');
//        }
    }
}