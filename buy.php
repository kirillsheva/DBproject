<?php

require "db.php";

if (isset($_POST['sum'])) {
    upd();
}

function upd(){
    $conn = mysqli_connect("localhost", "root", "", "project");
    $randomId = mt_rand(1, 3);
    $sum = $_POST['sum'];
    $login = $_SESSION['logged_user']->login;
    $NoOfOrder = mysqli_query ($conn,"INSERT INTO order_details (NoOfOrder)SELECT DISTINCT orderNum
FROM goods_order
WHERE goods_order.login= '{$_SESSION['logged_user']->login}'");
    $row = mysqli_fetch_assoc($NoOfOrder);
    $sql = "UPDATE order_details SET 
    Date = now(), sum = '$sum', courier_id = '$randomId', login = '$login' WHERE NoOfOrder IN (SELECT DISTINCT orderNum
FROM goods_order
WHERE goods_order.login= '$login')";
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    exit;
}