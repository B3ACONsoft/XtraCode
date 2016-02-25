<?php
include 'dbProperties.php';

$db;

//scott's DB connection stuff
function connectToDB() {
    //echo "connecting to DB\r\n\r\n";
    global $db;
 
	try {
		$db = new PDO(DSN, USERNAME, PASSWORD);
		//echo "You are connected to the database.\r\n\r\n";
	}catch(PDOException $e){
		$error_message = $e->getMessage();
		echo "An error occurred while connecting to the database:
		$error_message\r\n\r\n";
	}
    
}

/*
    perform an insert for the query
*/
function doInsert($query) {
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


/*
    binds params for the ADD_USER query
*/
function insertUserBinding($query, $values) {
    $query->bindParam(':fname', $params['fname']);
    $query->bindParam(':lname', $params['lname']);
    $query->bindParam(':phone', $params['emergency']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':user_type', $params['user_type']);
    $query->bindParam(':password', $params['password']);
}


/*
    Insert operation.
    Switch on table name.
    Bind params based on table name.
    execute insert statement.
    
    Does nothing if table is not in switch.
*/
function insertOperation($table, $values) {
    global $db;
    $query = null;
    
    if($db != null) {
            switch($table) {
            case 'SPORTS':
                $query = $db->prepare(ADD_SPORT);
                break;
            case 'LEAGUE':
                $query = $db->prepare(ADD_LEAGUE);
                break;
            case 'USERS':
                $query = $db->prepare(ADD_USER);
                insertUserBinding($query, $values);
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
            if($query != null) {
                doInsert($query);
            }
    } 
}

/*
    perform an insert for the given query
*/
function doSelect($query) {
    //echo "in doSelect()\r\n";
    global $db;
    $result = $db->query($query);
    
    return $result;
}

function doPrepSelect($query) {
    //echo "in prepSelect()";
    global $db;
    $query->execute();
    return $query->fetchAll();
}

/* 
    Switch on table name.
    prepare the statement.
    select and echo result in JSON
*/
function selectOperation($values) {
    //echo "begin select operation\r\n";
    global $db;
    $query = null;
    $result = null;
    
    if($db != null) {
            switch($values['table']) {
            case 'SPORTS':
                $query = $db->prepare(GET_ALL_SPORTS);
                break;
            case 'LEAGUE':
                $query = $db->prepare(GET_ALL_LEAGUES);
                break;
            case 'USERS':
                //echo "start select on all teams\r\n";
                $query = $db->prepare(GET_ALL_USERS);
                break;
            case 'TEAM':
                $query = $db->prepare(GET_ALL_TEAMS);
                break;
            case 'ENROLLMENT':
                $query = $db->prepare(GET_ALL_ENROLLMENT);
                break;
            case 'PLACE':
                $query = $db->prepare(GET_ALL_PLACES);
                break;
            case 'EVENTS':
                $query = $db->prepare(GET_ALL_EVENTS);
                break;
            }
            if($query != null) {
                $result = doPrepSelect($query);
            }
            echo json_encode($result);
    }
    //echo "end select operation\r\n";
}

function getUserType($values) {
    global $db;
    $user_type;
    $user_id = $values['user_id'];
    $password = $values['password'];
   
    $query = "SELECT user_type
              FROM users
              WHERE (user_id = $user_id)
                    AND
                    (password = $password)";
    
    $result = doSelect($query);
    foreach($result as $record) {
        $user_type = $record['user_type'];
        break;
    }
    
    return $user_type;
}
/*?>*/