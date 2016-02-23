<?php


$db;

//scott's DB connection stuff
function connectToDB() {
    echo "connecting to DB\r\n\r\n";
    global $db;
        //create scotts database objects

    //$dsn = 'mysql:host=mysql13.000webhost.com;dbname=a7033823_survey';
    //$dsn = 'mysql:host=localhost;dbname=remoteData';
	//$username = 'a7033823_scott';
    //$username = 'root';
	//$password = 'pass12';
    //$password = 'remember';
	try {
		$db = new PDO(DSN, USERNAME, PASSWORD);
		echo "You are connected to the database.\r\n\r\n";
	}catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "An error occurred while connecting to the database:
		$error_message\r\n\r\n";
	}
    
}

function bindParameters($stmt, $params) {
    $isParam = false;
    $param = "";
    
    for($i = 0, $i < strlen($stmt); $i++) {
        if($stmt[$i] == ':') {
            $isParam = true;
        }
        if($isParam) {
            if($stmt[$i] == ',') {
                $isParam = false;
                
            }
            else {
                $param .= $stmt[$i];
            }
        }
    }
}

function insert($table, $values) {
    $query;
    switch($table) {
        case 'SPORTS':
            $query = $db->prepare(ADD_SPORT);
            break;
        case 'LEAGUE':
            $query = $db->prepare(ADD_LEAGUE);
            break;
        case 'USERS':
            $query = $db->prepare(ADD_USER);
            break;
        case 'TEAM':
            $query = $db->prepare(ADD_TEAM);
            break;
        case 'ENROLLMENT':
            $query = $db->prepare(ADD_ENROLLMENT);
            break;
        case 'PLACE':
            $query = $db->prepare(ADD_PLACE);
            break;
        case 'EVENTS':
            $query = $db->prepare(ADD_EVENT);
            break;
    }
    if($db != NULL) {
        //bind the params
        $query->bindParam(':id', $params['id']);
        $query->bindParam(':firstname', $params['firstname']);
        $query->bindParam(':lastname', $params['lastname']);
        $query->bindParam(':phone', $params['phone']);
        $query->bindParam(':email', $params['email']);
	
        try {
            
            if($query->execute()) {
                echo 'SUCCESS!!!\nInserted Values:\n'.$params['id'].', '.$params['firstname'].', '.$params['lastname'].', '.$params['phone'].', '.$params['email'].'\r\n\r\n'; 
            } else {
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $query->errorInfo();
                print_r($arr);
            }
            
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
		    echo "An error occurred while connecting to the database:
		    $error_message\r\n\r\n";
        }
        
    }

}
?>