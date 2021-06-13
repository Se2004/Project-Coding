<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta http-equiv="content-language" content="ru">
     	<section class="bg-white p-3 ">
			<div class="container">	
	

    	          <div class="col-md-12 heading-section text-center ftco-animate">
								<h1>Категории товаров</h1>
                  
     
<ul>
<?php
$site123 = "http://f70792o2.beget.tech/";

$catsql = "SELECT * FROM categories;";
$catres = mysql_query($catsql);
while($catrow = mysql_fetch_assoc($catres))
{
echo "<li><a href='" . $config_basedir. "products.php?id=" . $catrow['id'] . "'>". $catrow['name'] . "</a></li>";
}
?>
</ul>
 </div>
 </div>
 </div>
  </div>
    </section>