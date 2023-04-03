<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php 
  session_start();
    if(isset($_SESSION['admin_id'])){
      header("location:adminPages/adminDashboard.php");
    }elseif(isset($_SESSION['user_id'])){
      header("location:index.php");
    }

  ?>
  <title>Login</title> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <style>
 .login{
    width: 400px;
    border-radius: 10px;
    box-shadow: 10px 5px 4px rgba(0, 0, 0, 0.5);
 }
 body{
    background: url("https://www.nextdaycoffee.co.uk/media/xt-adaptive-images/480/images/fullwidthbg/fwcta_caferoma.jpg");
    background-size: cover;
    background-repeat: no-repeat;
   background-origin: border-box;
 }
  </style>
</head>
<body >
 <div class="container">
        <div class="login card-body p-4 mt-5 text-black bg-white mx-auto">
          <form action="handler/login.php" method="post" >

            <div class="d-flex align-items-center mb-3 pb-1">
              <span class="h1 fw-bold mb-0"><img src="assets2/images/logo (1).png" alt=""></span>
            </div>

            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
            <small id="formError" class="form-text text-danger "></small>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example17">Email address</label>
              <input type="email" name="email"  id="emailInput" class="form-control form-control-lg" required >
              <small id="emailError" class="form-text text-danger "></small>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example27">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required > 
                    <small id="passwordError" class="form-text text-danger "></small>
            </div>

            <div class="pt-1 mb-3">

              <input type="submit" id="butns" class="btn btn-dark btn-lg btn-block w-100" value="login" name="submit" >
            </div>

            <a class="small text-muted" href="userPages/resetPassword.php">Forgot password?</a>
            <p class=" pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                style="color: #393f81;">Register here</a></p>
          </form>

        </div>
      </div>
 </div>
 <script>
     var emailInput = document.getElementById("emailInput");
    let valid =false;
emailInput.addEventListener('keyup',()=>{
  var emailError = document.getElementById("emailError");
    var email = emailInput.value;
    if (email == "") {
      emailError.innerHTML = "Please enter your email";
      emailInput.classList.add("is-invalid");
      valid =false;
    } else if (!/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,5})$/.test(email)) {
      emailError.innerHTML = "Please enter a valid email address";
      emailInput.classList.add("is-invalid");
      valid =false;
    } else {
      emailError.innerHTML = "";
      emailInput.classList.remove("is-invalid");
      valid =true;
    }
})

//password Validation 
var passwordInput = document.getElementById("passwordInput");
passwordInput.addEventListener('keyup',()=>{
  var passwordError = document.getElementById("passwordError");
    var password = passwordInput.value;
    if (password == "") {
      passwordError.innerHTML = "Please enter a password";
      valid =false;
      passwordInput.classList.add("is-invalid");
    } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(password)) {
      passwordError.innerHTML = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
      passwordInput.classList.add("is-invalid");
      valid =false;
    } else {
      passwordError.innerHTML = "";
      passwordInput.classList.remove("is-invalid");
      valid =true;
    }
})
const form = document.getElementsByTagName('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevents the form from submitting normally
  let formError = document.getElementById('formError')
  if (valid) {
    form.submit(); 
  } else {
    formError.innerHTML="Please fill out all required fields"
  }})
</script>
</body>
</html>
