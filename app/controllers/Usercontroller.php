<?php
session_start();
  require_once "../../config/db.config.php";
  require_once "../models/Usermodel.php";
  $user = new User($conn);
 
class Usercontroller{
  public function createUser(array $data){
    global $user;
    $username=$data['username'];
    $email = $data['email'];
    $password = $data['password'];

    if(empty($username)){
     return [ 'success' => 'error',
      'message' => 'Username is required' ];
    }elseif(empty($email)){
      return[
      'success' =>'error', 
      'message' => 'Email is required'] ;
    }elseif(empty($password)){
      return [ 'success' => 'error', 'message' => 'Password is required' ];

    }else{
       return $user -> create($data);
      }
    }

    public function login(array $credentials){
      global $user;
      $username = $credentials['username'];
      $password = $credentials['password'];
  
  
      if(empty($username) || empty($password)){
        die ("invalid email or password");
      }else{
        $user = $user->findByUsername($username);
        $hashPassword = $user['password'];
        $password_match = password_verify($password, $hashPassword);
  
        if(!$password_match){
          die("invalid username or password");
        }else{
        $_SESSION['id'] =$user['id'];
        $_SESSION['username'] =$user['username'];
          header("Location: ../Views/UserDashboard.php");
          exit();
        }
      }
    }
  }
  












 ?>
