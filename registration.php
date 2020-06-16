
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
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
    <p class="sign"><a href="login.php">Вхід</a></p>
    <a class="reg" href="#"><img class="regbtn" src="img/reg.svg"></a>
</header>

<div class="mainwindowreg">
    <form action="registration.php" method="POST">
    <p class="regmain">Реєстрація</p>

        <input class="logininput" name="username" type="text" placeholder="Логін">
    <input type="password" name="password" placeholder="Пароль" class="passwordinput">
    <input type="tel" name="phone" placeholder="Телефон"  pattern="^\+380\d{3}\d{2}\d{2}\d{2}$" class="phoneinput">
    <input type="text" name="adress" placeholder="Адреса" class="adressinput">
    <button class="loginbtn" name="do_signup" type="submit"><img src="img/login.svg"></button>
    </form>
</div>
<?php
require "db.php";
$data = $_POST;
if(isset($data['do_signup']))
{
    $errors = array();
    if(trim($data['username']) ==''){
        $errors[] = 'Введіть логін';
    }
    if(trim($data['password']) ==''){
        $errors[] = 'Введіть пароль';
    }
    if(trim($data['adress']) ==''){
        $errors[] = 'Введіть адресу';
    }
    if(trim($data['phone']) ==''){
        $errors[] = 'Введіть номер телефону';
    }

    if(R::count('users',"login = ?",array($data['username']))>0){
        $errors[] = 'Користувач з таким логіном існує';
    }

    if(empty($errors)){
        $user = R::dispense('users');
        $user->login = $data['username'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        $user->address = $data['adress'];
        $user->phone = $data['phone'];
        R::store($user);
    }else{
        echo '<div class="message" style="color:red;">'.array_shift($errors).'</div>';
    }
}
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/cart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>