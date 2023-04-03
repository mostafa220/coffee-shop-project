<?php
 session_start();
 require '../include/validate.php';
 require '../include/db.php';
//  require 'function.php';
  if(isset($_POST['submit'])){
   $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
    if (ValidCountString($name) && !empty($_POST['price']) && !empty($_POST['category'])&& !empty($_FILES['file']['name'])){
     $price=$_POST['price'];
     $category=$_POST['category'];
     $tmp_name=$_FILES['file']['tmp_name'];
     $img_name=$_FILES['file']['name'];
    //  echo $img_name;

     $extArr=['png','jpg','jpeg'];
     $mime=mime_content_type($tmp_name);
     $extension = explode('/', $mime )[1];
     echo $extension."<br>";
    //  $ext = pathinfo($img_name, PATHINFO_EXTENSION);
    //  echo $ext;
    if(in_array($extension,$extArr)) {

          $query=("INSERT INTO `products` (name, price,image,category_id) 
          VALUES (:name, :price, :image , :category_id)");
          $sql = $con->prepare($query);
          $result = $sql->execute(
            array(
                "name" => $name,
                "price" => $price,
                "image" => $img_name ,
                "category_id" => $category
            ));

      if($result)
        {
            $move=move_uploaded_file($tmp_name,"../images/products/$img_name");
            if(!$move)
            {
              $_SESSION['error']="uploaded failed";   
            }
          $_SESSION['success']="insertion successfull";  
          header("location:../adminPages/addProduct.php");
          die();
        }
          else{
            $_SESSION['error']="insertion failed";  
            header("location:../adminPages/addProduct.php");
            die();
              }

        }

        else{
          $_SESSION['error']="please upload valid image ";  
          header("location:../adminPages/addProduct.php");
          die();
            }
    }

    
      else{
        $_SESSION['error']="type valid name and fill all data";
        header("location:../adminPages/addProduct.php");
        die();
      }
  
  
  
  }
  

  else{
    header("location:../adminPages/addProduct.php");
    die();
  }

 

?>