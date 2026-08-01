<?php  

  $host = "localhost"; // 127.0.0.1
  $user = "root";
  $password = "";
  $database = "fintrack";

  // try{
    //the mysql connection object: it tries connecting to the mysql database
  $conn = new mysqli($host , $user, $password, $database); 
  //check success of failure from connection object
    if($conn->error){
      die("connection to the database failed with error:".$conn->error);
    
    }

?>