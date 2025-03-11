<?php
require('./src/models/users.php');

class Userscontroller
{

    private $users; // Propriété pour réutiliser l'objet Categories

    public function __construct()
    {
        // Initialisation du modèle Categories
        $this->users = new Users();
    }

    public function logins($data)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        var_dump($data);

        $result = $this->users->authentification($data['mail'], $data['password']);

        if ($result) {
            session_start();
            $_SESSION['user'] = $result;
            header('Location: index.php?controller=homepage&action=homepage');
        } else {
            $message = "Authentification échouée/ veuillez revoir vos identifiants";
            header('Location: index.php?controller=user&action=login&msg=' . $message);
        }
        exit;
    }


    public function login()
    {

        require('./src/templates/login.php');
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?controller=user&action=login');
    }


    public function register()
    {
        require('./src/templates/register.php');
    }

    public function registers($data)
    {
        $emailverifie = $this->users->verifie($data['mail']);

        if (isset($data)) {

            $nom = $data['nom'];
            $mail = $data['mail'];
            $prenom = $data['prenom'];
            $password = $data['password'];
            $repeatpassword = $data['repeatpassword'];

            if ($password != $repeatpassword) {
                echo "Les mots de passe ne correspondent pas";
                exit;
            } else

                if ($emailverifie) {
                    $message = "Email déjà utilisé";
                    header('Location: index.php?controller=user&action=register&msg=' . $message);
                } else {
                    $this->users->register($nom, $prenom, $mail, $password);
                    header('Location: index.php?controller=user&action=login');
                }

        }

    }

    /**
     * @throws Exception
     */
    public function update($data)
    {

        if (isset($data)) {

            $name = $data['name'];
            $email = $data['email'];
            $prenom = $data['prenom'];
            $password = $data['password'];
            $old_password = $data['old_password'];
            $old_email = $data['old_mail'];
            $repeatpassword = $data['repeatpassword'];
            $id = $data['id'];

            if ($password != $repeatpassword) {
                echo "Les mots de passe ne correspondent pas";
                exit;
            } else
                $update = $this->users->update($name, $prenom, $email, $password, $old_password, $old_email, $id);
            if ($update) {
                $message = "veuiller vous connecter avec vos nouveau identifiant";
                header('Location: index.php?controller=user&action=login&msg=' . $message);
            }

        }
    }
}