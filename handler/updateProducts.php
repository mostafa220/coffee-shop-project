<?php  

session_start();
require '../include/validate.php';
require '../include/db.php';
if(isset($_POST['update'])){

  $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
  if (ValidCountString($name) && !empty($_POST['price'])){
    $product_id=$_POST['product_id'];
   $name=$_POST['name'];
   $price=$_POST['price'];
  
   $status=$_POST['status'];
   
   $old_img=$_POST['old_img'];
   $extArr=['png','jpg','jpeg'];

   $img_tmp=$_FILES['file']['tmp_name'];
   $new_name=$_FILES['file']['name'];
  //  echo $new_name;
 
  //  echo $extension."<br>";
     
    if($new_name != ""){
      $mime=mime_content_type($img_tmp);
      $extension = explode('/', $mime )[1];
       $file_name="../images/products"."/".$old_img;
       if (file_exists($file_name)) {
           unlink($file_name);
       }
       else{
        $_SESSION['error']="error in location of image ";  
        header("location:../adminPages/editProducts.php?product_id=$product_id");
       }
  
       move_uploaded_file($img_tmp,"../images/products/$new_name");
    }
  
    else{
      $new_name=$old_img;
    }
    // echo $new_name;
  
  
     $query="UPDATE `products` SET name =:name , price=:price , status=:status  , image=:new_name WHERE product_id =:product_id";
   //   $query="UPDATE `users` SET name =? , price=? , status=?  , image=? WHERE product_id =?";  second way for update
   // $stmt->execute([$name, $price, $status,$new_name, $product_id]);
   
   $data = [
       'name' => $name,
       'price' => $price,
       'status' => $status,
       'new_name'=>$new_name,
       'product_id' => $product_id,
   ];
   $stmt= $con->prepare($query);
   $stmt->execute($data);
   if($stmt){
    $_SESSION['success']="suuccess update ";  
    header("location:../adminPages/editProducts.php?product_id=$product_id");
   }
   else{
    $_SESSION['error']="update failed ";  
    header("location:../adminPages/editProducts.php?product_id=$product_id");
   }
  }
  else{
    $_SESSION['error']="please type valid data ";  
    header("location:../adminPages/editProducts.php?product_id=$product_id");
  }
 

}
