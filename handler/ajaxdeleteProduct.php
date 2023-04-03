<?php  
  if(isset($_POST['product_id'])){

    $product_id=$_POST['product_id'];
    // echo $product_id;
      
    include '../include/db.php';
    include '../include/function.php';
    $product=getProductById($product_id);
    // var_dump($product);
    $img_name=$product['image'];
    // echo $img_name;
    $file_name="../images/products/".$img_name;
    // echo $file_name;
    // echo $img_name;
    if (file_exists($file_name)) {
        unlink($file_name);
    }


    $query="DELETE FROM `products` WHERE product_id=?";
    $sql=$con->prepare($query);
    $result= $sql->execute([$product_id]);
    if($result){
        echo 1;
         //echo json_encode($product_id);
          }
          else{
            echo 0;
        }
}

?>