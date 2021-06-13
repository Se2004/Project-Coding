<?php
session_start();
$er = 0;
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
$loginsql1 = "SELECT * FROM logins order by customer_id desc";
$loginres1 = mysql_query($loginsql1);
$row = mysql_fetch_assoc($loginres1);
$c =$row['customer_id']+1;
$sql = "INSERT INTO logins(username,password,customer_id) VALUES('".$_POST['userBox']."','".sha1($_POST['passBox'])."','$c')";
$res = mysql_query($sql);

$cid = mysql_insert_id();

$loginsql = "SELECT * FROM logins WHERE id='$c_id'";
$loginres = mysql_query($loginsql);
$numrows = mysql_num_rows($loginres);
if($numrows == 1)
{
$loginrow = mysql_fetch_assoc($loginres);

$_SESSION['SESS_LOGGEDIN'] = 1;
$_SESSION['SESS_USERNAME'] = $loginrow['username'];
$_SESSION['SESS_USERID'] = $loginrow['id'];
$ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
$orderres = mysql_query($ordersql);
$orderrow = mysql_fetch_assoc($orderres);
$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
$er = 2;
header("Location: " . $config_basedir);
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
}

else
{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ForeverYoung_Kz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
            <h1 class="mb-0 bread">Регистрация</h1>
          </div>
        </div>
      </div>
    </div>

	<section class="bg-white p-5 contact-form">
			<div class="container">	
    
<p>


           
            <form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST"  class="bg-white p-5 contact-form">
              <div class="form-group" >
             <h5><label for="c_fname" class="text-black" >Имя пользователя<span class="text-danger">*</span></label></h5>
                <input type="textbox" name="userBox" class="form-control" placeholder="введите имя пользователя">
              </div>
              <div class="form-group">
                <h5><label for="c_fname" class="text-black">Пароль<span class="text-danger">*</span></label></h5>
                <input type="password" name="passBox" class="form-control" placeholder="введите пароль">
              </div>
            
              <div class="form-group">
                <input type="submit" name="submit" value="зарегистрироваться" class="btn btn-primary py-3 px-5">
               <?php
               if(isset($_GET['error'])) {
               echo "<strong>Registered Successfully...Please login now </strong>";
               } else if($er == '2'){
               echo "<strong> Registered Successfully</strong>";
               }
               ?>
              </div>
              <br>

              <br>
              <p class="double"><div class="form-group">
              <h5>Если у вас уже есть аккаунт</h5>
               <p class="nextpage"><a href="login.php" class="btn btn-primary py-3 px-5">войдите</a></p>
              </div>
              </p>
              
            </form>
        
          </div>

<?php
}

?>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/first.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/first.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/second.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/second.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/third.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/third.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/fourth.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/fourth.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/fifth.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/fifth.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/sixth.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/sixth.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
  <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
          
	  <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Наши социальные сети</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.instagram.com/foreveryoung__kz/?hl=ru"><span class="icon-instagram"></span></a></li>
              <li class="ftco-animate"><a href="https://api.whatsapp.com/send?phone=821075069926&text=&source=&data="><span class="icon-whatsapp"></span></a></li>
              </ul>
            </div>
          </div>
        
      
	   
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Наш адрес</h2>
	                <div class="d-flex">
	                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                    <li><span class="icon icon-map-marker"></span><span class="text"> "ТД Астана" 58 бутик, ул.Гагарина 60</span></li>
	                <li><a href="#" class="py-2 d-block">Кокшетау, Казахстан</a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

         
          </div>
        </div>
      </div>
    </footer>
  

  <!-- loader -->
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
