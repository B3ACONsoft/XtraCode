<?php
error_reporting(E_ALL);
/*
    Entry point for sync operation server side
    
    David Johnson
        2/22/2015	
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
    
    This inits the global user_id and user_type variables.
    
    returns 
        0 on fail
        1 on success
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
/*
    HOT NOTE ON WHERE I'M GOING WITH THESE USER SWITCHES.
    
    I'm making the assumption that for now
    a user of any type is going be doing two basic operations.
    They will be doing a "fetch all data operation" and 
    they will be doing "targeted inserts and updates".
    So it follows that each user will have a "fetch" command
    that gets all data relevant for that user and they will have a 
    "push" command with further options to update or insert data.
    I know, I know, I'm stealing from Git >:).
    
    But a fetch on the app side
    is just a select on this end.
    Basically app side it is a fetch()
    which is for loop with gets from the tables in a list.
*/

/*
    Admin can do updates and inserts, in fact, because they are
    admins they do pretty much anything for now. They are god.
    Bow to them.
*/
function adminCommandSwitch($values, $user_id) {
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

/*
    Coaches can do updates and inserts, but they can only add players.
    We still need to work out these permissions.
*/
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
/*
    Users can only update their attendance record.
    They can't insert or delete etc etc etc.
*/
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