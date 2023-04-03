<?php 
include '../include/db.php';
include '../include/function.php';

if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $user=getUserData('users',$id);
    $img_name=$user['image'];
    $file_name="../images/user_images"."/".$img_name;

    $query="DELETE FROM `users` WHERE id=?";
    $sql=$con->prepare($query);
    $result= $sql->execute([$id]);
    if($result){
        if (file_exists($file_name)) {
            unlink($file_name);
        }
      
        header("location:../adminPages/users.php");
    }
    else{
        header("location:../adminPages/users.php");
    }
}
