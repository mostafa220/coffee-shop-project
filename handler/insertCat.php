<?php 
session_start();
 require '../include/validate.php';
 require '../include/function.php';
  if(isset($_POST['submit'])){
   $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
   if (ValidCountString($name)){
      $insert=InsertToCat('categories','name',$name);
      if($insert){
        $_SESSION['success']="insertion successfull";
      }
      else{
        $_SESSION['error']="insertion failed";
      }
      header("location:../adminPages/addCategory.php");
      die();
   }
   else{
    $_SESSION['error']="type valid string";
    header("location:../adminPages/addCategory.php");
    die();
   }
  }



?>