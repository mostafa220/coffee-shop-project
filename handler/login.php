<?php
  session_start();
include "../include/db.php";
// $error_message = "";

    $email = $_POST['email'];
    $password = $_POST['password'];
 if(isset($_POST['submit'])){
    $query = "SELECT * FROM `users` WHERE email = :email";
    $sql = $con->prepare($query);
    $sql->bindParam(':email', $email);
    $sql->execute();
    $user = $sql->fetch();
    // print_r($user);
// if is normal user 
    if($user){
        // لو كان كلمه السر صح
        if($password=$user['password']){
              
            $_SESSION['user_email']= $user['email'];
            $_SESSION['user_id']= $user['id'];
            $_SESSION['user_name']= $admin['name'];


            header("location:../index.php");
            die();
            
            
    }
        else{
            $_SESSION['error']="Incorrect password";
            header('Location:../login.php') ;
            die();
        }
    }
// if isnt normal user 
else{
    $query = "SELECT * FROM admins WHERE email = :email";
    $sql = $con->prepare($query);
    $sql->bindParam(':email', $email);
    $sql->execute();
    $admin = $sql->fetch();

    if($admin){
     if($password == $admin['password']){
        header("location:../adminPages/adminDashboard.php");
      
        $_SESSION['admin_email']= $admin['email'];
        $_SESSION['admin_id']= $admin['admin_id'];
        $_SESSION['admin_name']= $admin['name'];
     }
     else{
        $_SESSION['error']="Incorrect password";
        header('Location:../login.php') ;
        die();
    }
    }
    else{
      header('Location:../login.php') ;
            }
   }  
}
   else{
    header('Location:../login.php') ;
      }
   
?>