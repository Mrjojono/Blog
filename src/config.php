<?php

if (!function_exists('Config')) {
    function Config()
    {
        global $bdd;
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=blogs;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}
