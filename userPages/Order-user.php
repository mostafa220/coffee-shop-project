<?php session_start();

if(!isset($_SESSION['user_id'] )){
  header("location:../index.php");
}  ?>

<?php require '../include/function.php';
   $user_id= $_SESSION['user_id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- important only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Icone only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Orders</title>
</head>
<style>
    body {
        background-image: url("./");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        color: #7b3826;

    }
</style>

<body>
    <!-- Navbar -->
 <?php include 'userNav.php'; ?>


    <div id="accordion">
        <div class="container py-5">
            <div class="table-responsive">
                <div class="mb-5">
                    <h1>My Orders</h1>
                </div>
                
                <table class="table accordion text-center table-bordered col-10">
                    <thead>
                                  
                      <tr>
                        <tr>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                       <!-- HTML for the link and accordion -->


                    </thead>
                    <!-- target="#r1" -->
                    <tbody class="table " >
                    <?php 
                       $orders=getOrderDataById($user_id);
                    
                        foreach ($orders as $order):
                      
                          
                       ?>  
                        <tr class=""  data-id="<?php echo $order['order_id'] ?>" style="background-color:#7b3826; color: #fff;">
                        <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['created_at']?></td>
                        <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['status']?></td>
                        <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['totalPrice']?></td>
                        
                        <td>  <?php
                        if($order['status'] =='proccessing'):?> 
                        <a href="../handler/cancelOrder.php?order_id=<?php echo $order['order_id'] ?>">
                       cancel</a>
                       <?php endif;?>
                    </td>
                        </tr>
                        <?php 
                         $order_id =$order['order_id'];
                        //  echo $order['order_id'];
                         
                              ?>
                    </tbody>
                    <tbody>
                            <?php
                              
                        
                           
                            ?>
                           
                        </thead>
                    <tbody>
                        <!-- id="r11"-->
                      
                              
                        
                        <tr class="collapse accordion-collapse w-100" id="r<?php echo $order['order_id'] ?>" data-bs-parent=".table" style="background-color: #7b3826ce; color: #fff;">
                        <td id="f" colspan="5">
                        <div class="d-flex justify-content-evenly ">
                            <?php
                           
                            $details = getOrderDetails($user_id,$order_id); 
                          
                            foreach($details as $detail): 
                            ?>
                                
                                    <div style="color:black" class="pt-5  justify-content-evenly  ">
                                        <span><img src="../images/products/<?php echo $detail['image']; ?>" height="200px"width="150px"alt="">
                                        <p><?php echo $detail['name']; ?></p>
                                        <p><?php echo $detail['price']; ?></p>
                                        <p><?php echo $detail['quantity']; ?></p>
                                        
                                        </span>
                                    </div>
                                    
                                <?php endforeach;?>
                            <span style="font-size: 30PX;" class="d-block"> <p>TotalPrice : <?php echo $order['totalPrice']; ?></p></span>
                                
                               
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                        
                  <?php  endforeach; ?>
                       
                    </tbody>


                    <!-- ////////////////////2////////////////// -->

                </table>

             
            </div>
        </div>


        <!-- Java Script only -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

           
</body>

</html>

