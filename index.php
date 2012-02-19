<?php
error_reporting(0);
//ini_set("display_errors", "on");
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once dirname(__FILE__) . '/config/config.php';
require_once CLASS_DIR . 'mysqlDatabaseClass.php';
require_once CLASS_DIR . 'userClass.php';
session_start();
$cookie_time = (120);

if (isset($_REQUEST['login'])) {
    $post_autologin = $_REQUEST['autologin'];
    $error = '';
    if (isset($_REQUEST['username']) && isset($_REQUEST['password']) && !empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
        $objDatabase = new mysqlDatabaseClass();
        $objUserClass = new userClass();

        $dbvalue = $objUserClass->getUserData($objDatabase, $_REQUEST['username']);
        $encodedPassword = md5($_REQUEST['password'] . SALT);
        if (isset($dbvalue[0])) {
            if ($encodedPassword == $dbvalue[0]['password']) {
                if ($dbvalue[0]['userType'] == 'patient') {
                    if ($dbvalue[0]['conformation']) {
                        if ($post_autologin == 1) {
                            setcookie('usr', $_REQUEST['username'], time() + $cookie_time);
                            setcookie('hash', base64_encode($_REQUEST['password']), time() + $cookie_time);
                        }
                        $_SESSION = array("uid" => $dbvalue[0]['id'], "user" => $dbvalue[0]['username'], "userType" => "patient", "logged_in" => "true");
                        header("Location:" . HTTP_HOST . "/patient/");

                        exit;
                    } else {
                        $error = "Doctor has not conformed the user";
                        header("Location:" . HTTP_HOST . "?er=" . $error);
//                        session_start();
//                        $_SESSION = array("uid" => $dbvalue[0]['id'], "user" => $dbvalue[0]['username'], "userType" => "doctor", "logged_in" => "true");
//                        exit;
                    }
                } else {
                     session_start();
                     $_SESSION = array("uid" => $dbvalue[0]['id'], "user" => $dbvalue[0]['username'], "userType" => "doctor", "logged_in" => "true");
                    header("Location:" . HTTP_HOST . "/doctor/");
                    exit;
                }
            } else {
                $error = "Incorrect Password";
                header("Location:" . HTTP_HOST . "?er=" . $error);
                exit;
            }
        } else {
            $error = "User Not registered";
            header("Location:" . HTTP_HOST . "?er=" . $error);
            exit;
        }
    }
} else {
    include_once 'login.php';
}
?>