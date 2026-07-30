
<?php

require_once "../controllers/Usercontroller.php";

$userController = new Usercontroller();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['submitBtn'])) {

        $result = $userController->login($_POST);

        // If login() returns an error
        if ($result !== null) {
            echo $result['message'];
        }
    }
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/css/login.css">
  
</head>
<body>
<!--This is the div containing the whole page-->
<div class="Page">
<form action="" method="POST">
  <div class="containerForm">

  <div class="formHead">
    <h1>LOGIN</h1>
  </div>
  
  <div>
  <label for="">Username</label><br>

  <input type="text" 
  name="username"
  placeholder="Enter your full name">
</div>


<div>
  <label for="">Password</label>
  <br>
  <input type="password"
  name="password"
  placeholder="Enter your password">
</div>




<div>
  <button
  type="submit"
  name="submitBtn">Submit</button>
 </div>
 
 <div>
   <p> Doesnt have an account?
    <a href="./register.php" 
    style="color: rgb(96, 70, 48);">Sign Up</a>
   </p>
   </div>
   
   
   
   
   
   </div>
</form>
</div>
</body>
</html>