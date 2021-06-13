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
            <h1 class="mb-0 bread">Вход для админа</h1>
          </div>
        </div>
      </div>
    </div>

<?php
session_start();
require("config.php");
require("functions.php");
require("bar.php");
if(!isset($_SESSION['SESS_ADMINLOGGEDIN'])) {
header("Location: " . $config_basedir);
}


if(isset($_GET['func']) == TRUE) {

$funcsql = "UPDATE orders SET status = 10 WHERE id = " . $_GET['id'];
mysql_query($funcsql);
header("Location: " . $config_basedir . "adminorders.php");
}
else {

echo "<h1>Параметры Панели Администратора:</h1></br>";
echo "<td><h3><a href='daywisecahrt.php'>1. Показать ежедневные показатели продаж </a></h3></td></br>";
echo "<td><h3><a href='monthwise.php'>2. Показать Месячные Показатели Продаж </a></h3></td></br>";
echo "<td><h3><a href='addcategory.php'>3. Добавить новые категории </a></h3></td></br>";
echo "<td><h3><a href='addproduct.php'>4. Добавить новые товары </a></h3></td></br>";
echo "<h1>Выделяющиеся заказы:</h1></br>";

$orderssql = "SELECT * FROM orders WHERE status = 2";
$ordersres = mysql_query($orderssql);
$numrows = mysql_num_rows($ordersres);
if($numrows == 0)
{
echo "<h2><strong> На данный момент заказов нет </strong></h2>";
}
else
{
echo "<table cellspacing=10>";
while($row = mysql_fetch_assoc($ordersres))
{
echo "<tr>";
echo "<td>[<a href='adminorderdetails.php?id=" . $row['id']. "'>Посмотреть</a>]</td>";
echo "<td>". date("D jS F Y g.iA", strtotime($row['date'])). "</td>";
echo "<td>";
if($row['registered'] == 1)
{
echo "Зарегистрированный покупатель";
}
else
{
echo "Незарегистрированный покупатель";
}
echo "</td>";
echo "<td>₸;" . sprintf('%.2f',
$row['total']) . "</td>";
echo "<td>";
if($row['payment_type'] == 1)
{
echo "PayPal";
}
else
{
echo "Чек";
}
echo "</td>";
echo "<td><a href='adminorders.php?func=conf&id=" . $row['id']. "'>Подтвердить оплату</a></td>";
echo "</tr>";
}
echo "</table>";
}


}

?>
</div>
</div>
</div>
</div>

</section>


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
