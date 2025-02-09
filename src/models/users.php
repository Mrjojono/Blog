<?php

require_once './src/config.php';

class Users
{
   
    public function __construct()
    {
        $this->bdd = Config();
      
    }

    public function verifie($email)
    {
        $sql = $this->bdd->prepare("SELECT * FROM user WHERE email = :email");
        $sql->execute(array(
            'email' => $email
        ));
        $result = $sql->fetchAll();
        return count($result) > 0;
    }

    public function register($name, $prenom, $email, $password)
    {
        $role = "user";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = $this->bdd->prepare("INSERT INTO user(NOM,prenom,email,password,role) VALUES(:name,:prenom,:email,:password,:role)");
        $sql->execute(array(
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ));
    }


    public function authentification($email, $password)
    {
        $sql = $this->bdd->prepare("SELECT * FROM user WHERE email = :email");
        $sql->execute(array(
            'email' => $email
        ));
        $result = $sql->fetchAll();
    
        if (count($result) > 0) {
            $user = $result[0];
            // Vérifiez le mot de passe (supposons que le mot de passe est haché avec password_hash)
            if (password_verify( $password, $user['PASSWORD'])) {
                return $user;
            }
        }
    
        return null; // Retourne null si l'authentification échoue
    }

}

?>
