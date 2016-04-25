<?php
error_reporting(E_ALL);


include 'dbProperties.php';

class dbPrep {
	
	private $dbReference; 
	
	public function __construct($dbReference) {
		this.$dbReference = $dbReference;
	}
	
	
	///////////////////////////////////////
	//SELECT BINDINGS
	///////////////////////////////////////
	
	//USER
	
	public function getUserByEmailBinding($values) {
		$query = $dbReference->prepare(GET_USER_BY_EMAIL);
		
		return $query;
	}
	
	
	public function getUserByIdBinding($values) {
		$query = $dbReference->prepare(GET_USER_BY_ID);
	
		return $query;
	}
	
	public function getUserByCoachBinding($values) {
		$query = $dbReference->prepare(GET_USER_BY_COACH);
	
		return $query;
	}
	
	public function getUserByTeamBinding($values) {
		$query = $dbReference->prepare(GET_USER_BY_TEAM);
	
		return $query;
	}
	
	//PLAYER
	
	
	public function getPlayerByTeamBinding($values) {
		$query = $dbReference->prepare(GET_PLAYER_BY_TEAM);
	
		return $query;
	}
	
	public function getPlayerByIdBinding($values) {
		$query = $dbReference->prepare(GET_PLAYER_BY_ID);
	
		return $query;
	}
	
	public function getPlayerByFirstLastPlayerIdBinding($values) {
		$query = $dbReference->prepare(GET_PLAYER_BY_FIRST_LAST_PLAYERID);
	
		return $query;
	}
	
	public function getPlayerByFirstLastUserIdBinding($values) {
		$query = $dbReference->prepare(GET_PLAYER_BY_FIRST_LAST_USER_ID);
	
		return $query;
	}
	
	
	//SPORT
	
	public function getSportsByCoachBinding($values) {
		$query = $dbReference->prepare(GET_SPORTS_BY_COACH);
	
		return $query;
	}
	
	public function getSportsByAdminBinding($values) {
		$query = $dbReference->prepare(GET_SPORTS_BY_ADMIN);
	
		return $query;
	}
	
	public function getSportByNameBinding($values) {
		$query = $dbReference->prepare(GET_SPORT_BY_NAME);
	
		return $query;
	}
	
	//TEAM
	
	public function getTeamByTeamIdBinding($values) {
		$query = $dbReference->prepare(GET_TEAM_BY_TEAM_ID);
	
		return $query;
	}
	
	public function getTeamByCoachBinding($values) {
		$query = $dbReference->prepare(GET_TEAM_BY_COACH_ID);
	
		return $query;
	}
	
	public function getTeamsByLeagueBinding($values) {
		$query = $dbReference->prepare(GET_TEAM_BY_LEAGUE);
	
		return $query;
	}
	
	
	 //LEAGUE
	 
	public function getLeaguesByCoachAndSportBinding($values) {
		$query = $dbReference->prepare(GET_LEAGUES_BY_COACH_AND_SPORT);
	
		return $query;
	}
	
	public function getLeaguesByIdBinding($values) {
		$query = $dbReference->prepare(GET_LEAGUES_BY_ID);
	
		return $query;
	}
	
	public function getLeaguesByAdminIdSportIdBinding($values) {
		$query = $dbReference->prepare(GET_LEAGUES_BY_ADMINID_SPORTID);
	
		return $query;
	}
	
	public function getLeaguesBySportIdBinding($values) {
		$query = $dbReference->prepare(GET_LEAGUES_BY_SPORTID);
	
		return $query;
	}
	
	//EVENT 
	
	public function getEventByTeamBinding($values) {
		$query = $dbReference->prepare(GET_EVENTS_BY_TEAM);
	
		return $query;
	}
	
	public function getEventByPlaceIdBinding($values) {
		$query = $dbReference->prepare(GET_EVENTS_BY_PLACEID);
	
		return $query;
	}
	

	//PLACE
	
	public function getPlaceByIdBinding($values) {
		$query = $dbReference->prepare(GET_PLACE_BY_ID);
	
		return $query;
	}
	
	
	//ENROLLMENT
	
	public function getEnrollmentByUserIdLeagueIdTeamIdBinding($values) {
		$query = $dbReference->prepare(GET_ENROLLMENT_BY_USER_ID_LEAGUEID_TEAMID);
	
		return $query;
	}
	
	public function getEnrollmentBy_playerid_userid_currentleague_currentteam_Binding($values) {
		$query = $dbReference->prepare(GET_ENROLLMENT_BY_PLAYERID_USERID_CURRENTLEAGUE_CURRENTTEAM);
	
		return $query;
	}
	
	//ATTENDANCE
	
