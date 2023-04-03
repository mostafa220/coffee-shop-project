<?php 

$con = new PDO('mysql:host=localhost;dbname=cafee', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// if($con){
//     echo "yes";
// }
//  $query="SELECT * FROM users";
//   $stmt = $con->prepare($query);
//   $stmt->execute();
//   $result = $stmt->fetchAll();
//   var_dump($result);

