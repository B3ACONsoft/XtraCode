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
 * Binds the values needed to insert a sport
 */
function addSportBinding(&$query, $values) {
	$query->bindParam(':sport_name', $values['sport_name']);
	
}

/**
 * Binds the values needed to insert a league
 */
function addLeagueBinding(&$query, $values) {
	$query->bindParam(':league_name', $values['league_name']);
	$query->bindParam(':sport_id', $values['sport_id']);
	$query->bindParam(':min_age', $values['min_age']);
	$query->bindParam(':max_age', $values['max_age']);
	$query->bindParam(':start_date', $values['start_date']);
	$query->bindParam(':end_date', $values['end_date']);
}

/**
 * Binds the values needed to insert a user.
 *
 * @param unknown $query
 * @param unknown $values
 */
function addUserBinding(&$query, $values) {
	$query->bindParam(':fname', $values['fname']);
	$query->bindParam(':lname', $values['lname']);
	$query->bindParam(':phone', $values['phone']);
	$query->bindParam(':emergency', $values['emergency']);
	$query->bindParam(':email', $values['email']);
	$query->bindParam(':user_type', $values['user_type']);
	$query->bindParam(':password', $values['password']);
}

/**
 * Binds the values needed to insert a team
 */
function addTeamBinding(&$query, $values) {
	$query->bindParam(':league_id', $values['league_id']);
	$query->bindParam(':team_name', $values['team_name']);
	$query->bindParam(':user_id', $values['user_id']);
}

/**
 * Binds the values needed to insert an enrollment record.
 *
 * @param unknown $query
 * @param unknown $values
 */
function addEnrollmentBinding(&$query, $values) {
	$query->bindParam(':user_id', $values['user_id']);
	$query->bindParam(':player_id', $values['player_id']);
	$query->bindParam(':team_id', $values['team_id']);
	$query->bindParam(':league_id', $values['league_id']);
	$query->bindParam(':enrollment_date', $values['enrollment_date']);
	$query->bindParam(':fee', $values['fee']);
}

/**
 * Binds the values needed to insert a place.
 *
 * @param unknown $query
 * @param unknown $values
 */
function addPlaceBinding(&$query, $values) {
	$query->bindParam(':place_name', $values['place_name']);
	$query->bindParam(':street_address', $values['street_address']);
	$query->bindParam(':city', $values['city']);
	$query->bindParam(':state', $values['state']);
	$query->bindParam(':zip', $values['zip']);
	$query->bindParam(':fee', $values['fee']);
}

/**
 * Binds the values needed to insert an event.
 *
 * @param unknown $query
 * @param unknown $values
 */
