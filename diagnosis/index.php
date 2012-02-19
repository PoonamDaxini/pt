<?php

session_start();
require_once '../config/config.php';
if ($_SESSION['logged_in']) {
    require_once CLASS_DIR . 'mysqlDatabaseClass.php';
    require_once CLASS_DIR . 'illnessClass.php';
    require_once CLASS_DIR . 'userClass.php';
    require_once CLASS_DIR . 'patientHistoryClass.php';

    if ($_SESSION['userType'] == 'doctor') {
        if (isset($_REQUEST['search'])) {
            $arrName['name'] = $_REQUEST['username'] ? $_REQUEST['username'] : '';
            $arrName['email'] = $_REQUEST['email'] ? $_REQUEST['email'] : '';
            $arrName['birthdate'] = $_REQUEST['birthdate'] ? $_REQUEST['birthdate'] : '';
            $arrName['gender'] = $_REQUEST['gender'] ? $_REQUEST['gender'] : '';

            $objDatabase = new mysqlDatabaseClass();
            $objUser = new userClass();

            $patientDetails = $objUser->getPatient($objDatabase, $arrName);
        }
        if (isset($_REQUEST['record'])) {
            if (isset($_REQUEST['symtoms']) && !empty($_REQUEST['symtoms']) && isset($_REQUEST['recommendation']) && !empty($_REQUEST['recommendation'])) {
                $arrRecordDetail['date'] = $_REQUEST['date'] ? str_replace("/", "-", $_REQUEST['date']) : '';
                $arrRecordDetail['symtoms'] = $_REQUEST['symtoms'] ? trim($_REQUEST['symtoms']) : '';
                $arrRecordDetail['details'] = $_REQUEST['details'] ? trim($_REQUEST['details']) : '';
                $arrRecordDetail['recommendation'] = $_REQUEST['recommendation'] ? trim($_REQUEST['recommendation']) : '';
                $arrRecordDetail['followup'] = $_REQUEST['followup'] ? str_replace("/", "-", $_REQUEST['followup']) : '';
                $arrRecordDetail['did'] = $_SESSION['uid'];
                $arrRecordDetail['pid'] = $_REQUEST['uid'];

                $objDatabase = new mysqlDatabaseClass();
                $objPatientHistory = new patientHistoryClass();
                $objPatientHistory->addRecord($objDatabase, $arrRecordDetail);
				$message = "<div class='divClr'></div><div class='regularmsg'>Medical Record added Successfully.</div>";            
            } else {
                echo "Required fields were not filled";
            }
        }
        if (isset($_REQUEST['update'])) {
            if (isset($_REQUEST['symtoms']) && !empty($_REQUEST['symtoms']) && isset($_REQUEST['recommendation']) && !empty($_REQUEST['recommendation'])) {
                $arrRecordDetail['date'] = $_REQUEST['date'] ? str_replace("/", "-", $_REQUEST['date']) : '';
                $arrRecordDetail['symtoms'] = $_REQUEST['symtoms'] ? trim($_REQUEST['symtoms']) : '';
                $arrRecordDetail['details'] = $_REQUEST['details'] ? trim($_REQUEST['details']) : '';
                $arrRecordDetail['recommendation'] = $_REQUEST['recommendation'] ? trim($_REQUEST['recommendation']) : '';
                $arrRecordDetail['followup'] = $_REQUEST['followup'] ? str_replace("/", "-", $_REQUEST['followup']) : '';
                $arrRecordDetail['did'] = $_SESSION['uid'];
                $arrRecordDetail['pid'] = $_REQUEST['uid'];
                $arrRecordDetail['phid'] = $_REQUEST['phid'];

                $objDatabase = new mysqlDatabaseClass();
                $objPatientHistory = new patientHistoryClass();
                $objPatientHistory->updateRecord($objDatabase, $arrRecordDetail);
                $message = "<div class='divClr'></div><div class='regularmsg'>Medical Record updated Successfully.</div>";
            } else {
                echo "Required fields were not filled";
            }
        }

        if (isset($_REQUEST['action'])) {
            switch ($_REQUEST['action']) {
                case 'view';
                    include 'view/illnessDignosis_view.php';
                    break;
                case 'addRecord';
                    include 'view/addRecordForm_view.php';
                    break;
                case 'editRecord';
                    include 'view/editRecordForm_view.php';
                    break;
            }
        } else {
            include 'view/doctorDiagnosis_view.php';
        }
    }else{
        include 'view/patientDiagnosis_view.php';
    }
} else {
    header("Location:" . HTTP_HOST);
}
?>
