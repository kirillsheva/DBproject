<?php
require "db.php";

if (isset($_POST['id'])) {
    delete();
}

function delete()
{
    $connection = mysqli_connect("localhost", "root", "", "project");
    $id = $_POST['id'];
    $sql = "DELETE FROM goods_order WHERE goods_order.login= '{$_SESSION['logged_user']->login}' AND '{$id}' = goods_order.id";
    mysqli_query($connection,$sql);

    if (mysqli_query($connection,$sql)) {
        echo "1";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
    mysqli_close($connection);
    header("bucket.php");
    exit;
}
