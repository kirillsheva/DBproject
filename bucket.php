<?php
require "db.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Кошик</title>
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
    <a class="dropdown-item" href="laptops.php">Ноутбуки</a>
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




<h1 class="phonec">Кошик</h1>

<div class="bucketlist">
    <?php

    $connection = mysqli_connect("localhost", "root", "", "project");
    $sql = "SELECT * FROM goods,goods_order WHERE goods_order.login= '{$_SESSION['logged_user']->login}' AND goods.id = goods_order.id";
    $result = mysqli_query($connection,$sql);
    $sum = 0;
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {

          $sum = $sum + $row["sumOfRow"];
          $row["sumOfRow"] = $row["quantity"] * $row['price'];

          echo '<div class="product">
<button name="delete" data-id="' . $row["id"] . '" class="del-goods">x</button>
<img class="productimg" src="img/' . $row["img"] . '">
<div class="addelem"> <button class="minus" data-id="' . $row["id"] . '" ><i class="fas fa-minus"></i></button><p class="value">' . $row["quantity"] . '</p> <button class="plus" data-id="' . $row["id"] . '"><i class="fas fa-plus"></i></button></div>
<p class="productname">' . $row["name"] . '</p>
<p class="productprice">' . $row["sumOfRow"] . '</p>
</div>                   
';
          echo '<div class="sum"><p class="sumtitle">Сума:</p><p class="totalvalue">' . $sum . '</p><button sum="'.$sum.'" class="bucketbtn"><img src="img/buy.svg"></button></div>';
      }

  }

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>

        $('.del-goods').click(function(){
            var id = $(this).attr('data-id');
            var ajaxurl = 'delete.php',
                data =  {'id': id

                };
            $.post(ajaxurl, data, function (response) {
                alert("action performed successfully");
                document.location.reload(true);
            });
        });
        $('.plus').click(function(){
            var id = $(this).attr('data-id');
            var ajaxurl = 'plus.php',
                data =  {'id': id
                };
            $.post(ajaxurl, data, function (response) {
                alert("action performed successfully");
                document.location.reload(true);
            });
        });
        $('.minus').click(function(){
            var id = $(this).attr('data-id');
            var ajaxurl = 'minus.php',
                data =  {'id': id

                };
            $.post(ajaxurl, data, function (response) {
                alert("action performed successfully");
                document.location.reload(true);
            });
        });

        $('.bucketbtn').click(function(){
            var sum = $(this).attr('sum');
         //   var id = $(this).attr('data-id');
            var ajaxurl = 'buy.php',
                data =  {'sum': sum

                };
            $.post(ajaxurl, data, function (response) {
                alert("action performed successfully");
                document.location.replace("order.php");
            });
        });
    </script>
</div>
<footer class="foot">
    <ul id="footer">
        <li class="cont">Контакти</li>
        <li class="abus">Про нас</li>
        <li class="del">Доставка</li>
        <li class="opl">Оплата</li>
        <li class="gar">Гарантія</li>
    </ul>
    <p class="num">+380992270890</p><p class="numtxt">з 9 до 21 без вихідних!</p></footer>


<!-- JS, Popper.js, and jQuery -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>