<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Database;

class AddArticleController {
    private $nouvelUtilisateur;
     
    
    

    public function addArticle() {
        $conns = new Database();
        $conn=$conns->getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['title']) && isset($_POST['description'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $company = $_POST['company'];
                $location = $_POST['location'];
                $status = $_POST['status'];
                $date_created = $_POST['date_created'];
                $image_path = $_FILES['image_path'];
                // var_dump($image_path);
                // die();
                $nouvelUtilisateur = new Job($conn);
        
                // Configurer les propriétés d'abord
                $nouvelUtilisateur->setTitle($title);
                $nouvelUtilisateur->setDescription($description);
                $nouvelUtilisateur->setCompany($company);
                $nouvelUtilisateur->setLocation($location);
                $nouvelUtilisateur->setStatus($status);
                $nouvelUtilisateur->setDateCreated($date_created);
                $nouvelUtilisateur->setImagePath($image_path);
        
                // Ensuite, ajouter l'article
                $nouvelUtilisateur->addArticle($title, $company, $description, $location, $status, $date_created, $image_path);
                header('Location: index.php?route=showAllArticles');
            }
        }
        require(__DIR__ .'../../../view/addArticle.php') ;
    }
}
?>