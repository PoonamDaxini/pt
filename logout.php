<?php
require_once dirname(__FILE__) . '/config/config.php';
session_start();
session_unset();
session_destroy();
header("Location:" . HTTP_HOST);
exit ();
?>
