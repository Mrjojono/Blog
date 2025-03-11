<?php

require_once './src/config.php';

class Users
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Config();

    }

    public function verifie($email)
    {
        $sql = $this->bdd->prepare("SELECT * FROM users WHERE email = :email");
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
        $sql = $this->bdd->prepare("INSERT INTO users(NOM,prenom,email,password,role) VALUES(:name,:prenom,:email,:password,:role)");
        $sql->execute(array(
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ));
        return $this->bdd->lastInsertId();
    }

    /**
     * @throws Exception
     */
    public function update($name, $prenom, $email, $password, $oldpassword, $odl_email, $id)
    {
        // Validez les données obligatoires
        if (empty($name) || empty($prenom) || empty($email)) {
            throw new Exception("Tous les champs obligatoires doivent être remplis.");
        }

        // Hash du nouveau mot de passe s'il est fourni
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

        try {
            if ($hashedPassword) {
                // Vérifiez l'ancien mot de passe
                if ($this->authentification($odl_email, $oldpassword)) {
                    $sql = $this->bdd->prepare("UPDATE users SET NOM = :name, prenom = :prenom, email = :email, password = :password WHERE IDUSER = :id");
                    $sql->execute(array(
                        ':name' => $name,
                        ':prenom' => $prenom,
                        ':email' => $email,
                        ':password' => $hashedPassword,
                        ':id' => $id
                    ));
                } else {
                    throw new Exception("Ancien mot de passe incorrect.");
                }
            } else {

                $sql = $this->bdd->prepare("UPDATE users SET NOM = :name, prenom = :prenom, email = :email WHERE IDUSER = :id");
                $sql->execute(array(
                    ':name' => $name,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':id' => $id
                ));
            }

            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour : " . $e->getMessage());
        }
    }

    public function getUser($id)
    {
        $sql = $this->bdd->prepare("Select * from users where iduser= $id");
        $sql->execute();
        return $sql->fetchAll();
    }


    public function authentification($email, $password)
    {
        $sql = $this->bdd->prepare("SELECT * FROM users WHERE email = :email");
        $sql->execute(array(
            'email' => $email
        ));
        $result = $sql->fetchAll();

        if (count($result) > 0) {
            $user = $result[0];

            if (password_verify($password, $user['PASSWORD'])) {
                return $user;
            }
        }
        return null;
    }


    public function comment($comment, $id_user, $id_blog)
    {
        $sql = $this->bdd->prepare("INSERT INTO commentaire(contenu,iduser,idblog) VALUES(:comment,:id_user,:id_blog)");
        $sql->execute(array(
            'comment' => $comment,
            'id_user' => $id_user,
            'id_blog' => $id_blog
        ));
    }

}

?>
