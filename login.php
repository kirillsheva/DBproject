<?php
require "db.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Вхід</title>
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
        Вітаємо, <?php echo $_SESSION['logged_user']->login;?>
        <button class="logout"><a style="color: #63AC06;" href="logout.php">Вийти</a></button></p>

    <?php else : ?><p class="sign"><a href="login.php">Вхід</a></p>
        <a class="reg" href="registration.php"><img class="regbtn" src="img/reg.svg"></a>
    <?php endif; ?>
	</header>


	<div class="mainwindow">
        <h1 class="log">Вхід</h1>
        <form method="post">
        <input name="username" class="logininput" type="text" placeholder="Логін">
		<input name="password" type="password" placeholder="Пароль" class="passwordinput">
        <button type="submit" name="do_login" class="loginbtn"><img src="img/login.svg"></button>
        </form>
    </div>

<?php
$data = $_POST;
if(isset($data['do_login']))
{
   $user = R::findOne('users','login = ?',array($data['username']));
   if($user){
       if(password_verify($data['password'],$user->password)){
$_SESSION['logged_user'] = $user;
           header('Location: index.php');

       }

   }
   else{
       echo '<p class="message" style="color:red;">Невірний логін або пароль</p>';
   }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/cart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>