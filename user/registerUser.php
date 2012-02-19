<?php

ini_set("display_errors", "on");

require_once '../config/config.php';

require_once dirname(__FILE__) . '/../classes/mysqlDatabaseClass.php';
require_once dirname(__FILE__) . '/../classes/userClass.php';
if (isset($_REQUEST['register'])) {
    $objDatabase = new mysqlDatabaseClass();
    $objUserClass = new userClass();

    $arrPatientDetails['username']       = $_REQUEST['username'];
    $arrPatientDetails['email']          = $_REQUEST['email'];
    $arrPatientDetails['birth_date']     = $_REQUEST['birthdate'];
    $arrPatientDetails['alt_email']      = $_REQUEST['altemail'];
    $arrPatientDetails['marital_status'] = $_REQUEST['maritalstate'];
    $arrPatientDetails['gender']         = $_REQUEST['gender'];
    $arrPatientDetails['phone_no']       = $_REQUEST['phone_no'];
    $arrPatientDetails['password']       = $_REQUEST['password'];

    $objUserClass->patientRegister($objDatabase, $arrPatientDetails);
    
    $message = $arrPatientDetails['username'] . " recently registered in site";
    mail('admin@doctors.com', "new registration", $message , $arrPatientDetails['email']);
 		$message = "<div class='regularmsg'>Registration Submitted Successfully. Please wait For doctors confirmation";
}
include_once 'view/registerUser_view.php';
?>

