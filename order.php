<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Замовлення</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>

<header>
    <div class="rect1">
        <ul>
            <li class="payment"><a href="#">Оплата</a></li>
            <li class="contacts"><a href="#">Контакти</a></li>
            <li class="delivery"><a href="#">Доставка</a></li>
        </ul>
        <a href="index.php"> <img class="mongo" src="img/logo.png"></a>

        <div class="btn-group products">
            <button type="button" class="dropbtn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" >
                Усі товари
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="telephones.php">Телефони</a>
                <a class="dropdown-item" href="#">Ноутбуки</a>
                <a class="dropdown-item" href="#">Телевізори</a>
                <a class="dropdown-item" href="#">Чайники</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Комплектуючі та пк</a>
            </div>
        </div>
        <div class="srch">

            <input type="text" placeholder="Знайти товар" class="search-query offset1" name="search"><a class="search-btn" href="#"><i class="fas fa-search"></i></a>
            </form>
        </div>
    </div>
    <a href="bucket.php"><img class="bucket" src="img/bucket.svg"></a>
    <p class="sign"><?php if(isset($_SESSION['logged_user'])) : ?>
        Вітаємо,<a href="profile.php"><?php echo $_SESSION['logged_user']->login;?></a>
        <a style="color: #63AC06;" href="logout.php">Вийти</a></p>

    <?php else : ?><p class="sign"><a href="login.php">Вхід</a></p>
        <a class="reg" href="registration.php"><img class="regbtn" src="img/reg.svg"></a>
    <?php endif; ?>
</header>


<div class="mainwindow">
    <h4 class="log" style="color: #63AC06">Сплачено</h4>

    <p class="ordernum">Замовлення №</p><?php    $connection = mysqli_connect("localhost", "root", "", "project");
    $login = $_SESSION['logged_user']->login;
    $sql = "SELECT NoOfOrder FROM order_details,goods_order WHERE order_details.NoOfOrder = goods_order.orderNum AND order_details.login ='$login' ";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    echo '<p class="order">'.$row['NoOfOrder'].'</p>'; ?>
    <p class="courier">Курьєр</p><?php
        $connection = mysqli_connect("localhost", "root", "", "project");
        $login = $_SESSION['logged_user']->login;
        $sql = "SELECT surname,phonenumber FROM courier,order_details WHERE courier.courier_id = order_details.courier_id AND order_details.login ='$login' ";
        $result = mysqli_query($connection,$sql);
    $delete = "DELETE FROM goods_order WHERE goods_order.login= '{$_SESSION['logged_user']->login}' ";
    mysqli_query($connection,$delete);
        $row = mysqli_fetch_array($result);
        echo '<p class="courierinfo">'.$row['surname'].'</p>';
    echo '<p class="courierphone">'.$row['phonenumber'].'</p>';
        ?>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/cart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>