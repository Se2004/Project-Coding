
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
    $loginres1 = mysqli_query($loginsql1);
    $row = mysqli_fetch_assoc($loginres1);
    $c =$row['customer_id']+1;
    $sql = "INSERT INTO logins(username,password,customer_id) VALUES('".$_POST['userBox']."','".sha1($_POST['passBox'])."','$c')";
    $res = mysqli_query($sql);

    $cid = mysqli_insert_id();

    $loginsql = "SELECT * FROM logins WHERE id='$cid'";
    $loginres = mysqli_query($loginsql);
    $numrows = mysqli_num_rows($loginres);
    if($numrows == 1)
    {
        $loginrow = mysqli_fetch_assoc($loginres);

        $_SESSION['SESS_LOGGEDIN'] = 1;
        $_SESSION['SESS_USERNAME'] = $loginrow['username'];
        $_SESSION['SESS_USERID'] = $loginrow['id'];
        $ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
        $orderres = mysqli_query($ordersql);
        $orderrow = mysqli_fetch_assoc($orderres);
        $_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
        $er = 2;
        header("Location: " . $config_basedir);
    }
    else
    {
        header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
    }
}

?>        
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
    


           
            <form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST"  class="bg-white p-5 contact-form">
              <div class="form-group" >
             <h5><label  class="text-black" >Имя пользователя<span class="text-danger">*</span></label></h5>
                <input type="textbox" name="userBox" class="form-control" placeholder="введите имя пользователя">
              </div>
              <div class="form-group">
                <h5><label  class="text-black">Пароль<span class="text-danger">*</span></label></h5>
                <input type="password" name="passBox" class="form-control" placeholder="введите пароль">
              </div>
            
              <div class="form-group">
                  
                <input type="submit" name="submit" value="зарегистрироваться", class="btn btn-primary py-3 px-5">
               <?php
               if(isset($_GET['error'])) {
               echo "<strong> Регистрация прошла успешно </strong>";
               } else if($er == '2'){
               echo "<strong>Возникла ошибка при регистрации</strong>";
               }
               ?>
              
              </div>
          
              
            </form>
        
          </div>


 
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