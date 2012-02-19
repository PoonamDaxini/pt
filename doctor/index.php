<?php

require_once '../config/config.php';

session_start();
if ($_SESSION['logged_in']) {

    require_once CLASS_DIR . 'mysqlDatabaseClass.php';
    require_once CLASS_DIR . 'userClass.php';
    require_once CLASS_DIR . 'doctorClass.php';
    require_once CLASS_DIR . 'illnessClass.php';
    require_once CLASS_DIR . 'articleClass.php';
    require_once CLASS_DIR . 'patientClass.php';

    if (isset($_REQUEST['register'])) {
        $objDatabase = new mysqlDatabaseClass();
        $objUserClass = new userClass();

        $arrPatientDetails['username'] = $_REQUEST['username'];
        $arrPatientDetails['email'] = $_REQUEST['email'];
        $arrPatientDetails['birth_date'] = $_REQUEST['birthdate'];
        $arrPatientDetails['alt_email'] = $_REQUEST['altemail'];
        $arrPatientDetails['marital_status'] = $_REQUEST['maritalstate'];
        $arrPatientDetails['gender'] = $_REQUEST['gender'];
        $arrPatientDetails['phone_no'] = $_REQUEST['phone_no'];
        $arrPatientDetails['password'] = $_REQUEST['password'];
        $arrPatientDetails['userType'] = "doctor";

        $objUserClass->patientRegister($objDatabase, $arrPatientDetails);

        $message = $arrPatientDetails['username'] . " recently registered in site";
        mail('admin@doctors.com', "new registration", $message, $arrPatientDetails['email']);
        $message = "<div class='regularmsg'>Doctor Added Successfully.";
    }

    function particularReply() {
        if (isset($_REQUEST['reply'])) {
            $objDatabase = new mysqlDatabaseClass();
            $objDoctorClass = new doctorClass();
            $objDoctorClass->particularReply($objDatabase, $_REQUEST['reply'], $_REQUEST['qid']);
            $message = "<div class='regularmsg'>Query Replied Successfully.";
//            header("location:".HTTP_HOST."/doctor/?action=replyQuery",true,303);
        }
    }

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'addUser':
                include_once 'view/registerDoctor_view.php';
                break;
            case 'conformPatient':
                include_once 'view/conformPatient_view.php';
                break;
            case 'replyQuery':
                include_once 'view/replyQuery_view.php';
                break;
            case 'reply':
                include_once 'view/reply_view.php';
                break;
            case 'particularReply';
                return particularReply();
                break;
            case 'updateConformation':
                $objDatabase = new mysqlDatabaseClass();
                $objDoctorClass = new doctorClass();
                $objDoctorClass->updateConformation($objDatabase, $_REQUEST['id']);
                $message = "<div class='regularmsg'>Patient Confirmed Successfully.";
                include_once 'view/doctorPage.php';
                break;
        }
    } else {
        include_once 'view/doctorPage.php';
    }
} else {
    header("Location:" . HTTP_HOST);
}
?>
