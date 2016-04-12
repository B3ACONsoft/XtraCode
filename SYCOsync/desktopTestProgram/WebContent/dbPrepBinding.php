<?php

include('dbProperties.php');

/*
 * This class encapulates the bind for the prepared statements
 * so I can all that damn code out of the dbConnection class :)
 * 
 * This class is pretty tightly coupled to the PDO object that is used in its constuctor...
 */
class dbPrepBinding {
	
	private $dbRefence; 
	
	function __construct($dbReference) {
		this.$dbReference = $dbReference;
	}
	
	
	///////////////////////////////////////
	/*
	 * 	SELECT BINDINGS
	 */
	///////////////////////////////////////
	
	/*
	 * USER
	 */
	function getUserByEmailBinding($values) {
		$query = GET_USER_BY_EMAIL;
		
		return $query;
	}
	
	function getUserByIdBinding($values) {
		$query = GET_USER_BY_ID;
	
		return $query;
	}
	
	function getUserByCoachBinding($values) {
		$query = GET_USER_BY_COACH;
	
		return $query;
	}
	
	function getUserByTeamBinding($values) {
		$query = GET_USER_BY_TEAM;
	
		return $query;
	}
	
	/*
	 * PLAYER
	 */
	function getPlayerByTeamBinding($values) {
		$query = GET_PLAYER_BY_TEAM;
	
		return $query;
	}
	
	function getPlayerByIdBinding($values) {
		$query = GET_PLAYER_BY_ID;
	
		return $query;
	}
	
	function getPlayerByFirstLastPlayerIdBinding($values) {
		$query = GET_PLAYER_BY_FIRST_LAST_PLAYERID;
	
		return $query;
	}
	
	function getPlayerByFirstLastUserIdBinding($values) {
		$query = GET_PLAYER_BY_FIRST_LAST_USER_ID;
	
		return $query;
	}
	
	/*
	 * SPORT
	 */
	function getSportsByCoachBinding($values) {
		$query = GET_SPORTS_BY_COACH;
	
		return $query;
	}
	
	function getSportsByAdminBinding($values) {
		$query = GET_SPORTS_BY_ADMIN;
	
		return $query;
	}
	
	function getSportByNameBinding($values) {
		$query = GET_SPORT_BY_NAME;
	
		return $query;
	}
	
	/*
	 * TEAM
	 */
	function getTeamByTeamIdBinding($values) {
		$query = GET_TEAM_BY_TEAM_ID;
	
		return $query;
	}
	
	function getTeamByCoachBinding($values) {
		$query = GET_TEAM_BY_COACH_ID;
	
		return $query;
	}
	
	function getTeamsByLeagueBinding($values) {
		$query = GET_TEAM_BY_LEAGUE;
	
		return $query;
	}
	
	/*
	 * LEAGUE
	 */
	function getLeaguesByCoachAndSportBinding($values) {
		$query = GET_LEAGUES_BY_COACH_AND_SPORT;
	
		return $query;
	}
	
	function getLeaguesByIdBinding($values) {
		$query = GET_LEAGUES_BY_ID;
	
		return $query;
	}
	
	function getLeaguesByAdminIdSportIdBinding($values) {
		$query = GET_LEAGUES_BY_ADMINID_SPORTID;
	
		return $query;
	}
	
	function getLeaguesBySportIdBinding($values) {
		$query = GET_LEAGUES_BY_SPORTID;
	
		return $query;
	}
	/*
	 * EVENT
	 */
	function getEventByTeamBinding($values) {
		$query = GET_EVENTS_BY_TEAM;
	
		return $query;
	}
	
	function getEventByPlaceIdBinding($values) {
		$query = GET_EVENTS_BY_PLACEID;
	
		return $query;
	}
	

	/*
	 * PLACE
	 */
	function getPlaceByIdBinding($values) {
		$query = GET_PLACE_BY_ID;
	
		return $query;
	}
	/*
	 * ENROLLMENT
	 */
	function getEnrollmentByUserIdLeagueIdTeamIdBinding($values) {
		$query = GET_ENROLLMENT_BY_USER_ID_LEAGUEID_TEAMID;
	
		return $query;
	}
	
