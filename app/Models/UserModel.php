<?php


namespace App\Models;

class UserModel
{
    private $db;
    private $conn;

    public function __construct()
    {
        // Get an instance of the Database class
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public function getAllUsers()
    {
        // Fetch data from the "users" table
        $result = $this->db->getConnection()->query("SELECT * FROM users");
        // Fetch data as an associative array
        $users = $result->fetch_all(MYSQLI_ASSOC);
       
        return $users;
    }


    public function login($email)
    {


       
        $password = $_POST["password"];
        $email = $_POST["email"];
        $result = $this->db->getConnection()->query("SELECT * FROM users where email ='$email'");
        $row  = mysqli_num_rows($result) ;
        $user =mysqli_fetch_assoc($result);
        $hashedPassword =$user["password"];
        if ($row && password_verify($password, $hashedPassword)) {
                if ($user['role_name'] == 'admin') {
                    header("location: index.php?route=showAllArticles");
                   }else{
                    header("Location: index.php?route=home");
                   }
        }else{
            ECHO $erreur = "login or password is invalid !";
        }

    }
    public function register($username ,$email , $hashedPassword)
    {
        $result = $this->db->getConnection()->query("INSERT INTO `users` (`username` ,`email`, `password`) VALUES ('$username','$email','$hashedPassword')");
       
        
        return $result;


    }
}
?>
