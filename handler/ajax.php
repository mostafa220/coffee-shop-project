<?php 
 require '../include/function.php';
if(isset($_POST['product_id'])){
   $product = getProductById($_POST['product_id']);
  
    echo json_encode($product);
}