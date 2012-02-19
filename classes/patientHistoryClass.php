<?php

class patientHistoryClass {

    function addRecord($objDatabase, $arrRecordDetail) {
        $query = "insert into patienthistory (date,symptoms,details,recommendation,did,followup,pid) values('";
        $query .= $objDatabase->safe_string($arrRecordDetail['date']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['symtoms']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['details']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['recommendation']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['did']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['followup']) . "','";
        $query .= $objDatabase->safe_string($arrRecordDetail['pid']) . "')";

        $objDatabase->query($query);
    }

    function getHistory($objDatabase, $userid) {
        $query = "select p.* from patienthistory p , user u where p.pid = u.id and p.pid=";
        $query .= $objDatabase->safe_string($userid);

        $objDatabase->query($query);
        $numrows = $objDatabase->getnumrows();

        if ($numrows > 0) {
            $result = $objDatabase->getDbData();
            return $result;
        }
    }

    function getPatientHistory($objDatabase, $historyid) {
        $query = "select p.phid,p.date,p.symptoms,p.details,p.recommendation,p.followup,u.username as doctor from patienthistory p , user u where p.phid = ";
        $query .= $objDatabase->safe_string($historyid);

        $objDatabase->query($query);
        $numrows = $objDatabase->getnumrows();

        if ($numrows > 0) {
            $result = $objDatabase->getDbData();
            return $result;
        }
    }

    function updateRecord($objDatabase, $arrRecordDetail) {
        $query = "update patienthistory set date = '";
        $query .= $objDatabase->safe_string($arrRecordDetail['date']) . "',symptoms = '";
        $query .= $objDatabase->safe_string($arrRecordDetail['symtoms']) . "',details ='";
        $query .= $objDatabase->safe_string($arrRecordDetail['details']) . "',recommendation ='";
        $query .= $objDatabase->safe_string($arrRecordDetail['recommendation']) . "',followup ='";
        $query .= $objDatabase->safe_string($arrRecordDetail['followup']) . "'";
        $query .= " where phid = " . $objDatabase->safe_string($arrRecordDetail['phid']);

        $objDatabase->query($query);
    }

}

?>
