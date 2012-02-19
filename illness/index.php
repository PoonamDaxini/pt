<?php

session_start();
require_once '../config/config.php';
if ($_SESSION['logged_in']) {
    require_once CLASS_DIR . 'mysqlDatabaseClass.php';
    require_once CLASS_DIR . 'illnessClass.php';
    require_once CLASS_DIR . 'articleClass.php';

    function deleteIllness() {
        $objDatabase = new mysqlDatabaseClass();
        $objillness = new illnessClass();
        $objillness->deleteIllness($objDatabase, $_REQUEST['illid']);
        $message = "<div class='divClr'></div><div class='regularmsg'>Illness Category deleted successfully.</div>";
    }
    
    if ($_SESSION['userType'] == 'doctor') {

        if (isset($_REQUEST['illness'])) {
            $objDatabase = new mysqlDatabaseClass();
            $objIllness = new illnessClass();

            $objIllness->addIllness($objDatabase, $_REQUEST['illName']);
$message = "<div class='divClr'></div><div class='regularmsg'>New Illness Category added successfully.</div>";
        }

        if (isset($_REQUEST['updateill'])) {
            $objDatabase = new mysqlDatabaseClass();
            $objIllness = new illnessClass();

            $objIllness->updateIllness($objDatabase, $_REQUEST['illid'], $_REQUEST['illName']);
            $message = "<div class='divClr'></div><div class='regularmsg'>Illness Category updated successfully.</div>";
        }

        if (isset($_REQUEST['action'])) {
            switch ($_REQUEST['action']) {
                case 'editill':
                    include_once 'view/editIll_view.php';
                    break;
                case 'deleteill':
                    return deleteIllness();
                    break;
            }
        } else {
            include_once 'view/illness_view.php';
        }
    }

    

} else {
    header("Location:" . HTTP_HOST);
}
?>
