<?php

require_once './src/config.php';

class users{

    function register($name,$prenom,$email,$password,$role){
        $sql = $bdd->prepare("INSERT INTO users(name,prenom,email,password,role) VALUES(:name,:prenom,:email,:password,:role)");
        $sql->execute(array(
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ));
    }

    function login($email,$password){
        $sql = $bdd->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sql->execute(array(
            'email' => $email,
            'password' => $password
        ));
        $result = $sql->fetchAll();
        return $result;
    }
}