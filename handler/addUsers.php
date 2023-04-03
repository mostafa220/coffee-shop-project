<?php
include "../include/db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
    $room =$_POST['room'];
    $file_name=$_FILES['file']['name'];
    $email = $_POST['email'];
    $name =$_POST['Uname'];
    $phone =$_POST['phone'];
    $password = $_POST['password'];
    $file_tmp=$_FILES['file']['tmp_name'];


    $query = "SELECT * FROM `users` WHERE email = :email";
    $sql = $con->prepare($query);
    $sql->bindParam(':email', $email);
    $sql->execute();
    $user = $sql->fetch();

    

    $query1 = "SELECT * FROM admins WHERE email = :email";
    $sql1 = $con->prepare($query1);
    $sql1->bindParam(':email', $email);
    $sql1->execute();
    $admin = $sql1->fetch();
    

if($user['email'] == $email ||  $admin['email']== $email ){
        $_SESSION['error'] = "Email Already Existed";
        die();
}
else{
    move_uploaded_file($file_tmp,"../images/user_images/$file_name");
 $query = "INSERT INTO users (name,email,Password,room,image,phone) VALUES ('$name','$email','$password','$room','$file_name','$phone')";
 $sql =$con->Prepare($query);
$reult = $sql->execute();

$_SESSION['success'] = "success insertion ";
header("location:../adminPages/users.php");
die();
 
}

}

?>



