<?php

class illnessClass {

    function addIllness($objdatabase, $illnessName) {
        $query = "select * from illness where illnessname = '" . $objdatabase->safe_string($illnessName) . "'";
        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows <= 0) {
            $query = "insert into illness (illnessname) values ('";
            $query .= $objdatabase->safe_string($illnessName) . "')";

            $objdatabase->query($query);
        }
    }

    function getIllnessDetail($objdatabase) {
        $query = "select * from illness";
        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows > 0) {
            $result = $objdatabase->getDbData();
            return $result;
        }
    }

    function updateIllness($objdatabase, $illid, $illname) {
        $query = "update illness set illnessname='" . $objdatabase->safe_string($illname) . "' where illid = " . $objdatabase->safe_string($illid);

        $objdatabase->query($query);
    }

    function deleteIllness($objDatabase, $illid) {
        $query = "delete from illness where illid=" . $objDatabase->safe_string($illid);

        $objDatabase->query($query);
    }

    function getIllnessBasedOnId($objdatabase, $illid) {
        $query = "select * from illness where illid=" . $objdatabase->safe_string($illid);
        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows > 0) {
            $result = $objdatabase->getDbData();
            return $result;
        } else {
            return '';
        }
    }

}

?>
