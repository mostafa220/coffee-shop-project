<?php 

function getUserData($table, $id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT * FROM $table WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}



function getTableData($table) {
    include 'db.php';
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function InsertToCat($table,$colum,$val) {
    include 'db.php';
    $stmt = $con->prepare("INSERT INTO  $table($colum) VALUES('$val')");
    return $stmt->execute();
}

function getAvailableProducts() {
    include 'db.php';
    $stmt = $con->prepare("SELECT * FROM products WHERE `status` = 'available'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getProductById($id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT * FROM products WHERE `product_id` =?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
// $products=getProductById(7);
// var_dump($products);

function getProductsPrices() {
    include 'db.php';
    $stmt = $con->prepare("SELECT price FROM products");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_DEFAULT);
}

function getProductPriceById($id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT price FROM products WHERE product_id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function myCart() {
    include 'db.php';
    $stmt = $con->prepare("SELECT * FROM products WHERE `status` = 'available'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function compareProducInCart($user_id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT us.product_id FROM `users_card` us  WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getTotalPrice($id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT SUM(o.totalPrice)  as totalPrice FROM
    orders  o INNER JOIN users u
    ON o.user_id=u.id 
    WHERE user_id=? AND o.status !='canseld'");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
}

function getUserWhoHasOrders() {
    include 'db.php';
    $stmt = $con->prepare("SELECT DISTINCT u.name ,u.id  FROM
    orders  o INNER JOIN users u
    ON o.user_id=u.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function userCart($userId) {
    include 'db.php';
    $stmt = $con->prepare("SELECT u.id , p.product_id ,p.name ,p.price,p.image FROM `users_card` us INNER JOIN users u 
    ON us.user_id=u.id   
    INNER JOIN products p ON us.product_id=p.product_id   WHERE u.id=?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateStatus($id){
    include 'db.php';
    $stmt = $con->prepare("UPDATE `orders` SET status='canseld'  WHERE order_id=?");
     return $stmt->execute([$id]);
     }
     function getOrderDataById($id) {
        include 'db.php';
        $stmt = $con->prepare("SELECT * FROM orders WHERE user_id=? AND status !='canseld'");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

function getOrderDetails($userId,$order_id) {
    include 'db.php';
    $stmt = $con->prepare("SELECT p.name ,p.image,po.quantity,po.price,o.order_id,o.totalPrice ,o.status,o.created_at FROM
    products_orders po INNER JOIN products p 
    ON po.product_id=p.product_id
    INNER JOIN orders o 
    ON po.order_id=o.order_id
    WHERE o.user_id=? AND o.order_id=? ");
    $stmt->execute([$userId,$order_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





function countItems($id){
    $cart=userCart($id);
    return count($cart);
}