	///////////////////////////////////////
	//INSERT BINDINGS
	////////////////////////////////////////
	
	
	public function addSportBinding($values) {
		$query = $dbReference->prepare(ADD_SPORT);
		$query->bindParam(':sport_name', $values['sport_name']);
		
		return $query;
	}

	public function addLeagueBinding($values) {
		
		$query = $dbReference->prepare(ADD_LEAGUE);
		
		$query->bindParam(':league_name', $values['league_name']);
		$query->bindParam(':sport_id', $values['sport_id']);
		$query->bindParam(':min_age', $values['min_age']);
		$query->bindParam(':max_age', $values['max_age']);
		$query->bindParam(':start_date', $values['start_date']);
		$query->bindParam(':end_date', $values['end_date']);
		
		return $query;
	}
	
	
	public function addUserBinding($values) {
		
		$query = $dbReference->prepare(ADD_USER);
		
		$query->bindParam(':fname', $values['fname']);
		$query->bindParam(':lname', $values['lname']);
		$query->bindParam(':phone', $values['phone']);
		$query->bindParam(':emergency', $values['emergency']);
		$query->bindParam(':email', $values['email']);
		$query->bindParam(':user_type', $values['user_type']);
		$query->bindParam(':password', $values['password']);
		
		return $query;
	}
	
	
	public function addTeamBinding($values) {
		
		$query = $dbReference->prepare(ADD_TEAM);
		
		$query->bindParam(':league_id', $values['league_id']);
		$query->bindParam(':team_name', $values['team_name']);
		$query->bindParam(':user_id', $values['user_id']);
		
		return $query;
	}
	

	public function addEnrollmentBinding($values) {
		
		$query = $dbReference->prepare(ADD_ENROLLMENT);
		
		$query->bindParam(':user_id', $values['user_id']);
		$query->bindParam(':player_id', $values['player_id']);
		$query->bindParam(':team_id', $values['team_id']);
		$query->bindParam(':league_id', $values['league_id']);
		$query->bindParam(':enrollment_date', $values['enrollment_date']);
		$query->bindParam(':fee', $values['fee']);
		
		return $query;
	}
	
	
	public function addPlaceBinding($values) {
		
		$query = $dbReference->prepare(ADD_PLACE);
		
		$query->bindParam(':place_name', $values['place_name']);
		$query->bindParam(':street_address', $values['street_address']);
		$query->bindParam(':city', $values['city']);
		$query->bindParam(':state', $values['state']);
		$query->bindParam(':zip', $values['zip']);
		$query->bindParam(':fee', $values['fee']);
		
		return $query;
	}
	
	
	public function addEventBinding($values) {
		
		$query = $dbReference->prepare(ADD_EVENT);
		
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
	
	public function updateSportAllValuesBinding($values) {
		
		$query = $dbReference->prepare(UPDATE_SPORT_ALL_VALUES);
		
		return $query;
	}
	
	public function updateTeamCoachBinding($values) {
	
		$query = $dbReference->prepare(UPDATE_TEAM_COACH);
	
		return $query;
	}
	
	public function updateTeamNameBinding($values) {
	
		$query = $dbReference->prepare(UPDATE_TEAM_NAME);
	
		return $query;
	}
	
	public function updateTeamCoachBinding($values) {
	
		$query = $dbReference->prepare(UPDATE_TEAM_BY_COACH);
	
		return $query;
	}
	
	public function updateSportAllValuesBinding($values) {
	
		$query = $dbReference->prepare(UPDATE_LEAGUE_ALL_VALUES);
	
		return $query;
	}
	
	public function updateAttendanceBinding($values) {
	
		$query = $dbReference->prepare(ADMIN_UPDATE_ATTENDANCE_STATUS_MESSAGE);
	
		return $query;
	}
	
	///////////////////////////////////////
	//DELETE BINDINGS
	////////////////////////////////////////
	
	/*
	public function deleteUserByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_USER_BY_ID);
	
		return $query;
	}
	
	public function deletePlayerByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_PLAYER_BY_ID);
	
		return $query;
	}
	
	public function deleteLeagueByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_LEAGUE_BY_ID);
	
		return $query;
	}
	
	public function deleteTeamByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_TEAM_BY_ID);
	
		return $query;
	}
	
	public function deleteSportByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_SPORT_BY_ID);
	
		return $query;
	}
	
	global $db;
	$query = $db->prepare(GET_USER_BY_EMAIL);
	
	public function deleteEventByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_EVENT_BY_ID);
	
		return $query;
	}
	
	public function deletePlaceByIdBinding($values) {
	
		$query = $dbReference->prepare(DELETE_PLACE_BY_ID);
	
		return $query;
	}
	
	//TODO DELETE ATTENDANCE BINDING
*/
}
?>