<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location:../login.php');
}
?>
<?php 
  require '../include/function.php';

//   echo $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- Icone only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Cart</title>
    <script>
    
    </script>
</head>
<style>
    body {
        background-image: url("../images/cart/slider3.jpg");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        color: #7b3826;

    }

    .btn {
        color: white;
        background-color: #7b3826;

    }
    .btn:hover{
           color: white;
        background-color: #7b3826; 
    }

    .card {
        margin-top: 30px;
        background-color: #fff;
        border-radius: 20px;
    }

    .form-label {
        color: #333333
    }
</style>

<body onload="">
    <!-- Navbar -->
    <?php include 'userNav.php'; ?>
  <!-- Navbar -->
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    
                    <div class="card mb-4">
                        <div class="card-header py-2" style="background-color: #7b3826b5;">
                            <p class="mb-0" style="color: #fff; font-size: 50px;">My Cart</p>
                            <h5 class="mb-0"><?php 
                               $user_id=$_SESSION['user_id'];
                              $items=countItems($user_id);
                            echo ($items)?$items:0 ?> Items</h5>
                        </div>
                        <div class="card-body">
                     <form action="../handler/addOrder.php" method="post">

                     
                            <!-- Single item-1 -->
                            <?php
                             $userCarts=userCart($user_id);
                             $arrPrice = array_column($userCarts,'price');
                            //  $items = array_column($userCarts,'product_id');
                             $countIems=count($arrPrice);
                             
                             $totalPrice = array_sum($arrPrice);
                             foreach($userCarts as $userCart):
                             ?>
                        <div class="row" data-record="<?php echo  $user_id; ?>"  data-id="<?php echo  $userCart['product_id']??0; ?>">
                          
                                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                    <!-- Image -->
                                    <div class="bg-image " data-mdb-ripple-color="light">
                                        <img src="../images/products/<?php echo $userCart['image'] ;?>" class="w-100"
                                            alt="coffee" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 record" >
                                    <!-- product-1 -->
                                    <p><strong><?php echo $userCart['name'] ;?></strong></p>
                                    <p>Size: L</p>
                                    <button onclick="(event.preventDefault())" class="btn btn-primary btn-sm me-1 mb-2 delete-btn" data-id="<?php echo  $userCart['product_id']??0; ?>"
                                    data-userid="<?php echo  $user_id??0; ?>"    
                                    style="background: #0066ff;" data-mdb-toggle="tooltip" title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2"
                                        style="background: #cc0000;" data-mdb-toggle="tooltip"
                                        title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                                <?php  ?>
                                <!-- product-1 -->
                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <!-- Quantity product-1 -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <button class=" btn btn-block px-3 me-2 minus" data-id="<?php echo  $userCart['product_id']??0; ?>"
                                            onclick="">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <div class="form-outline text-center">
                                            <label class="form-label " for="form1">Quantity</label>
                                            <input   name="quantity[]"  value="1" type="text"  readonly
                                                class="form-control qty_input" data-id="<?php echo  $userCart['product_id']??0; ?>"/>

                                                <input type="hidden" name="productId[]" value="<?php echo  $userCart['product_id']; ?>">
                                        </div>

                                        <button class="btn btn-block px-3 ms-2 plus" data-id="<?php echo  $userCart['product_id']??0; ?>"
                                            onclick="(event.preventDefault)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- Quantity product-1 -->

                                    <!-- Price -->
                                    <p class="text-start text-md-center price">
                                    $<strong><span class="product_price " data-id="<?php echo  $userCart['product_id']??0; ?>"> <?php echo $userCart['price'] ;?></span></strong>
                                       
                                    </p>
                                    <!-- Price -->
                                </div>
                            </div>
                           
                            <!-- Single item -->
                            
                            <hr class="my-4" />
                            <?php endforeach; ?>

                        </div>
                       
                    </div>
                    
                    <div class="card mb-4" style="background-color: #7b3826ce; color: #fff;">
                        <div class="card-body">
                            <p><strong>Expected shipping delivery</strong></p>
                            <p class="mb-0">24.03.2023 at 10 PM - 24.03.2023 at 11 PM</p>
                        </div>
                    </div>
               
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3" style="background-color: #7b3826b5;">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                           
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total Price</strong>
                                    </div>
                                    <strong> <span id="deal_price">
                                        <?php 
                                       echo $totalPrice??0;
                                    ?>
                                    </span></strong>
                                </li>
                            </ul>
                            <div class="text-center mb-3 ">
                        
                               
                                <input type="submit" value="Go to checkout" class="btn btn-block btn-lg btn-block " name="submit">
                            <!-- <button type="submit" class="btn btn-block btn-lg btn-block " name="submit">
                                
                            </button> -->

                            </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

    </script>
    <script>
        src =
            "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
        integrity =
            "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4";
        crossorigin = "anonymous";

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
       $(document).ready(function()
                {    
                        $(".plus").click(function(event)
                        {            
                            event.preventDefault();
                        
                        });

                        $(".minus").click(function(event)
                        {            
                            event.preventDefault();
                        
                        });        
                });    

</script>
<script src="../assets2/js/cart.js"></script>
</body>

</html>