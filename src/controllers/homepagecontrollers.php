<?php
require_once './src/models/data.php';
class HomepageController
{
    private $datas;

    public function __construct()
    {
        session_start();
        $this->datas = new Data(); 
    }


    public function homepage()
    {
        $show = "hidden";
        $cards= $this->datas->readAll();
        require('./src/templates/homepage.php');
    }

    public function profil()
    {
            require ('./src/templates/profil.php');
    }
}
