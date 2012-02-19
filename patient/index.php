<?php

session_start();
require_once '../config/config.php';
if ($_SESSION['logged_in']) {
    require_once CLASS_DIR . 'mysqlDatabaseClass.php';
    require_once CLASS_DIR . 'userClass.php';
    require_once CLASS_DIR . 'patientClass.php';

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'query':
                include_once 'view/patientQuery.php';
                break;
            case 'addForm':
                include_once 'view/queryForm.php';
                break;
            case 'fireQuery';
                $objdb = new mysqlDatabaseClass();
                $objpt = new patientClass();
                if (isset($_REQUEST['doctor'])) {

                     $objpt->patientQuery($objdb, $_SESSION['uid'], $_REQUEST['doctor'], $_REQUEST['query']);
					 $message = "<div class='regularmsg'>Wait for reply from Doctor.";
                }
//                include_once 'view/queryForm.php';
                break;
        }
    } else {
        include_once 'view/patientPage.php';
    }

    function fireQuery() {
        $objdb = new mysqlDatabaseClass();
        $objpt = new patientClass();
        if (isset($_REQUEST['doctor'])) {

            $objpt->patientQuery($objdb, $_SESSION['uid'], $_REQUEST['doctor'], $_REQUEST['query']);
            echo "Wait for reply from Doctor";
        }
    }

} else {
    header("Location:" . HTTP_HOST);
}
?>