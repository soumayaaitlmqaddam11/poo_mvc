<?php

namespace App\Controllers;
use App\Models\Job;
use App\Models\Database;

class EditArticleController
{
    public function EditArticle()
    {
        $conns = new Database();
        $conn=$conns->getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $job_id = $_GET['id'];
        
            // Créer une instance de la classe Job
            $jobModifier = new Job($conn);
        
            // Récupérer les détails de l'article à éditer
            $articleDetails = $jobModifier->getArticleDetails($job_id);
        
            if ($articleDetails) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $company = $_POST['company'];
                $location = $_POST['location'];
                $status = $_POST['status'];
                $date_created = $_POST['date_created'];
                $image_path = $_POST['image_path'];
        
                $jobModifier->setTitle($title);
                $jobModifier->setDescription($description);
                $jobModifier->setCompany($company);
                $jobModifier->setLocation($location);
                $jobModifier->setStatus($status);
                $jobModifier->setDateCreated($date_created);
                $jobModifier->setImagePath($image_path);
                $jobModifier->updateArticle($job_id, $title, $company, $description, $location, $status, $date_created, $image_path);
                header('Location:index.php?route=showAllArticles');
        
            }
        } else if (isset($_GET['id'])) {
            $job_id = $_GET['id'];
        
            // Créer une instance de la classe Job
            $jobModifier = new Job($conn);
        
            // Récupérer les détails de l'article à éditer
            $articleDetails = $jobModifier->getArticleDetails($job_id);
        
        
        

    }
    require(__DIR__ .'../../../view/editArticle.php') ;
    }

   
}
?>