<?php

require "db.php";

if (isset($_POST['address']) || isset($_POST['phone']) ) {
    upd();
}

function upd(){
    $conn = mysqli_connect("localhost", "root", "", "project");
    $address = $_POST['address'];
    $login = $_SESSION['logged_user']->login;
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET address = '$address',phone = '$phone' WHERE login= '$login')";
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    exit;
}