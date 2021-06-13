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
                  <?php
            if(isset($_SESSION['SESS_ADMINLOGGEDIN'])) {
                echo '<li class="navi-item"><a class="nav-link" href="adminlogout.php">Выйти</a></li>';
            }
            elseif(isset($_SESSION['SESS_LOGGEDIN'])) {
                echo '<li class="navi-item"><a class="nav-link" href="logout.php">Выйти</a></li>';
                }
            else {
            ?>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Вход</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                   <a class="dropdown-item" href="login.php">Войти</a>
                <a class="dropdown-item" href="adminlogin.php">Вход для админа</a>
              </div>
	          <li class="nav-item"><a href="register.php" class="nav-link">Регистрация</a></li>
	           <?php
            }
            ?>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php"> Forever</a></span> <span>Young</span></p>
            <h1 class="mb-0 bread">Товары</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-white">
    
   
    	<?php
require("config.php");
  	require("bar.php");
session_start();
require("functions.php");
require("header.php");
showcart();
if(isset($_SESSION['SESS_ORDERNUM'])) {
	$sess_ordernum=$_SESSION['SESS_ORDERNUM'];
$sql = "SELECT * FROM orderitems WHERE order_id =$sess_ordernum";
$result = mysqli_query($sql) or die(mysqli_error());
$numrows = mysqli_num_rows($result);
if($numrows >= 1) {
echo "<h2><a href='checkout-address.php'>Перейти к оформлению заказа</a></h2>";
}
}
?>

<?Php
$prodcatsql1 = "SELECT * FROM orders WHERE customer_id = " . @$_SESSION['SESS_USERID'] . ";";
$prodcatres1 = mysqli_query($prodcatsql1);
$numrows1 = mysqli_num_rows($prodcatres1);
if($numrows1 == 0)
{

}
else
{
	?>
	
	<h1> Рекомендуемые товары </h1> 
	<?Php
	require("config.php");
	$sql1 = "SELECT * FROM orders WHERE customer_id = " . @$_SESSION['SESS_USERID'] . ";";
$res1 = mysqli_query($sql1);
while($rows1 = mysqli_fetch_array($res1)) {
$sql2 = "SELECT DISTINCT product_id FROM orderitems WHERE order_id =".$rows1['id'].";";
$res2 = mysqli_query($sql2);
$rows12 = mysqli_fetch_array($res2);
$abc[]= $rows12['product_id'];
$result1 = implode(',',array_unique(explode(',', $rows12['product_id'])));;
}


	$nums_list2 = explode(',',$result1);
	foreach ($nums_list2 as $value)
	{
	$prodcatsql2 = "SELECT * FROM products WHERE id = " . $value . ";";
$prodcatres2 = mysql_query($prodcatsql2);
echo "<table cellpadding='10'>";
while($prodrow = mysql_fetch_assoc($prodcatres2))
{
		echo "<form action='' method='POST'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['description'];
echo "<p><strong>Цена: ₸ ". sprintf('%.2f', $prodrow['price']) . "</strong>";

echo "<td><input type='hidden' name='id' value='" . $prodrow['id'] . "'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Выберите количество <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><input type='submit' name='submit' value='В корзину'  ></td>";
echo "</td>";
echo "</tr>";
echo "</form>";
}
}
echo "</table>";
}
$prodcatsql = "SELECT * FROM products WHERE cat_id = " . $_GET['id'] . ";";
$prodcatres = mysqli_query($prodcatsql);
$numrows = mysqli_num_rows($prodcatres);
if($numrows == 0)
{

}
else
{
?>

    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">

	<h1> Товары </h1> 
<?Php
echo "<table cellpadding='10'>";
while($prodrow = mysql_fetch_assoc($prodcatres))
{
		echo "<form action='' method='POST'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['description'];
echo "<p><strong>Цена: ₸ ". sprintf('%.2f', $prodrow['price']) . "</strong>";

echo "<td><input type='hidden' name='id' value='" . $prodrow['id'] . "'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Выберите количество <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><input type='submit' name='submit' value='В корзину'></td>";
echo "</td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";

}
if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_ORDERNUM']))
{
	$id=$_POST['id'];
 $itemsql = "INSERT INTO orderitems(order_id,product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$sql = "INSERT INTO orders(customer_id,registered, date) VALUES(". $_SESSION['SESS_USERID'] . ", 1, NOW())";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_ORDERNUM'] = mysql_insert_id();
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM']. ", " . $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
 $sql = "INSERT INTO orders(registered,date, session) VALUES(". "0, NOW(), '" . session_id() . "')";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_ORDERNUM'] = mysql_insert_id();
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", " . $id . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
}
$totalprice = $prodrow['price'] * $_POST['amountBox'] ;
$updsql = "UPDATE orders SET total = total + ". $totalprice . " WHERE id = ". $_SESSION['SESS_ORDERNUM'] . ";";
mysql_query($updsql) or die(mysql_error());
?>
<script>

</script>
</div>
</div>
        </div>
        </div>
        </div>
<?php
		?>
                <script>
				window.location.href='products.php?id=<?Php echo $_GET['id']; ?>';
				</script>
                <?php
exit;

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
