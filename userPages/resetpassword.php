<?php session_start();

if(isset($_SESSION['user_id'] )){
  header("location:../index.php");
}  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
    <style>
 
 body{
    background: url("https://www.nextdaycoffee.co.uk/media/xt-adaptive-images/480/images/fullwidthbg/fwcta_caferoma.jpg");
    background-size: cover;
    background-repeat: no-repeat;
   background-origin: border-box;
 }
  </style>
</head>
<body>

<form action="../handler/resetPassword.php" method="post" class="col-8 mt-5 offset-2 border p-5" >
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control"  name="email"/>
    <label class="form-label" for="form2Example1">Email address</label>
  </div>


  <!-- Submit button -->
  <div>
    <input type="submit" value="Reset" name="submit" class="btn btn-primary btn-block mb-4 mt-3">
  </div>
  

</form>
</body>
</html>