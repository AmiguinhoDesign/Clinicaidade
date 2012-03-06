<?php

// every page needs to start with these basic things 

// I'm using a separate config file. so pull in those values 
require("config.inc.php"); 

// pull in the file with the database class 
require("Database.class.php"); 

// create the $db object 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

// connect to the server 
$db->connect(); 

##### 
// your main code would go here 
##### 

// and when finished, remember to close connection 
$db->close();

?>