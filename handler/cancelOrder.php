<?php  
  if(isset($_GET['order_id'])){
    require '../include/function.php';
    $order_id=$_GET['order_id'];
    // echo $order_id;

   $update= updateStatus($order_id);
   var_dump( $update);
   if($update==true){
    header("location:../userPages/Order-user.php");
   }
   else{
    header("location:../userPages/Order-user.php");
   }

   


  }
?>