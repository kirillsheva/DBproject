<?php
require "db.php";

if (isset($_POST['id'])) {
    plus();
}

function plus()
{
    $connection = mysqli_connect("localhost", "root", "", "project");
    $id = $_POST['id'];
    $sql = "UPDATE goods_order SET quantity = quantity + 1,sumOfRow = quantity * price WHERE goods_order.login= '{$_SESSION['logged_user']->login}' AND '{$id}' = goods_order.id";
    mysqli_query($connection,$sql);
    mysqli_close($connection);
    exit;
}