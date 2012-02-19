<?php
class patientClass
{
    function patientQuery($objDatabase , $patient_id, $doctor_id,$patientquery){
        $query = "insert into patientquery (query,pid,did,status,creation_date) values('";
        $query .= $patientquery."','";
        $query .= $patient_id."','";
        $query .= $doctor_id."','0','".date("Y-m-d H:i:s", time())."')";

        $result = $objDatabase->query($query);
    }

    function getPatientQuery($objDatabase , $id)
    {
        $query = "select * from patientquery where pid = '".$objDatabase->safe_string($id)."'";

        $objDatabase->query($query);
        $result = $objDatabase->getDbData();
        return $result;
    }

}
?>