	function getEnrollmentBy_playerid_userid_currentleague_currentteam_Binding($values) {
		$query = GET_ENROLLMENT_BY_PLAYERID_USERID_CURRENTLEAGUE_CURRENTTEAM;
	
		return $query;
	}
	/*
	 * ATTENDANCE
	 */
	///////////////////////////////////////
	/*
	 * INSERT BINDINGS
	 */
	////////////////////////////////////////
	/**
	 * Binds the values needed to insert a sport
	 */
	function addSportBinding($values) {
		$query = ADD_SPORT;
		$query->bindParam(':sport_name', $values['sport_name']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert a league
	 */
	function addLeagueBinding($values) {
		
		$query = ADD_LEAGUE;
		
		$query->bindParam(':league_name', $values['league_name']);
		$query->bindParam(':sport_id', $values['sport_id']);
		$query->bindParam(':min_age', $values['min_age']);
		$query->bindParam(':max_age', $values['max_age']);
		$query->bindParam(':start_date', $values['start_date']);
		$query->bindParam(':end_date', $values['end_date']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert a user.
	 *
	 * @param unknown $query
	 * @param unknown $values
	 */
	function addUserBinding($values) {
		
		$query = ADD_USER;
		
		$query->bindParam(':fname', $values['fname']);
		$query->bindParam(':lname', $values['lname']);
		$query->bindParam(':phone', $values['phone']);
		$query->bindParam(':emergency', $values['emergency']);
		$query->bindParam(':email', $values['email']);
		$query->bindParam(':user_type', $values['user_type']);
		$query->bindParam(':password', $values['password']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert a team
	 */
	function addTeamBinding($values) {
		
		$query = ADD_TEAM;
		
		$query->bindParam(':league_id', $values['league_id']);
		$query->bindParam(':team_name', $values['team_name']);
		$query->bindParam(':user_id', $values['user_id']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert an enrollment record.
	 *
	 * @param unknown $query
	 * @param unknown $values
	 */
	function addEnrollmentBinding($values) {
		
		$query = ADD_ENROLLMENT;
		
		$query->bindParam(':user_id', $values['user_id']);
		$query->bindParam(':player_id', $values['player_id']);
		$query->bindParam(':team_id', $values['team_id']);
		$query->bindParam(':league_id', $values['league_id']);
		$query->bindParam(':enrollment_date', $values['enrollment_date']);
		$query->bindParam(':fee', $values['fee']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert a place.
	 *
	 * @param unknown $query
	 * @param unknown $values
	 */
	function addPlaceBinding($values) {
		
		$query = ADD_PLACE;
		
		$query->bindParam(':place_name', $values['place_name']);
		$query->bindParam(':street_address', $values['street_address']);
		$query->bindParam(':city', $values['city']);
		$query->bindParam(':state', $values['state']);
		$query->bindParam(':zip', $values['zip']);
		$query->bindParam(':fee', $values['fee']);
		
		return $query;
	}
	
	/**
	 * Binds the values needed to insert an event.
	 *
	 * @param unknown $query
	 * @param unknown $values
	 */
	function addEventBinding($values) {
		
		$query = ADD_EVENT;
		
		$query->bindParam(':event_type', $values['event_type']);
		$query->bindParam(':start_date', $values['start_date']);
		$query->bindParam(':place_id', $values['place_id']);
		$query->bindParam(':home_team_id', $values['home_team_id']);
		$query->bindParam(':away_team_id', $values['away_team_id']);
		
		return $query;
	}
	
	///////////////////////////////////////
	/*
	 * UPDATE BINDINGS
	 */
	////////////////////////////////////////
	
	function updateSportAllValuesBinding($values) {
		
		$query = UPDATE_SPORT_ALL_VALUES;
		
		return $query;
	}
	
	function updateTeamCoachBinding($values) {
	
		$query = UPDATE_TEAM_COACH;
	
		return $query;
	}
	
	function updateTeamNameBinding($values) {
	
		$query = UPDATE_TEAM_NAME;
	
		return $query;
	}
	
	function updateTeamCoachBinding($values) {
	
		$query = UPDATE_TEAM_BY_COACH;
	
		return $query;
	}
	
	function updateSportAllValuesBinding($values) {
	
		$query = UPDATE_LEAGUE_ALL_VALUES;
	
		return $query;
	}
	
	function updateAttendanceBinding($values) {
	
		$query = ADMIN_UPDATE_ATTENDANCE_STATUS_MESSAGE;
	
		return $query;
	}
	
	///////////////////////////////////////
	/*
	 * DELETE BINDINGS
	 */
	////////////////////////////////////////
	
	function deleteUserByIdBinding($values) {
	
		$query = DELETE_USER_BY_ID;
	
		return $query;
	}
	
	function deletePlayerByIdBinding($values) {
	
		$query = DELETE_PLAYER_BY_ID;
	
		return $query;
	}
	
	function deleteLeagueByIdBinding($values) {
	
		$query = DELETE_LEAGUE_BY_ID;
	
		return $query;
	}
	
	function deleteTeamByIdBinding($values) {
	
		$query = DELETE_TEAM_BY_ID;
	
		return $query;
	}
	
	function deleteSportByIdBinding($values) {
	
		$query = DELETE_SPORT_BY_ID;
	
		return $query;
	}
	
	function deleteEventByIdBinding($values) {
	
		$query = DELETE_EVENT_BY_ID;
	
		return $query;
	}
	
	function deletePlaceByIdBinding($values) {
	
		$query = DELETE_PLACE_BY_ID;
	
		return $query;
	}
	
	//TODO DELETE ATTENDANCE BINDING
}
?>