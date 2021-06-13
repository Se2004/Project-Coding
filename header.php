<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{
session_unset();
session_regenerate_id();
}
require("config.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">



<div id="main">
