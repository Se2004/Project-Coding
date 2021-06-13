<!DOCTYPE html>
<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta http-equiv="content-language" content="ru">
  <head>
    <title>ForeverYoung_Kz</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+77478622865</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></div>
						    <span class="text">foreveryoung_kz</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center ">
					        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-map-marker"></span></div>
						    <span class="text">тд астана, 58 бутик, кокшетау</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">ForeverYoung_Kz</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Главная</a></li>
	          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Магазин</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="products.php">Товары</a>
                <a class="dropdown-item" href="product-single.html">О нас</a>
              </div>
            </li>
              <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Вход</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                   <a class="dropdown-item" href="login.php">Войти</a>
                <a class="dropdown-item" href="adminlogin.php">Вход для админа</a>
              </div>
	          <li class="nav-item"><a href="register.php" class="nav-link">Регистрация</a></li>
	       
            <li class="nav-item"><a href="contact.html" class="nav-link">Контактные Данные</a></li>
	          <li class="nav-item cta cta-colored"><a href="showcart.php" class="nav-link"><span class="icon-shopping_cart"></span>Корзина</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Forever</a></span> <span>Young</span></p>
            <h1 class="mb-0 bread">Оформить заказ</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart text-center">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
<?php
session_start();
require("config.php");
$statussql = "SELECT status FROM orders WHERE id = " .$_SESSION['SESS_ORDERNUM'];
$statusres = mysql_query($statussql);
$statusrow = mysql_fetch_assoc($statusres);
$status = $statusrow['status'];
if($status == 1) {
header("Location: " . $config_basedir . "checkout-pay.php");
}
if($status >= 2) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
if($_POST['addselecBox'] == 2)
{
if(empty($_POST['forenameBox']) ||
empty($_POST['surnameBox']) ||
empty($_POST['add1Box']) ||
empty($_POST['add2Box']) ||
empty($_POST['add3Box']) ||
empty($_POST['postcodeBox']) ||
empty($_POST['phoneBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . $basedir . "checkoutaddress.php?error=1");
exit;
}

$addsql = "INSERT INTO delivery_addresses(forename, surname, add1, add2, add3, postcode, phone, email)VALUES('" . strip_tags(addslashes( $_POST['forenameBox'])) . "', '" . strip_tags(addslashes( $_POST['surnameBox'])) . "', '" . strip_tags(addslashes( $_POST['add1Box'])) . "', '" . strip_tags(addslashes( $_POST['add2Box'])) . "', '" . strip_tags(addslashes( $_POST['add3Box'])) . "', '" . strip_tags(addslashes( $_POST['postcodeBox'])) . "', '" . strip_tags(addslashes(
$_POST['phoneBox'])) . "', '" . strip_tags(addslashes($_POST['emailBox'])) . "')";
mysql_query($addsql);
$setaddsql = "UPDATE orders SET delivery_add_id = " . mysql_insert_id() . ", status = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
else
{
$custsql = "UPDATE orders SET delivery_add_id = 0, status = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
mysql_query($custsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}
else
{
if(empty($_POST['forenameBox']) ||
empty($_POST['surnameBox']) ||
empty($_POST['add1Box']) ||
empty($_POST['add2Box']) ||
empty($_POST['add3Box']) ||
empty($_POST['postcodeBox']) ||
empty($_POST['phoneBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . "checkout-address.php?error=1");
exit;
}
$addsql = "INSERT INTO delivery_addresses(forename, surname, add1, add2, add3, postcode, phone, email) VALUES('" . $_POST['forenameBox'] . "', '" . $_POST['surnameBox'] . "', '" . $_POST['add1Box'] . "', '" . $_POST['add2Box'] . "', '" . $_POST['add3Box'] . "', '" . $_POST['postcodeBox'] . "', '" . $_POST['phoneBox'] . "', '" . $_POST['emailBox'] . "')";
mysql_query($addsql);
$setaddsql = "UPDATE orders SET delivery_add_id = " . mysql_insert_id() . ", status = 1 WHERE session = '" . session_id() . "'";
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}

else
{

require("header.php");
echo "<h1>Добавить адрес доставки</h1>";
if(isset($_GET['error']) == TRUE) {
echo "<strong>Пожалуйста заполните форму для оформления заказа</strong>";
}
echo "<form action='".$_SERVER['SCRIPT_NAME'] . "' method='POST'>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
?>
<input type="radio" name="addselecBox"
value="1" checked>Использовать адрес аккаунта</input><br>
<input type="radio" name="addselecBox"
value="2">Использовать адрес указанный ниже:</input>
<?php
}
?>
<table>
<tr>
<td>Имя</td>
<td><input type="text" name="forenameBox"></td>
</tr>
<tr>
<td>Фамилия</td>
<td><input type="text" name="surnameBox"></td>
</tr>
<tr>
<td>Ваш адрес</td>
<td><input type="text" name="add1Box"></td>
</tr>
<tr>
<td>Город</td>
<td><input type="text" name="add2Box"></td>
</tr>
<tr>
<td>Страна</td>
<td><input type="text" name="add3Box"></td>
</tr>
<tr>
<td>Почтовый индекс</td>
<td><input type="text" name="postcodeBox"></td>
</tr>
<tr>
<td>Номер телефона</td>
<td><input type="text" name="phoneBox"></td>
</tr>
<tr>
<td>Электронная почта</td>
<td><input type="text" name="emailBox"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Добавить информацию (одно нажатие)" class="btn btn-primary py-3 px-5"></td>
</tr>
</table>
</form>
<?php
}

?>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>