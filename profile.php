<?php
require "db.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Профіль</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
<div class="mainwindow">
<form method="post">
    <p class="regmain">Змінити дані</p>
     <input name="address" class="logininput" placeholder="Адреса" type="text" id="gaddress">
     <input name="phone" class="passwordinput" placeholder="Телефон"  pattern="^\+380\d{3}\d{2}\d{2}\d{2}$"  type="text" id="gphone">
    <button name="doupdate" type="submit" class="add-to-db">Оновити</button>
</form>
</div>
<?php
$data = $_POST;
if(isset($data['doupdate'])){
    $conn = mysqli_connect("localhost", "root", "", "project");
    $id = mysqli_query ($conn,"SELECT id FROM users
WHERE login= '{$_SESSION['logged_user']->login}'");
    $row = mysqli_fetch_assoc($id);
    if(empty($data['address'])){
        $user = R::load('users', $row['id']);
        $user->phone = $data['phone'];
        R::store($user);
    } if(empty($data['phone'])){
        $user = R::load('users', $row['id']);
        $user->address = $data['address'];
        R::store($user);
    }
    else{
        $user = R::load('users', $row['id']);
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        R::store($user);
    }
}
?>

<h2 class="hist">Історія замовлень</h2>
<div class="orders">


    <?php
    $connection = mysqli_connect("localhost", "root", "", "project");
    $login = $_SESSION['logged_user']->login;
    $sql = "SELECT * FROM order_details,courier WHERE login = '$login' AND courier.courier_id = order_details.courier_id ";
    $result = mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo ' <table border="1" width="100%" cellpadding="5">
   <tr>
    <th style="width: 25%">Номер замовлення</th>
    <th  style="width: 25%">Дата замовлення</th>
    <th  style="width: 25%">Сума</th>
    <th  style="width: 25%">Прізвище курьєра</th>
   </tr>
   <tr>
    <td  style="width: 25%">' . $row["NoOfOrder"] . '</td>
    <td  style="width: 25%">'.$row['Date'].'</td>
     <td  style="width: 25%">' . $row["sum"] . 'грн.</td>
    <td  style="width: 25%">'.$row["surname"].'</td>
  </tr>
 </table>

      
';


        }
    }

    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>