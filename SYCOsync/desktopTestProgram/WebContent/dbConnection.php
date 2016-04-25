<?php
/*
 * TABLE OF CONTENTS FOR THIS MONSTER.
 * 
 * 		PART 1:
 * 			BINDING FUNCTIONS.
 * 				Each of these functions does:
 * 					accesses the global $db variable.
 * 					bindes params present in $values to the query.
 * 					returns the query.
 * 
 * 		PART 2:
 * 			DB operation functions.
 * 				selectOperations:
 * 				insertOperations:
 * 				deleteOperations:
 * 
 */
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

///////////////////////////////////////
//SELECT BINDINGS
///////////////////////////////////////

//USER

function getUserByEmailBinding($values) {
	global $db;
	$query = $db->prepare(GET_USER_BY_EMAIL);
	$query->bindParam(':email', $values['email']);
	return $query;
}


 function getUserByIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_USER_BY_ID);
	$query->bindParam(':user_id', $values['user_id']);
	return $query;
}

 function getUserByCoachBinding($values) {
 	global $db;
	$query = $db->prepare(GET_USER_BY_COACH);
	$query->bindParam(':current_league_id', $values['current_league_id']);
	return $query;
}

 function getUserByTeamBinding($values) {
 	global $db;
	$query = $db->prepare(GET_USER_BY_TEAM);
	$query->bindParam(':current_team_id', $values['current_team_id']);
	return $query;
}

//PLAYER


 function getPlayerByTeamBinding($values) {
 	global $db;
	$query = $db->prepare(GET_PLAYER_BY_TEAM);
	$query->bindParam(':team_id', $values['team_id']);
	return $query;
}

 function getPlayerByIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_PLAYER_BY_ID);
	$query->bindParam(':user_id', $values['user_id']);
	return $query;
}

 function getPlayerByFirstLastPlayerIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_PLAYER_BY_FIRST_LAST_PLAYERID);
	$query->bindParam(':current_first_name', $values['current_first_name']);
	$query->bindParam(':current_last_name', $values['current_last_name']);
	$query->bindParam(':current_player_id', $values['current_player_id']);
	return $query;
}

 function getPlayerByFirstLastUserIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_PLAYER_BY_FIRST_LAST_USER_ID);
	$query->bindParam(':current_first_name', $values['current_first_name']);
	$query->bindParam(':current_last_name', $values['current_last_name']);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	return $query;
}


//SPORT

 function getSportsByCoachBinding($values) {
 	global $db;
	$query = $db->prepare(GET_SPORTS_BY_COACH);
	$query->bindParam(':coach_id', $values['coach_id']);
	return $query;
}

 function getSportsByAdminBinding($values) {
 	global $db;
	$query = $db->prepare(GET_SPORTS_BY_ADMIN);
	$query->bindParam(':current_admin_id', $values['current_admin_id']);
	return $query;
}

 function getSportByNameBinding($values) {
 	global $db;
	$query = $db->prepare(GET_SPORT_BY_NAME);
	$query->bindParam(':sport_name', $values['sport_name']);
	return $query;
}

//TEAM

 function getTeamByTeamIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_TEAM_BY_TEAM_ID);
	$query->bindParam(':team_id', $values['team_id']);
	return $query;
}

 function getTeamByCoachBinding($values) {
 	global $db;
	$query = $db->prepare(GET_TEAM_BY_COACH_ID);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	$query->bindParam(':league_id', $values['league_id']);
	return $query;
}

 function getTeamsByLeagueBinding($values) {
 	global $db;
	$query = $db->prepare(GET_TEAM_BY_LEAGUE);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	$query->bindParam(':current_league_id', $values['current_league_id']);
	return $query;
}


//LEAGUE

 function getLeaguesByCoachAndSportBinding($values) {
 	global $db;
	$query = $db->prepare(GET_LEAGUES_BY_COACH_AND_SPORT);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	$query->bindParam(':sport_id', $values['sport_id']);
	return $query;
}

 function getLeaguesByIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_LEAGUES_BY_ID);
	$query->bindParam(':league_id', $values['league_id']);
	return $query;
}

 function getLeaguesByAdminIdSportIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_LEAGUES_BY_ADMINID_SPORTID);
	$query->bindParam(':current_admin_id', $values['current_admin_id']);
	$query->bindParam(':current_sport_id', $values['current_sport_id']);
	return $query;
}

 function getLeaguesBySportIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_LEAGUES_BY_SPORTID);
	$query->bindParam(':current_sport_id', $values['current_sport_id']);
	return $query;
}

