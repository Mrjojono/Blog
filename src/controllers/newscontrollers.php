<?php

require_once ('./src/models/data.php');

class newsControllers
{
    private $data;



    public function __construct()
    {
        $this->data = new data();
    }

    public function getArticles()
    {
        $datas = $this->data->getArticles(10);
        require('./src/templates/news.php');
    }
}