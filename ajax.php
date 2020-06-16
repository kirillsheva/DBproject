<?php


require "db.php";

if (isset($_POST['id'])) {
    $conn = mysqli_connect("localhost", "root", "", "project");
    echo "The add function is called.";

    $first = new ord();
    $first-> setVar(3);
    $id = $_POST['id'];

    $login = $_SESSION['logged_user']->login;
    $order =ord($login) +$first->var1;


    $quantity = 1;
    $price = $_POST['cost'];
    $sum = $price;
    $sql = "INSERT INTO  goods_order(id,login,quantity,sumOfRow,price,orderNum)
    VALUES ('$id','$login','$quantity','$sum','$price','$order')";


    if (mysqli_query($conn,$sql)) {
        echo "1";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    exit;
    }

function add()
{

}

