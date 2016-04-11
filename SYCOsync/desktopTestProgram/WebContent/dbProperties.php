<?php
/*
    David Johnson
        2/20/2016
*/
//connection params
/*
 * 
 */
/*
define("DSN", "mysql:host=localhost;dbname=remoteData");
define("USERNAME", "root");
define("PASSWORD", "remember");
*/

define("DSN", 'mysql:host=mysql13.000webhost.com;dbname=a7033823_b3acon');
define("USERNAME", 'a7033823_dev');
define("PASSWORD", 'bacon3');

define("VALIDATE_USER", "SELECT user_type 
                         FROM users
                         WHERE (user_id= :user_id)
                                AND
                               (password = :password)");

/////////////////////////////////////
/*
    ADMIN PRIVLEDGE QUERIES
*/
////////////////////////////////////
define("GET_ALL_SPORTS", "SELECT * FROM sport");
define("GET_ALL_LEAGUES", "SELECT * FROM league");
define("GET_ALL_USERS", "SELECT * FROM users");
define("GET_PLAYERS", "SELECT * FROM player");
define("GET_ALL_TEAMS", "SELECT * FROM team");
define("GET_ALL_ENROLLMENT", "SELECT * FROM enrollment");
define("GET_ALL_PLACES", "SELECT * FROM place");
define("GET_ALL_EVENTS", "SELECT * FROM events");
define("GET_ALL_ATTENDANCE", "SELECT * FROM attendance");


define("ADD_SPORT",
       "INSERT INTO sport
            (sport_name)
            VALUES(:sport_name)");
            
define("ADD_LEAGUE",
       "INSERT INTO league
            (league_name, sport_id, min_age, max_age, start_date, end_date)
            VALUES(:league_name, :sport_id, :min_age, :max_age, :start_date, :end_date)");
            
define("ADD_USER", 
       "INSERT INTO users 
             (fname, lname, phone, emergency, email, user_type, password) 
             VALUES(:fname, :lname, :phone, :emergency, :email, :user_type, :password)");
             
define("ADD_TEAM", 
       "INSERT INTO team
            (league_id, team_name, user_id)
            VALUES(:league_id, :team_name, :user_id)");

define("ADD_PLAYER",
       "INSERT INTO player
            (fname, lname, user_id)
            VALUES(:fname, :lname, :user_id)");
            
define("ADD_EVENT", 
       "INSERT INTO event
            (event_type, start_date_time, place_id, home_team_id, away_team_id)
            VALUES(:event_type, :start_date, :place_id, :home_team_id, :away_team_id)");
            
define("ADD_ENROLLMENT", 
       "INSERT INTO enrollment
            (user_id, player_id, team_id, league_id, enrollment_date, fee)
            VALUES(:user_id, :player_id, :team_id, :league_id, :enrollment_date, :fee)");
            
define("ADD_PLACE", 
       "INSERT INTO place
            (place_name, street_address, city, state, zip)
            VALUES(:place_name, :street_address, :city, :state, :zip)");

define("ADD_ATTENDANCE",
		"INSERT INTO attendance
			(event_id, user_id, status)
			VALUES(:event_id, :user_id, 'NO')");

/*
 * updates start here...
 */

define("ADMIN_UPDATE_ATTENDANCE",
		"UPDATE attendance
			SET status = :status, message = :message
			WHERE (event_id = :event_id)
				AND
				  (user_id = :user_id)");

define("UPDATE_SPORT",
		"UPDATE sport
		SET sport_name = :sport_name
        WHERE sport_id = :sport_id");

define("UPDATE_LEAGUE",
		"UPDATE league
		SET 
			league_name = :league_name, 
			sport_id = :sport, 
		    min_age = :min_age,
		    max_age =  
            (league_name, sport_id, min_age, max_age, start_date, end_date)
            VALUES(:league_name, :sport_id, :min_age, :max_age, :start_date, :end_date)");

define("ADD_USER",
		"INSERT INTO users
             (fname, lname, phone, emergency, email, user_type, password)
             VALUES(:fname, :lname, :phone, :emergency, :email, :user_type, :password)");
 
define("ADD_TEAM",
		"INSERT INTO team
            (league_id, team_name, user_id)
            VALUES(:league_id, :team_name, :user_id)");

define("ADD_PLAYER",
		"INSERT INTO player
            (fname, lname, user_id)
            VALUES(:fname, :lname, :user_id)");

define("ADD_EVENT",
		"INSERT INTO event
            (event_type, start_date_time, place_id, home_team_id, away_team_id)
            VALUES(:event_type, :start_date, :place_id, :home_team_id, :away_team_id)");

define("ADD_ENROLLMENT",
		"INSERT INTO enrollment
            (user_id, player_id, team_id, league_id, enrollment_date, fee)
            VALUES(:user_id, :player_id, :team_id, :league_id, :enrollment_date, :fee)");

define("ADD_PLACE",
		"INSERT INTO place
            (place_name, street_address, city, state, zip)
            VALUES(:place_name, :street_address, :city, :state, :zip)");

/*
 * 
 * BELOW ARE QUERIES WHICH ARE COVERSION FROM THE DATASOURCE.JAVA CLASS
 * 
 * 
 * START CONVERSION
 */

//START SPORT SECTION
define("GET_SPORTS_BY_COACH",
		"SELECT
			s.sport_id,
			s.sport_name
		FROM
			sport s,
			league l,
			team t
		WHERE
			t.user_id = :coach_id
				AND
			t.league_id = l.league_id
				AND
			l.sport_id = s.sport_id");

define("GET_SPORTS_BY_ADMIN",
		"SELECT
			s.sport_id,
			s.sport_name
		FROM
			sport s,
			league l
		WHERE
			l.user_id = :current_admin_id
				AND
			l.sport_id = s.sport_id");

define("GET_SPORT_BY_NAME",
		"SELECT * FROM sport
			WHERE
				sport_name = :sport_name");
//END SPORT SECTION

//START USER SECTION
define("GET_USER_BY_EMAIL",
		"SELECT * FROM users
			WHERE email = :email");

define("GET_USER_BY_ID",
	    "SELECT * FROM users
			WHERE
				user_id = :user_id");

define("GET_USERS_BY_COACH",
		"SELECT
			u.user_id,
			u.fname,
			u.lname,
			u.phone,
			u.emergency,
			u.email,
			u.user_type,
			u.password
		FROM users u
			WHERE
				user_type = 'COACH'
					EXCEPT SELECT
						u.user_id,
						u.fname,
						u.lname,
						u.phone,
						u.emergency,
						u.email,
						u.user_type,
						u.password
							FROM users u, team t
								WHERE
									u.user_id = t.user_id
										AND
									t.league_id = :current_league_id");

define("GET_USERS_BY_TEAM",
			"SELECT			
				u.user_id,
				u.fname,
				u.lname,
				u.phone,
				u.emergency,
				u.email,
				u.user_type,
				u.password
			FROM users u, enrollment e
				WHERE
					u.user_id = e.user_id
						AND
					e.team_id = :current_team_id");
//END USER SECTION

//START LEAGUE SECTION
define("GET_LEAGUES_BY_COACH_AND_SPORT",
			"SELECT
				l.leauge_id,
				l.user_id,
				l.sport_id,
				l.league_name,
				l.min_age,
				l.max_age,
				l.start_date,
				l.end_date
			FROM
				league l, team t
			WHERE
				t.user_id = :coach_id
					AND
		        t.league_id = l.league_id
					AND
				l.sport_id = :sport_id");

define("GET_LEAGUE_BY_ID",
		"SELECT * FROM league
			WHERE
				league_id = :league_id");

define("GET_LEAGUES_BY_ADMINID_SPORTID",
		"SELECT * FROM league
			WHERE
				user_id = :current_admin_id
					AND
				sport_id = :current_sport_id");

define("GET_LEAGUES_BY_SPORTID",
		"SELECT * FROM league
			WHERE
				sport_id = :current_sport_id");
//END LEAGUE SECTION

//START TEAM SECTION
define("GET_TEAM_BY_TEAM_ID",
		"SELECT * FROM team
			WHERE team_id = :team_id");

define("UPDATE_TEAM_COACH", 
		"UPDATE team
			SET
				user_id = :user_id
			WHERE
				team_id = :team_id"
		);

define("UPDATE_TEAM_NAME",
		"UPDATE team
			SET
				team_name = :team_name
			WHERE
				team_id = :team_id");

define("GET_TEAMS_BY_COACH",
		"SELECT * FROM team
			WHERE team_id = :current_user_id
				AND
				  league_id = :current_league_id");

define("GET_GET_TEAMS_BY_LEAGUE",
		"SELECT * FROM team
			WHERE
				user_id = :current_user_id
					AND
				league_id = :current_league_id");
//END TEAM SECTION

//START PLAYER SECTION
define("GET_PLAYERS_BY_TEAM",
		"SELECT p.player_id,
				p.fname,
				p.lname,
				p.user_id
		FROM
			player p,
			enrollment e
		WHERE
			p.player_id = e.player_id
				AND
			e.team_id = :current_team_id");

define("GET_PLAYER_BY_ID",
		"SELECT * FROM player
			WHERE
				player_id = :current_player_id");

define("GET_PLAYER_BY_FIRST_LAST_PLAYER_ID",
		"SELECT * FROM player
			WHERE
				fname = :current_first_name
					AND
				lname = :current_last_name
					AND
				player_id = :current_player_id");

define("GET_PLAYER_BY_FIRST_LAST_USER_ID",
		"SELECT * FROM player
			WHERE
				fname = :current_first_name
					AND
				lname = current_last_name
					AND
				user_id = :current_user_id");
//END PLAYER SECTION

//START ENROLLEMENT SECTION
//TODO UPDATE_COACH_ENROLLMENT_BY_TEAMID_LEAGUEID
define("GET_ENROLLMENT_BY_USERID_LEAGUEID_TEAMID",
			"SELECT * FROM enrollment
				WHERE 
					user_id = :current_userid
						AND
					league_id = :current_league_id
						AND
					team_id = :current_team_id");

define("GET_ENROLLMENT_BY_PLAYERID_USERID_CURRENTLEAGUE_CURRENTTEAM",
		"SELECT * FROM enrollment
			WHERE 
				player_id = :current_player_id
					AND
				user_id = :current_user_id
					AND
				league_id = :current_league_id
					AND
				team_id = :current_team_id");
//END ENROLLMENT SECTION

//START PLACE SECTION
define("GET_PLACE_BY_ID",
		"SELECT * FROM place
			WHERE
				place_id = :current_place_id");
//END PLACE SECTION

//START EVENT SECTION
define("GET_EVENTS_BY_TEAM",
		"SELECT * FROM events
			WHERE
				home_team_id = :home_team_id
					OR
				away_team_id = :away_team_id");

define("GET_EVENTS_BY_PLACEID",
		"SELECT * FROM events
			WHERE
				place_id = :place_id");
//END EVENT SECTION

//START ATTENDANCE SECTION

//END ATTENDANCE SECTION

/*
 * 
 * END CONVERSION
 * 
 */
////////////////////////////////////
/*
    COACH PRIVLEDGE QUERIES
*/
///////////////////////////////////
define("GET_COACH_SPORTS", "NOTHING FOR NOW");      //do we really need this for a coach?
define("GET_COACH_LEAGUES", "NOTHING FOR NOW");     //de we really need this for a coach?

//get all players that a given coach is responsible for
define("GET_COACH_PLAYERS", 
        "SELECT p.user_id, p.player_id, p.fname, p.lname FROM team t, player p, users u, enrollment e
            WHERE t.team_id = :team_id 
			AND t.user_id = :coach_user_id
			AND t.team_id = e.team_id
			AND e.user_id = p.user_id)");

//get all enrollment data that concerns a given coach                 
define("GET_COACH_ENROLLEMENT",
        "NOTHING FOR NOW");

//get attendance data that a concerns a given coach
define("GET_COACH_ATTENDANCE", 
       "NOTHING FOR NOW");

//get all places that concern a given coach
define("GET_COACH_PLACES", 
       "NOTHING FOR NOW");

//get all relevant events
define("GET_COACH_EVENTS",
       "NOTHING FOR NOW");
       
//add a player to a team                            //can a coach do this?
//define("ADD_PLAYER", 
//       "NOTHING FOR NOW");

//change properties for a given event               //can a coach do this?
define("UPDATE_EVENT", 
       "NOTHING FOR NOW");

//////////////////////////////////
/*
    USER PRIVLEDGE QUERIES
*/
/////////////////////////////////
//get the leagues a player is in
define("GET_PLAYER_LEAGUES", "NOTHING FOR NOW");

//get the enrollment information for a user
//so all players associated with a user right?
define("GET_PLAYER_ENROLLMENT", "NOTHING FOR NOW");

//get attendance records relevant to a user
define("GET_PLAYER_ATTENDANCE", "NOTHING FOR NOW");

//get places relevant to a user
define("GET_PLAYER_PLACES", "NOTHING FOR NOW");

//events relevant to a user
define("GET_PLAYER_EVENTS", "NOTHING FOR NOW");

//update an attendance record, ie "coming" or "not coming"
define("UPDATE_PLAYER_ATTENDANCE", "NOTHING FOR NOW");

/////////////////////////////////////
/*
 * Deletes... 
 *
 */
///////////////////////////////////////////
