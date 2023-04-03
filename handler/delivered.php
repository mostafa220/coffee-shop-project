<?php
require '../include/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE orders SET status = 'deliver' WHERE order_id = :id AND status = 'out to deliver'";

    $sql = $con->prepare($query);
    $sql->bindParam(':id', $id);
    $sql->execute();
}
header('Location:../adminPages/manualOrder.php');
exit;
?>
