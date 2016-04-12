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
}
?>