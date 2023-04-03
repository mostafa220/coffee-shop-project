<?php  
session_start();

if(isset($_SESSION['user_id'] )){
  header("location:../index.php");
} 
 if(!isset($_GET['email'] )){
   header("location:resetPassword.php");
 } 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>

 body{
    background: url("https://www.nextdaycoffee.co.uk/media/xt-adaptive-images/480/images/fullwidthbg/fwcta_caferoma.jpg");
    background-size: cover;
    background-repeat: no-repeat;
   background-origin: border-box;
 }
  </style>
<body>

<form action="../handler/changePassword.php" class="col-5 mt-5 offset-4 border p-5 bg-light border" method="post">


 
    <input type="hidden" id="form2Example2" class="form-control" name="email" value="<?php echo $_GET['email']??"jdjd";?>"/>
   
 
  <!-- Password input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example2">Password</label>
    <input type="password" id="form2Example2" class="form-control" name="password" />
  
  </div>

   <!-- Password input -->
   <div class="form-outline mb-4">
   <label class="form-label" for="form2Example2">confirm Password</label>
    <input type="password" id="form2Example2" class="form-control" name="confirmPassword" />
 
  </div>


  <!-- Submit button -->
  <div class="text-right">
    <input type="submit" value="change Password" name="submit" class="btn btn-primary btn-block mb-4 mt-3 ">
  </div>
  


</form>
</body>
</html>