<?php
define("REAL_PATH", realpath(dirname(__FILE__)));
define("HTTP_HOST_NAME", $_SERVER['HTTP_HOST']);
define("HTTP_HOST_FOLDER", "http://".HTTP_HOST_NAME);
define("HTTP_HOST", HTTP_HOST_FOLDER."/PatientManagementSystem");
define("CLASS_DIR", REAL_PATH.'/../classes/');
define("JS_DIR", HTTP_HOST.'/JS/');
define("CSS_DIR", HTTP_HOST.'/css/');
define("IMG_DIR", HTTP_HOST.'/images/');
define("SALT","@#$%");
?>
