
<?php
require "db.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Телефони</title>
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
<h1 class="phonec">Телефони</h1>
<div class="mini-cart"></div>
<div class="catalog">

    <?php
    $connection = mysqli_connect("localhost", "root", "", "project");
    $sql = "SELECT * FROM goods LIMIT 7";
    $result = mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '
<div class="phcard">
  <p class="pprodname">' . $row["name"] . '</p>
          <img class = "redmi" src="img/' . $row["img"] . '" alt="">
            <p class="pprice">' . $row["cost"] . 'грн.</p>
            <a class="button" cost="' . $row["cost"] . '" data-id="' . $row["id"] . '" href="#" ><img src="img/buybtn.svg"></a>
            </div>
';


        }
    }

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>

            $('.button').click(function(){
                var id = $(this).attr('data-id');
                var cost = $(this).attr('cost');
                var ajaxurl = 'ajax.php',
                    data =  {'id': id,
                        'cost': cost
                };
                $.post(ajaxurl, data, function (response) {
                    alert("action performed successfully");
                    console.log(id);
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