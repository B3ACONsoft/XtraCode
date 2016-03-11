<?php
include 'dbProperties.php';

/**
 * The gobal database connection object.
 */
$db;

/**
 * Establish a connection to the global database connection object.
 */
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

/**
 * Performs an insert operation on a given prepared statement.
 * 
 * @param unknown $query
 */
function doInsert($query) {
        try {
            
            if($query->execute()) {
                //echo 'SUCCESS!!!\nInserted Values:\n'.$params['id'].', '.$params['firstname'].', '.$params['lastname'].', '.$params['phone'].', '.$params['email'].'\r\n\r\n'; 
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


/**
 * Binds the given values to the given prepared statement query.
 * 
 * @param unknown $query
 * @param unknown $values
 */
function insertUserBinding(&$query, $values) {
    $query->bindParam(':fname', $values['fname']);
    $query->bindParam(':lname', $values['lname']);
    $query->bindParam(':phone', $values['phone']);
    $query->bindParam(':emergency', $values['emergency']);
    $query->bindParam(':email', $values['email']);
    $query->bindParam(':user_type', $values['user_type']);
    $query->bindParam(':password', $values['password']);
}

/**
 * Insert operation.
 * Switch on table name.
 * Bind params based on table name.
 * execute insert statement.
 * Does nothing if table is not in switch.
 * Accesses the values to get the table name.
 * <br>
 * @param unknown $values
 */
function insertOperation($values) {
    global $db;
    $query = null;
    
    if($db != null) {
            switch($values['table_name']) {
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

//FIXME: REMOVE AFTER TESTING...
function doSelect($query) {
    //echo "in doSelect()\r\n";
    global $db;
    $result = $db->query($query);
    
    return $result;
}

/**
 * Do a select operation on a given prepared statement.
 * 
 * @param unknown $query
 */
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