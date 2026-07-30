<?php
class User{
  private object $conn;

  public int $id;
  public string $username;
  public string $email;
  public string $password;


  public function __construct($dbconn){
    $this->conn = $dbconn;
  }

  public function create(array $input){
    $username = $input['username'];
    $email = $input['email'];
    $password = password_hash($input['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO User(username,email,password)VALUES('$username', '$email', '$password')";

    $result = $this->conn->query($query);

    if(!$result){
      return [ 'status' => 'error', 'message' => 'Failed to insert user: ' . $this->conn->error ]; }else{

return [ 'status' => 'OK', 'message' => ' Account created successfully']; }

      }

      public function findByUsername(string $username){
        $sql = "SELECT * FROM User WHERE username = '$username'";
    
        $result = $this->conn->query($sql);
        if(!$result){
         return null;
        }else{
    
          $user= $result->fetch_assoc();
          return $user;
        }
    
        }
  }













?>