<?php
error_reporting(E_ALL);
/*
    Entry point for sync operation server side	
*/
include 'dbConnection.php';

//this is the user_id of the user that is trying to access server resources
$user_id;
$user_type;


/*
    Every transmission to the server should have to validate.
    This way we can make sure users are indeed valid users.
    Also we can make sure a valid user only gets data which
    is relevant to them.
    
    returns 
        0 if user didn't validate correctly
        1 if user is an admin
        2 if user is a coach
        3 if user is player/parent/member whatever...
*/
function userValidation($values) {
        global $user_type;
        global $user_id;
        
        connectToDB();
        if(isset($values['user_id']) && !empty($values['user_id'])) {
            
        } else {
            echo "you didn't provide a valid user name\r\n";
            return 0;
        }
        if(isset($values['password']) && !empty($values['password'])) {
            
        } else {
            echo "you didn't provide a valid password\r\n";
            return 0;
        }
        
        $user_type = getUserType($values);
        $user_id = $values['user_id'];
        return 1;
}

function adminCommandSwitch($values, $user_id) {
    //admin can do anthing...
    //echo "begin admin switch\r\n";
    switch($values['command'])
    {
        case 'INSERT':
            insertOperation($values);        
            break;
        case 'UPDATE':
            updateOpertaion($values);
            break;
        case 'DELETE':
            break;
        case 'SELECT':
            selectOperation($values);                              
        break;
    }
}

function coachCommandSwitch($values, $user_id) {
    //coach can do anything for now too...
    switch($values['command'])
    {
        case 'INSERT':
            insertOperation($values);        
            break;
        case 'UPDATE':
            updateOpertaion($values);
        case 'DELETE':
            
        case 'SELECT':
            selectOperation($values);                              
        break;
    }
}

function userCommandSwitch($valuse, $user_id) {
    //user can only update and select
    switch($values['command'])
    {
        case 'UPDATE':
            updateOpertaion($values);
        case 'SELECT':
            selectOperation($values);                              
        break;
    }
}

/*
   Do an operation on the database
*/

function databaseOperation($values, $user_type, $user_id) {
    
    switch($user_type) {
        case 'ADMIN':
            adminCommandSwitch($values, $user_id);
            break;
        case 'COACH':
            coachCommandSwitch($values, $user_id);
            break;
        case 'USER':
            userCommandSwitch($values, $user_id);
            break;
    }
    //closeDB();
}


if($_POST != NULL) {
    //validate
   
    if(userValidation($_POST))
    {
       //echo "validation Complete, user_type is:$user_type, user_id is: $user_id\r\n";
       databaseOperation($_POST, $user_type, $user_id);
    }
   
} else {
    echo("you didn't post anything...\r\n\r\n");
}

?>