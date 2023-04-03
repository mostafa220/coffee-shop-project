<?php  

session_start();
require '../include/validate.php';
require '../include/db.php';
if(isset($_POST['update'])){

    $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
    if (ValidCountString($name) && !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['password'])){
        $user_id=$_POST['user_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $room=$_POST['room'];
        $password=$_POST['password'];
        $old_img=$_POST['old_img'];

        $extArr=['png','jpg','jpeg'];
        $img_tmp=$_FILES['file']['tmp_name'];
        $new_name=$_FILES['file']['name'];



        if($new_name != ""){
            $mime=mime_content_type($img_tmp);
            $extension = explode('/', $mime )[1];
            $file_name="../images/user_images"."/".$old_img;
                if (file_exists($file_name)) {
                    unlink($file_name);
                }
                else{
                    $_SESSION['error']="error in location of image ";  
                    header("location:../adminPages/edituser.php?user_id=$user_id");
                }

        move_uploaded_file($img_tmp,"../images/user_images/$new_name");
    }

    else{
        $new_name=$old_img;
    }

    $query="UPDATE `users` SET name =:name , email=:email , password=:password , phone=:phone , room=:room  , image=:new_name WHERE id =:user_id";
    

    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone'=>$phone,
        'room' => $room,
        'new_name' => $new_name,
        'user_id' => $user_id,
    ];
    $stmt= $con->prepare($query);
    $stmt->execute($data);
    if($stmt){
    $_SESSION['success']="suuccess update ";  
    header("location:../adminPages/edituser.php?user_id=$user_id");
                    header("location:../adminPages/edituser.php?user_id=$user_id");
   }
   else{
    $_SESSION['error']="update failed ";  
    header("location:../adminPages/edituser.php?user_id=$user_id");
   }
  }
  else{
    $_SESSION['error']="please type valid data ";  
    header("location:../adminPages/edituser.php?user_id=$user_id");
  }
 

}
