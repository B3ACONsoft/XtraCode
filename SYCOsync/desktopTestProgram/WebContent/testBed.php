<?php

$db;

//scott's DB connection stuff
function connectToDB() {
    echo "connecting to DB\r\n\r\n";
    global $db;
        //create scotts database objects

    //$dsn = 'mysql:host=mysql13.000webhost.com;dbname=a7033823_survey';
    $dsn = 'mysql:host=localhost;dbname=remoteData';
	//$username = 'a7033823_scott';
    $username = 'root';
	//$password = 'pass12';
    $password = 'remember';
	try {
		$db = new PDO($dsn, $username, $password);
		echo "You are connected to the database.\r\n\r\n";
	}catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "An error occurred while connecting to the database:
		$error_message\r\n\r\n";
	}
    
}

?>