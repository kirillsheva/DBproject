<?php
require "db.php"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Project</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $('.logout').click(function() {
    $.ajax({
    type: 'GET',
    url: 'logout.php',
    data: {
    id: '123'
    },
    datatype: 'html',
    cache: 'false',
    success: function(response) {

    },
    error: function() {

    }
    });
    });
    </script>
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
	<div>
		<ul class="navig">
		<li><a href="telephones.php" class="grill">Телефони</a> </li>
			<li><a href="laptops.php" class="grill1">Ноутбуки</a> </li>
			<li><a href="#" class="grill2">Електричні чайники</a> </li>
			<li><a href="#" class="grill3">Телевізори</a> </li>
			<li><a href="#" class="grill4">Комплектуючі та пк</a> </li>
			<li><a href="#" class="grill5">Електрогрилі</a> </li>
		</ul>		
	</div>

<div class="catalog">
	<div class="tel"><img class="phone" src="img/smp.svg"><a href="telephones.php"><p class="phonetxt">Телефони</p></a>	</div>
	<div class="lap"><img class="laptop" src="img/lap.svg"><a href="laptops.php"><p class="laptxt">Ноутбуки</p></a></div>
	<div class="chainik"><img class="chainikph" src="img/chainik.svg"><a href="#"><p class="chatxt">Електричні чайники</p></a></div>
	<div class="pc"><img class="pcph" src="img/pc.svg"><a href="#"><p class="pcxt">Комплектуючі та пк</p></a></div>
	<div class="televizor"><img class="tv" src="img/tv.svg"><a href="#"><p class="tvxt">Телевізори</p></a></div>

</div>
<h1>Популярні товари</h1>
<div class="popular">
	<div class="card1"><img class="redmi" src="img/image 1.svg"><p class="prodname">Xiaomi Redmi Note 8 4/64GB </p><p class="price">4699 грн</p></div>
	<div class="card2"><img class="redmi" src="img/samsung.jpg"><p class="prodname">Apple Iphone 11</p><p class="price">7999 грн</p></div>
	<div class="card3"><img class="redmi" src="img/xiaominote.jpg"><p class="prodname">Xiaomi Redmi Note 8T 4/64GB

        </p><p class="price">4605 грн</p></div>
	<div class="card4"><img class="redmi" src="img/huaweip40.jpg"><p class="prodname">Huawei P40 lite E 4/64Gb</p><p class="price">4699 грн</p></div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>