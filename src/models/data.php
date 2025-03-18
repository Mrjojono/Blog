<?php
require_once './src/config.php';

class Data
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = Config();
    }

    public function getArticles($nb_page)
    {
        $api_key = "8378d551-cc7a-4cac-bb22-6f8818cbce9a"; // Remplace par ta clé API
        //  $url = "https://content.guardianapis.com/search?api-key=$api_key&show-fields=headline,thumbnail,bodyText&page-size=$nb_page";

        $url = "https://content.guardianapis.com/search?api-key=$api_key&q=kitchen&show-fields=headline,thumbnail,bodyText&page-size=$nb_page";

        // Exécuter la requête API
        $response = file_get_contents($url);
        return json_decode($response, true);;
    }

    public function getArticleById($id)
    {

        $api_key = "8378d551-cc7a-4cac-bb22-6f8818cbce9a";
        $url = "https://content.guardianapis.com/$id?api-key=$api_key&show-fields=headline,thumbnail,bodyText";


        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    //requete d'insertion de blog dans la base de données

    /**
     * cette function permet d'inserer un blog  si elle n'existe pas
     * @param int $idBlog l'identifiant du blog
     * @param string $titre le titre du blog
     * @param string $contenu le contenu du blog
     *
     */
    public function addBlogIfNotExists($idBlog, $titre, $contenu, $idcategorie)
    {
        // Validation des entrées
        if (empty($idBlog) || empty($titre) || empty($contenu) || empty($idcategorie)) {
            throw new InvalidArgumentException("Tous les champs sont obligatoires.");
        }

        $this->bdd->beginTransaction();
        try {
            // Insérer ou mettre à jour le blog
            $stmt = $this->bdd->prepare("
                INSERT INTO blog (idblog, titre, contenu, idcategorie)
                VALUES (:idblog, :titre, :contenu, :idcategorie)
                ON DUPLICATE KEY UPDATE titre = :titre, contenu = :contenu, idcategorie = :idcategorie
            ");
            $stmt->execute([
                ':idblog' => $idBlog,
                ':titre' => $titre,
                ':contenu' => $contenu,
                ':idcategorie' => $idcategorie
            ]);

            $this->bdd->commit();
        } catch (PDOException $e) {
            $this->bdd->rollBack();
            error_log("Erreur lors de l'ajout du blog : " . $e->getMessage());
            throw $e;
        }
    }


    public function addBlog($id_user, $titre, $contenu, $image, $video_url)
    {
        if (empty($titre) || empty($contenu) || empty($image)) {
            throw new InvalidArgumentException("Tous les champs sont obligatoires.");
        }

        $this->bdd->beginTransaction();
        if ($video_url != null) {
            try {
                // Insérer dans la base de données
                $stmt = $this->bdd->prepare("
                INSERT INTO blog (titre, contenu, image,IDUSER,video)
                VALUES (:titre, :contenu, :image,:user,:video)
            ");
                $stmt->execute([
                    ':titre' => $titre,
                    ':contenu' => $contenu,
                    ':image' => $image,
                    ':user' => $id_user,
                    ':video' => $video_url
                ]);

                $this->bdd->commit();
            } catch (PDOException $e) {
                $this->bdd->rollBack();
                error_log("Erreur lors de l'ajout du blog : " . $e->getMessage());
                throw $e;
            }
        } else {
            try {
                // Insérer dans la base de données
                $stmt = $this->bdd->prepare("
                INSERT INTO blog (titre, contenu, image,IDUSER)
                VALUES (:titre, :contenu, :image,:user)
            ");
                $stmt->execute([
                    ':titre' => $titre,
                    ':contenu' => $contenu,
                    ':image' => $image,
                    ':user' => $id_user
                ]);

                $this->bdd->commit();
            } catch (PDOException $e) {
                $this->bdd->rollBack();
                error_log("Erreur lors de l'ajout du blog : " . $e->getMessage());
                throw $e;
            }
        }
    }


    //    public function addCategorie($id_categorie, $nomcategorie)
    //    {
    //        $stmt = $this->bdd->prepare("SELECT idcategorie FROM categorie WHERE idcategorie = ?");
    //        $stmt->execute([$id_categorie]);
    //
    //        if (!$stmt->fetch()) {
    //            $stmt = $this->bdd->prepare("INSERT INTO categorie(idcategorie,nomcategorie) VALUES (:idcat, :nomcat)");
    //            $stmt->execute(
    //                array(
    //                    ':idcat' => $id_categorie,
    //                    ':nomcat' => $nomcategorie,
    //                )
    //            );
    //        }
    //    }

    public function trimId($id)
    {
        $segments = explode('/', $id);
        return implode('/', array_slice($segments, 0, 5));
    }

    public function readComment($id_blog)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM commentaire WHERE IDBLOG = :id_blog");
        $stmt->execute(
            ['id_blog' => $id_blog]
        );

        $result = $stmt->fetchAll();

        return $result;
    }


    public function readAll()
    {

        $stmt = $this->bdd->prepare("SELECT * FROM blog");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public function getLocalArticleById($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM blog WHERE idblog = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function  getVideo()
    {
        $apiKey = "AIzaSyDEGp9NjTOokyxLbbSSWBIk44lhLgcWnF8";
        $searchQuery = "cuisine africaine";
        $maxResults = 20;

        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($searchQuery) . "&type=video&maxResults=" . $maxResults . "&key=" . $apiKey;

        $response = file_get_contents($url);

        return json_decode($response, true);;
    }

    public function deleteBlog($id): bool
    {
        $stmt = $this->bdd->prepare("DELETE FROM blog WHERE IDBLOG = :id");
        try {
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression du blog : " . $e->getMessage());
            return false;
        }
    }
}