function addEventBinding(&$query, $values) {
	$query->bindParam(':event_type', $values['event_type']);
	$query->bindParam(':start_date', $values['start_date']);
	$query->bindParam(':place_id', $values['place_id']);
	$query->bindParam(':home_team_id', $values['home_team_id']);
	$query->bindParam(':away_team_id', $values['away_team_id']);
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
                addSportBinding($query, $values);
                break;
            case 'LEAGUE':
                $query = $db->prepare(ADD_LEAGUE);
                addLeagueBinding($query, $values);
                break;
            case 'USERS':
                $query = $db->prepare(ADD_USER);
                addUserBinding($query, $values);
                break;
            case 'TEAM':
                $query = $db->prepare(ADD_TEAM);
                addTeamBinding($query, $values);
                break;
            case 'ENROLLMENT':
                $query = $db->prepare(ADD_ENROLLMENT);
                addEnrollmentBinding($query, $values);
                break;
            case 'PLACE':
                $query = $db->prepare(ADD_PLACE);
                addPlaceBinding($query, $values);
                break;
            case 'EVENTS':
                $query = $db->prepare(ADD_EVENT);
                addEventBinding($query, $values);
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

/**
 * Switch on table name.
 * Prepare the statement.
 * Do select operation.
 * Echo the result in JSON format.
 * 
 * 
 * 4/10/2016
 * 	Dave
 * 		we add new options for a select statement
 * 		
 * 
 * @param unknown $values
 */
function selectOperation($values) {
    //echo "begin select operation\r\n";
    global $db;
    $query = null;
    $result = null;
    
    if($db != null) {
    		/*
    		 * SWITCH ON WHICH TABLE WE ARE ACTING ON.
    		 */
            switch($values['table']) {
        	
        	/*
        	 * SPORT TABLE SELECT OPTIONS
        	 */
            case 'SPORTS':
            		switch($values['command']) {
            			case 'get_all':
            				$query = $db->prepare(GET_ALL_SPORTS);
            				break;
            			case 'get_sports_by_coach':
            				$query = $db->prepare(GET_ALL_SPORTS);
            				break;
            			case 'get_sports_by_admin':
            				$query = $db->prepare(GET_SPORTS_BY_ADMIN);
            				break;
            			case 'get_sports_by_name':
            				$query = $db->prepare(GET_SPORT_BY_NAME);
            				break;
            		}
                break;
               
            /*
             * LEAGUE TABLE SELECT OPTIONS 
             */
            case 'LEAGUE':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_LEAGUES);
            			break;
            		case 'get_leagues_by_coach_and_sport':
            			$query = $db->prepare(GET_LEAGUES_BY_COACH_AND_SPORT);
            			break;
            		case 'get_league_by_id':
            			$query = $db->prepare(GET_LEAGUE_BY_ID);
            			break;
            		case 'get_leagues_by_adminid_and_sportid':
            			$query = $db->prepare(GET_LEAGUES_BY_ADMINID_SPORTID);
            			break;
            		case 'get_leagues_by_sportid':
            			$query = $db->prepare(GET_LEAGUES_BY_SPORTID);
            			break;
            	}

            	
			/*
			 * USER TABLE SELECT OPTIONS
			 */
            case 'USERS':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_USERS);
            			break;
            		case 'get_users_by_coach':
            			$query = $db->prepare(GET_USERS_BY_COACH);
            			break;
            		case 'get_users_by_team':
            			$query = $db->prepare(GET_USERS_BY_TEAM);
            			break;
            	}
                break;
            
            /*
             * TEAM TABLE SELECT OPTIONS
             */
            case 'TEAM':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_TEAMS);
            			break;
            		case 'get_teams_by_coach':
            			$query = $db->prepare(GET_TEAMS_BY_COACH);
            			break;
            		case 'get_teams_by_league':
            			$query = $db->prepare(GET_TEAMS_BY_LEAGUE);
            			break;
            	}
                break;
            
            case 'PLAYER':
            	switch($values['command']){
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_PLAYERS);
            		break;
            		case 'get_players_by_team':
            			$query = $db->prepare(GET_PLAYERS_TEAM);
            			break;
            		case 'get_player_by_id':
            			$query = $db->prepare(GET_PLAYER_BY_ID);
            			break;
            		case 'get_player_by_first_last_playerid':
            			$query = $db->prepare(GET_PLAYER_BY_FIRST_LAST_PLAYER_ID);
            			break;
            		case 'get_player_by_first_last_userid':
            			$query = $db->prepare(GET_PLAYER_BY_FIRST_LAST_USER_ID);
            			break;
            	}
            	break;
            	
            /*
             * ENROLLMENT TABLE SELECT OPTIONS
             */
            case 'ENROLLMENT':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_ENROLLMENT);
            			break;
            		case 'get_enrollment_by_userid_leagueid_teamid':
            			$query = $db->prepare(GET_ENROLLMENT_BY_USERID_LEAGUEID_TEAMID);
            			break;
            		case 'get_enrollment_by_playerid_userid_currentleague_currentteam':
            			$query = $db->prepare(GET_ENROLLMENT_BY_PLAYERID_USERID_CURRENTLEAGUE_CURRENTTEAM);
            			break;
            	}
                break;
                
            /*
             * PLACE TABLE SELECT OPTIONS
             */
            case 'PLACE':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_PLACES);
            			break;
            		case 'get_place_by_id':
            			$query = $db->prepare(GET_PLACE_BY_ID);
            			break;
            	}
                break;
                
            /*
             * EVENTS TABLE SELECT OPTIONS
             */
            case 'EVENTS':
            	switch($values['command']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_EVENTSS);
            			break;
            		case 'get_events_by_team':
            			$query = $db->prepare(GET_EVENTS_BY_TEAM);
            			break;
            		case 'get_events_by_placeid':
            			$query = $db->prepare(GET_EVENTS_BY_PLACEID);
            			break;
            	}
            	break;
            }
            
            if($query != null) {
                $result = doPrepSelect($query);
            }
            echo json_encode($result);
    }
    //echo "end select operation\r\n";
}

/**
 * This gets what user type of user a given user_id is attached to
 * based on their credentials.
 * 
 * 
 * 
 * THIS NEEDS TO BE TESTED!!!!!!
 * 
 * @param unknown $values
 * @return The type of user
 * 					ADMIN
 * 					USER
 * 					COACH
 */
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