//EVENT

 function getEventByTeamBinding($values) {
 	global $db;
	$query = $db->prepare(GET_EVENTS_BY_TEAM);
	$query->bindParam(':away_team_id', $values['away_team_id']);
	$query->bindParam(':home_team_id', $values['home_team_id']);
	return $query;
}

 function getEventByPlaceIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_EVENTS_BY_PLACEID);
	$query->bindParam(':place_id', $values['place_id']);
	return $query;
}


//PLACE

 function getPlaceByIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_PLACE_BY_ID);
	$query->bindParam(':place_id', $values['place_id']);
	return $query;
}


//ENROLLMENT

 function getEnrollmentByUserIdLeagueIdTeamIdBinding($values) {
 	global $db;
	$query = $db->prepare(GET_ENROLLMENT_BY_USER_ID_LEAGUEID_TEAMID);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	$query->bindParam(':current_league_id', $values['current_league_id']);
	$query->bindParam(':current_team_id', $values['current_team_id']);
	return $query;
}

 function getEnrollmentBy_playerid_userid_currentleague_currentteam_Binding($values) {
 	global $db;
	$query = $db->prepare(GET_ENROLLMENT_BY_PLAYERID_USERID_CURRENTLEAGUE_CURRENTTEAM);
	$query->bindParam(':current_player_id', $values['current_player_id']);
	$query->bindParam(':current_user_id', $values['current_user_id']);
	$query->bindParam(':current_league_id', $values['current_league_id']);
	$query->bindParam(':current_team_id', $values['current_team_id']);
	return $query;
}

//ATTENDANCE

///////////////////////////////////////
//INSERT BINDINGS
////////////////////////////////////////


 function addSportBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_SPORT);
	$query->bindParam(':sport_name', $values['sport_name']);

	return $query;
}

 function addLeagueBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_LEAGUE);

	$query->bindParam(':league_name', $values['league_name']);
	$query->bindParam(':sport_id', $values['sport_id']);
	$query->bindParam(':min_age', $values['min_age']);
	$query->bindParam(':max_age', $values['max_age']);
	$query->bindParam(':start_date', $values['start_date']);
	$query->bindParam(':end_date', $values['end_date']);

	return $query;
}


 function addUserBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_USER);

	$query->bindParam(':fname', $values['fname']);
	$query->bindParam(':lname', $values['lname']);
	$query->bindParam(':phone', $values['phone']);
	$query->bindParam(':emergency', $values['emergency']);
	$query->bindParam(':email', $values['email']);
	$query->bindParam(':user_type', $values['user_type']);
	$query->bindParam(':password', $values['password']);

	return $query;
}


 function addTeamBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_TEAM);

	$query->bindParam(':league_id', $values['league_id']);
	$query->bindParam(':team_name', $values['team_name']);
	$query->bindParam(':user_id', $values['user_id']);

	return $query;
}


 function addEnrollmentBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_ENROLLMENT);

	$query->bindParam(':user_id', $values['user_id']);
	$query->bindParam(':player_id', $values['player_id']);
	$query->bindParam(':team_id', $values['team_id']);
	$query->bindParam(':league_id', $values['league_id']);
	$query->bindParam(':enrollment_date', $values['enrollment_date']);
	$query->bindParam(':fee', $values['fee']);

	return $query;
}


 function addPlaceBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_PLACE);

	$query->bindParam(':place_name', $values['place_name']);
	$query->bindParam(':street_address', $values['street_address']);
	$query->bindParam(':city', $values['city']);
	$query->bindParam(':state', $values['state']);
	$query->bindParam(':zip', $values['zip']);
	$query->bindParam(':fee', $values['fee']);

	return $query;
}


 function addEventBinding($values) {
 	global $db;
	$query = $db->prepare(ADD_EVENT);

	$query->bindParam(':event_type', $values['event_type']);
	$query->bindParam(':start_date', $values['start_date']);
	$query->bindParam(':place_id', $values['place_id']);
	$query->bindParam(':home_team_id', $values['home_team_id']);
	$query->bindParam(':away_team_id', $values['away_team_id']);

	return $query;
}

