<?php
session_start();
require_once  __DIR__  .'/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\ArticleController;
use App\Controllers\AddArticleController;
use App\Controllers\EditArticleController;
use App\Controllers\DeleteArticleController;



$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'fetchMoreUsers':
        $controller = new HomeController();
        $controller->fetchMoreUsers();
        break;
    case 'register':
        $logincontroller = new LoginController();
        $logincontroller->registerUrl();
        break;
    case 'login':
            $logincontroller = new LoginController();
            $logincontroller->login();
            break;
    case 'register_user':
            $logincontroller = new LoginController();
            $logincontroller->register();
            break;
    case 'logout':
            $logincontroller = new LoginController();
            $logincontroller->logout();
            break;
    case 'showAllArticles':
            $articlecontroller = new ArticleController();
            $articlecontroller->showAllArticles();
            break;
    case 'addArticle':
            $articlecontroller = new AddArticleController();
            $articlecontroller->addArticle();
            break;
    case 'editArticle':
            $editarticlecontroller = new EditArticleController();
            $editarticlecontroller->EditArticle();
            break;
    case 'deleteArticle':
            $deletearticlecontroller = new DeleteArticleController();
            $deletearticlecontroller->DeleteArticleController();
            break;
    

            
    // Add more cases for other routes as needed    
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>
