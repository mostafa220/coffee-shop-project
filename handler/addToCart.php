<?php  
session_start();

  require '../include/function.php';
  require '../include/db.php';
if(isset($_POST['submit'])){
//    var_dump($_POST);
   $userId=$_SESSION['user_id'];
   $pro_id=$_POST['pro_id'];
   $product =getProductById($pro_id);
   $productName=$product['name'];
   $productImg=$product['img'];
   var_dump($product);
   if($pro_id){
        $stmt = $con->prepare("INSERT INTO  `users_card` VALUES(?,?)");
       $result =  $stmt->execute([$userId,$pro_id]);
       if($result){
       header("location:../index.php");
       }
       else{
         header("location:../index.php");
       }


   }
}