<?php

class data {

    public function getArticles($nb_page) {
        $api_key = "8378d551-cc7a-4cac-bb22-6f8818cbce9a"; // Remplace par ta clé API
        $url = "https://content.guardianapis.com/search?api-key=$api_key&show-fields=headline,thumbnail,bodyText&page-size=$nb_page";
        
        // Exécuter la requête API
        $response = file_get_contents($url);
        return  json_decode($response, true);;
    }

    public function getArticleById($id) {

        $api_key = "8378d551-cc7a-4cac-bb22-6f8818cbce9a"; // Remplace par ta clé API
        $url = "https://content.guardianapis.com/$id?api-key=$api_key&show-fields=headline,thumbnail,bodyText";
        
        // Exécuter la requête API
        $response = file_get_contents($url);
        return  json_decode($response, true);
    }
}




