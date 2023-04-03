<?php 
require '../include/db.php';
if(isset($_POST['submit'])){
    $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
    $confirmPassword = filter_var($_POST['confirmPassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    echo $password;
    echo $email;
    if($password == $confirmPassword && !empty($password)){
   
            $query2="UPDATE `users` SET password=? WHERE email=?";
            $sql2= $con ->prepare($query2);
           $result = $sql2 -> execute([$password,$email]);
             if($result){
                header("location:../login.php");
                  die();
               }
    }
    else{
        header("location:../userPages/changePassword.php?email=$email");
        die();
        
    }
  
    

 
}

