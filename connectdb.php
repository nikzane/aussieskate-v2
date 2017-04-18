<?php
/* Open the database - this needs to be changed when deployed */
$hostname = "mysql.sandbox.spd13.com";
$username = "as01";
$password = "OzzieSk801";
$databasename = "as_spd_com";

try { 
	$db = new PDO('mysql:host=' . $hostname . ';dbname=' . $databasename . ';charset=utf8mb4', $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, 
                                                                                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(PDOException $ex) {
    echo "An Error occured!"; //user friendly message
    some_logging_function($ex->getMessage());
}

?>