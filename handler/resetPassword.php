<?php  
   require '../include/db.php';
   $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $query="SELECT * FROM users WHERE email=:email";
    $stmt = $con->prepare($query);
    $stmt->execute(array(
       'email' => $email
    ));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user){
       $email=$user['email'];
       header("location:../userPages/changePassword.php?email=$email");
    }
    else{
        header("location:../userPages/resetPassword.php");
    }

?>