///////////////////////////////////////
//UPDATE BINDINGS
////////////////////////////////////////

 function updateSportAllValuesBinding($values) {
 	global $db;
	$query = $db->prepare(UPDATE_SPORT_ALL_VALUES);
	$query->bindParam(':sport_name', $values['sport_name']);
	$query->bindParam(':sport_id', $values['sport_id']);
	return $query;
}

 function updateTeamCoachBinding($values) {
 	global $db;
	$query = $db->prepare(UPDATE_TEAM_COACH);
	$query->bindParam(':user_id', $values['user_id']);
	$query->bindParam(':team_id', $values['team_id']);
	return $query;
}

 function updateTeamNameBinding($values) {
 	global $db;
	$query = $db->prepare(UPDATE_TEAM_NAME);
	$query->bindParam(':team_name', $values['team_name']);
	$query->bindParam(':team_id', $values['team_id']);
	return $query;
}
/*
function updateTeamCoachBinding($values) {
 	global $db;
	$query = $db->prepare(UPDATE_TEAMS_BY_COACH);

	return $query;
}

function updateSportAllValuesBinding($values) {
 	global $db;
	$query = $db->prepare(UPDATE_LEAGUE_ALL_VALUES);

	return $query;
}

function updateAttendanceBinding($values) {
 	global $db;
	$query = $db->prepare(ADMIN_UPDATE_ATTENDANCE_STATUS_MESSAGE);

	return $query;
}

///////////////////////////////////////
//DELETE BINDINGS
////////////////////////////////////////

/*
  function deleteUserByIdBinding($values) {
	global $db;
 $query = $db->prepare(DELETE_USER_BY_ID);

 return $query;
 }

  function deletePlayerByIdBinding($values) {
	global $db;
 $query = $db->prepare(DELETE_PLAYER_BY_ID);

 return $query;
 }

  function deleteLeagueByIdBinding($values) {
	global $db;
 $query = $db->prepare(DELETE_LEAGUE_BY_ID);

 return $query;
 }

  function deleteTeamByIdBinding($values) {
		global $db;
 $query = $db->prepare(DELETE_TEAM_BY_ID);

 return $query;
 }

  function deleteSportByIdBinding($values) {
		global $db;
 $query = $db->prepare(DELETE_SPORT_BY_ID);

 return $query;
 }

  function deleteEventByIdBinding($values) {
		global $db;
 $query = $db->prepare(DELETE_EVENT_BY_ID);

 return $query;
 }

  function deletePlaceByIdBinding($values) {
		global $db;
 $query = $db->prepare(DELETE_PLACE_BY_ID);

 return $query;
 }
 
*/

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
    global $dbBindingClass;
    
    $query = null;
    
    if($db != null) {
            switch($values['table_name']) {
            case 'SPORTS':
                //$query = $db->prepare(ADD_SPORT);
                $query = addSportBinding($values);
                break;
            case 'LEAGUE':
                //$query = $db->prepare(ADD_LEAGUE);
                $query = addLeagueBinding($values);
                break;
            case 'USERS':
                //$query = $db->prepare(ADD_USER);
                $query = addUserBinding($values);
                break;
            case 'TEAM':
                //$query = $db->prepare(ADD_TEAM);
                $query = addTeamBinding($values);
                break;
            case 'ENROLLMENT':
                //$query = $db->prepare(ADD_ENROLLMENT);
                $query = addEnrollmentBinding($values);
                break;
            case 'PLACE':
                //$query = $db->prepare(ADD_PLACE);
                $query = addPlaceBinding($values);
                break;
            case 'EVENTS':
                //$query = $db->prepare(ADD_EVENT);
                $query = addEventBinding($values);
                break;
            }
            if($query != null) {
                doInsert($query);
            }
    } 
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
            		switch($values['option']) {
            			case 'get_all':
            				$query = $db->prepare(GET_ALL_SPORTS);
            				break;
            			case 'get_sports_by_coach':
            				$query = getSportsByCoachBinding($values);
            				break;
            			case 'get_sports_by_admin':
            				$query = getSportsByAdminBinding($values);
            				break;
            			case 'get_sports_by_name':
            				$query = getSportByNameBinding($values);
            				break;
            		}
                break;
               
         
            /*
             * LEAGUE TABLE SELECT OPTIONS 
             */
            case 'LEAGUE':
            	switch($values['option']) {
            		case 'get_all':
            			$query = $db->prepare(GET_ALL_LEAGUES);
            			break;
            		case 'get_leagues_by_coach_and_sport':
            			$query = getLeaguesByCoachAndSportBinding($values);
            			break;
            		case 'get_league_by_id':
            			$query = getLeaguesByIdBinding($values);
            			break;
            		case 'get_leagues_by_adminid_and_sportid':
            			$query = getLeaguesByAdminIdSportIdBinding($values);
            			break;
            		case 'get_leagues_by_sportid':
            			$query = getLeaguesBySportIdBinding($values);
            			break;
            	}

            	
			/*
			 * USER TABLE SELECT OPTIONS
			 */
            case 'USERS':
            	switch($values['option']) {
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
            	switch($values['option']) {
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
            	switch($values['option']){
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
            	switch($values['option']) {
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
            	switch($values['option']) {
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
            	switch($values['option']) {
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

function updateOperation($values) {
	//echo "begin update operation\r\n";
	global $db;
	$query = null;
	$result = null;
	
	if($db != null) {
		/*
		 * SWITCH ON WHICH TABLE WE ARE ACTING ON.
		 */
		switch($values['table']) {
			 
			/*
			 * SPORT TABLE UPDATE OPTIONS
			 */
			case 'SPORTS':
				switch($values['option']) {

				}
				break;
				 
				/*
				 * LEAGUE TABLE UPDATE OPTIONS
				 */
			case 'LEAGUE':
				switch($values['option']) {

				}
	
				 
				/*
				 * USER TABLE UPDATE OPTIONS
				 */
			case 'USERS':
				switch($values['option']) {

				}
				break;
	
				/*
				 * TEAM TABLE UPDATE OPTIONS
				 */
			case 'TEAM':
				switch($values['option']) {
					case 'update_team_name':
						$query = $db->prepare(UPDATE_TEAM_NAME);
						break;
					case 'update_team_coach':
						$query = $db->prepare(UPDATE_TEAM_COACH);
						break;
				}
				break;
	
			case 'PLAYER':
				switch($values['option']){

				}
				break;
				 
				/*
				 * ENROLLMENT TABLE UPDATE OPTIONS
				 */
			case 'ENROLLMENT':
				switch($values['option']) {
	
				}
				break;
	
				/*
				 * PLACE TABLE UPDATE OPTIONS
				 */
			case 'PLACE':
				switch($values['option']) {
	
				}
				break;
	
				/*
				 * EVENTS TABLE UPDATE OPTIONS
				 */
			case 'EVENTS':
				switch($values['option']) {

				}
				break;
		}
	
		if($query != null) {
			$result = doPrepUpdate($query);
		}
		echo json_encode($result);
	}
	//echo "end select operation\r\n"
}

function deleteOperation($values) {
	//echo "begin delete operation\r\n";
	global $db;
	$query = null;
	$result = null;

	if($db != null) {
		/*
		 * SWITCH ON WHICH TABLE WE ARE ACTING ON.
		 */
		switch($values['table']) {

			/*
			 * SPORT TABLE DELETE OPTIONS
			 */
			case 'SPORTS':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;
					
				/*
				 * LEAGUE TABLE DELETE OPTIONS
				 */
			case 'LEAGUE':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;

					
				/*
				 * USER TABLE DELETE OPTIONS
				 */
			case 'USERS':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;

				/*
				 * TEAM TABLE DELETE OPTIONS
				 */
			case 'TEAM':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;

			case 'PLAYER':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;
					
				/*
				 * ENROLLMENT TABLE DELETE OPTIONS
				 */
			case 'ENROLLMENT':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;

				/*
				 * PLACE TABLE DELETE OPTIONS
				 */
			case 'PLACE':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;

				/*
				 * EVENTS TABLE DELETE OPTIONS
				 */
			case 'EVENTS':
				switch($values['option']) {
					case 'delete_by_id':
						break;
					case 'delete_all':
						break;
				}
				break;
		}

		if($query != null) {
			$result = doPrepDelete($query);
		}
		echo json_encode($result);
	}
	//echo "end delete operation\r\n"
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