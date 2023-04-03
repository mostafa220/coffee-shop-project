<?php  
     include '../include/db.php';
 $user_id=$_POST['user_id'];
 $product_id=$_POST['product_id'];

 
 $query="DELETE FROM `users_card` WHERE user_id =? AND product_id=?";
 $sql=$con->prepare($query);
 $result= $sql->execute([$user_id,$product_id]);

 if ($result) {
    
    echo 'Record deleted successfully';
  } else {
   
    echo 'Error deleting record';
  }
// echo json_encode([$user_id,$product_id]);


?>