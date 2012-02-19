<?php

//ini_set("display_errors", "on");

class mysqlDatabaseClass {

    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $link;
    private $query;

    function __construct() {
        $this->dbHost = '127.0.0.1';
        $this->dbUser = 'root';
        $this->dbPass = 'thakkar';
        $this->dbName = 'patient';
        $this->link = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass) or die("db error");
        mysql_select_db($this->dbName);
    }

    function safe_string($data) {
        return mysql_escape_string($data);
    }

    function query($query) {
        if (isset($_REQUEST['dbdump'])) {
            echo $query . "<br>";
        }
        $this->query = mysql_query($query, $this->link);
    }

    function getnumrows() {
        if ($this->query) {
            return mysql_num_rows($this->query);
        } else {
            return 0;
        }
    }

    function getDbData() {
        $result = '';
        while ($row = mysql_fetch_assoc($this->query)) {
            $result[] = $row;
        }
        if (isset($_REQUEST['dbdump'])) {
            echo "<pre>";
            var_dump($result);
            echo "</pre>";
        }
        return $result;
    }

}

?>