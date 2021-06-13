
<?php
session_start();
ob_start();
require("config.php");
session_unset("SESS_ADMINLOGGEDIN");
session_destroy();
header("Location: " . $config_basedir);
?>
<script>
    window.location.replace("http://f70792o2.beget.tech/index.php");
</script>
