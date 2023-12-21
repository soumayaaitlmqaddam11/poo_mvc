<?php
namespace App\Controllers;
use App\Models\UserModel;

class LoginController
{
    public function loginUrl()
    {
       
     
       

    }
    public function registerUrl()
    {
       
        require(__DIR__ .'../../../view/register.php');
       

    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $userModel = new UserModel();
            //$userModel->setUsername($username);
            $userModel->login($password);
        } 
        require(__DIR__ .'../../../view/login.php');
        
    }
public function register()
    {
        $userModel = new UserModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword =  password_hash($password, PASSWORD_DEFAULT);
            $users = $userModel->register($username ,$email ,  $hashedPassword);
            if($users){
              
                header("location:index.php?route=login");
            }else{
                ECHO $erreur = "email or password is invalid !";
            }
            
           
    }
}
public function logout()
{
    session_destroy();
   
    require(__DIR__ .'../../../view/login.php');
   

}
public function article(){
   
}
}
?>
