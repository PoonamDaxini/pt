<?php

class doctorClass {

    function getUnconformedPatient($objDatabase) {
        $query = "select * from user where conformation = 0 and userType='patient'";

        $objDatabase->query($query);
        $result = $objDatabase->getDbData();
        return $result;
    }

    function updateConformation($objDatabase, $uid) {
        $query = "update user set conformation = 1 where id=" . $uid;

        $objDatabase->query($query);
    }

    function getPatientQuestions($objDatabase, $uid) {
        $query = "Select * from patientquery where reply='' and did=" . $uid;

        $objDatabase->query($query);
        $result = $objDatabase->getDbData();
        return $result;
    }

    function getParticularQuery($objDatabase, $qid) {
        $query = "Select * from patientquery where qid=" . $qid;

        $objDatabase->query($query);
        $result = $objDatabase->getDbData();
        return $result;
    }

    function particularReply($objDatabase , $reply , $queryid){
        $query = "update patientquery set reply='".$reply."' where qid=".$queryid;

        $objDatabase->query($query);
    }
    function addArticle($objDatabase, $arrArticle) {
        
    }

}

?>
