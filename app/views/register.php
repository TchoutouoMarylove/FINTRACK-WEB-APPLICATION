<?php require_once "../controllers/Usercontroller.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $userController = new Usercontroller();
   $result = $userController->createUser($_POST); header('Content-Type: application/json'); 
   echo json_encode($result);
    exit(); } ?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../public/css/register.css">
  
</head>
<body>
<!--This is the div containing the whole page-->
<div class="Page">
<form action="" method="POST" id="registerForm">
  <div class="containerForm">

  <div class="formHead">
    <h1>Create Account</h1>
  </div>
  
  <div>
  <label for="">Username</label><br>

  <input type="text" 
  name="username"
  placeholder="Enter your full name">
</div>


<div>
  <label for="">Email</label>
  <br>
  <input type="text"
  name="email"
  placeholder="Enter your email">
</div>


<div>
  <label for="">Password</label><br>
  <input type="password"
 name="password"
 placeholder="Enter your Password">
</div>

<div id="message">

</div>

<div>
  <button
  type="submit"
  name="submitBtn">Submit</button>
 </div>
 
 <div>
   <p>Already have an account?
    <a href="./login.php" style="color: rgb(129, 184, 201);;">Log in</a>
   </p>
   </div>
   
   
   
   
   
   </div>
</form>
</div>




  <script src="../../public/js/register.js">

  </script>
</body>
</html>