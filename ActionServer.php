<?php

session_start();
require_once("_include/mysql.php");
if (!ini_get('safe_mode')) {
    set_time_limit(0);
}

class ActionServer {

    private $db;
    public $array;

    public function __construct() {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
        $this->db->connect();
        $this->array = array();
    }

   
}

?>
