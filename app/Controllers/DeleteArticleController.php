<?php
namespace App\Controllers;
use App\Models\Job;
use App\Models\Database;
class DeleteArticleController
{
    public function DeleteArticleController()
    {
        $conns = new Database();
        $conn=$conns->getConnection();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $job_id = $_GET['id'];
            
            // Initialise le modèle
            $jobModel = new Job($conn);

            // Appeler la méthode pour supprimer l'article
            $result = $jobModel->deleteArticle($job_id);
        
            if ($result === true) {
                // Rediriger vers la page des articles après la suppression
                header('Location:index.php?route=showAllArticles');
            } else {
                // Gérer les erreurs de suppression ici
                echo "Error: " . $result;
            }
        }
    }
} 
?>
