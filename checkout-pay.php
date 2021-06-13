
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
					    <div class="col-md-5 pr-4 d-flex topper align-items-center">
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
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Forever</a></span> <span>Young</span></p>
            <h1 class="mb-0 bread">Произвести оплату</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">

<?php
session_start();
require("config.php");
require("functions.php");
if(isset($_POST['cashsubmit']))
{
$upsql = "UPDATE orders SET status = 2, payment_type = 3 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);
$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$itemsres = mysql_query($itemssql);
$row = mysql_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: " . $config_basedir);
}
else if(isset($_POST['paypalsubmit']))
{
$upsql = "UPDATE orders SET status = 2, payment_type = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);
$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$itemsres = mysql_query($itemssql);
$row = mysql_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=you%40youraddress.com&item_name=". urlencode($config_sitename)
. "+Order&item_number=PROD" . $row['id']."&amount=" . urlencode(sprintf('%.2f',$row['total'])) . "&no_note=1&currency_code=USD&lc=US&submit.x=41&submit.y=15");
}
else if(isset($_POST['chequesubmit']))
{
$upsql = "UPDATE orders SET status = 2,payment_type = 2 WHERE id = ". $_SESSION['SESS_ORDERNUM'];
$upres = mysql_query($upsql);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
require("header.php");
?>
<h1>Оплата чеком</h1>
Пожалуйста убедитесь в том, что вы сможете оплатить чеком
<strong><?php echo $config_sitename; ?></strong>.
<p>
Отправить чек:
<p>
<?php echo $config_sitename; ?><br>
Dilnaz <br>

<?php
}
else
{
require("header.php");
echo "<h1>Оплата</h1>";
showcart();
?>





<h2>Выберите метод оплаты</h2>
<form action='checkout-pay.php' method='POST'>
<table cellspacing=10>
<tr>
<td><h3>Оплата наличными</h3></td>

<td><input type="submit" name="cashsubmit" value="Оплата наличными" class="btn btn-primary py-3 px-5"></td>
</tr>
<tr>
<td><h3>PayPal</h3></td>

<td><input type="submit" name="paypalsubmit" value="Оплата с  PayPal" class="btn btn-primary py-3 px-5"></td>
</tr>
<tr>
<td><h3>Чек</h3></td>

<td><input type="submit" name="chequesubmit" value="Оплата чеком" class="btn btn-primary py-3 px-5"></td>
</tr>
</table>
</form>
<?php
}
require("footer.php");
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