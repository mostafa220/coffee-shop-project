<?php
session_start();
$user_id = $_SESSION['user_id'];
require '../include/function.php';
require '../include/db.php';
if(isset($_POST['submit'])){

  if(empty($quantity) && empty($productsId)){
    header("location:../cart.php");
  }
    $quantity=$_POST['quantity'];
    $productsId=$_POST['productId'];
    // $user_id=1;
    $count= count($quantity);

    for ($z=0; $z <$count ; $z++) { 
        $prices[]= getProductPriceById($productsId[$z]);
    }
      $pricesArray=array_column($prices,'price');
    $totalPrice=0;  
   for ($i=0; $i <$count ; $i++) { 
     $totalPrice += ((float)$quantity[$i] * (float)$pricesArray[$i]);
   }
   
 
    $insert=$con->prepare("INSERT INTO `orders` (totalPrice,user_id) VALUES(?,?)");
    $insert->execute([$totalPrice,$user_id]);
    if($insert){
      $last_id = $con->lastInsertId();
       for ($index=0; $index<$count ; $index++) { 
        $insertToProductOrder=$con->prepare("INSERT INTO `products_orders` (order_id,product_id,quantity,price) VALUES(?,?,?,?)");
        $insertToProductOrder->execute([$last_id,$productsId[$index],$quantity[$index],$pricesArray[$index]]); 
        if($insertToProductOrder){

          $delete=$con->prepare("DELETE FROM `users_card` WHERE user_id=?");
          $delete->execute([$user_id]);
           if($delete){
             header("location:../userPages/Order-user.php");
           }

          // echo "insertion success";
        }
        else{
          
          // echo "insertion failed";
          header("location:../cart.php");
        }
       }
    }
    else{
      // echo "no";
      header("location:../cart.php");
    }


  
 
  //  echo $totalPrice;



 

  
}


//  var_dump($_REQUEST['quantity']);

// var_dump($_POST['product_id']);
// $product_id=explode(",",$_POST['product_id']);
// var_dump( $product_id);
// $count = count($product_id);
// for($i=0;$i<$count-1;$i++)
// {
//     echo $product_id[$i];
// }