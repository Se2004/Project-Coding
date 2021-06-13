<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta http-equiv="content-language" content="ru">
<?php
session_start();
ob_start();
require("config.php");
unset($_SESSION['SESS_LOGGEDIN']);
unset($_SESSION['SESS_USERNAME']);
unset($_SESSION['SESS_USERID']);
session_destroy();
header("Location: " . $config_basedir);
?>
<script>
    window.location.replace("http://f70792o2.beget.tech/index.php");
</script>
