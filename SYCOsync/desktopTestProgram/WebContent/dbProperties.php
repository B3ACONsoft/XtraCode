<?php
/*
    David Johnson
        2/20/2016
*/
////////////////////////////////////////
/*
 * DB CONNECTION PARAMS
 */
 //////////////////////////////////////

define("DSN", "mysql:host=localhost;dbname=remoteData");
define("USERNAME", "root");
define("PASSWORD", "remember");

/*
define("DSN", 'mysql:host=mysql13.000webhost.com;dbname=a7033823_b3acon');
define("USERNAME", 'a7033823_dev');
define("PASSWORD", 'bacon3');
/*
define("VALIDATE_USER", "SELECT user_type 
                         FROM users
                         WHERE (user_id= :user_id)
                                AND
                               (password = :password)");

///////////////////////////////////////
/*
 * 	USER
 */
//////////////////////////////////////
define("GET_ALL_USERS", "SELECT * FROM users");

define("ADD_USER",
		"INSERT INTO users
             (fname, lname, phone, emergency, email, user_type, password)
             VALUES(:fname, :lname, :phone, :emergency, :email, :user_type, :password)");

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

define("DELETE_USER_BY_ID",
		"DELETE FROM users
			WHERE
				user_id = :user_id");
///////////////////////////////////////
/*
 * 	PLAYER
 */
//////////////////////////////////////
define("GET_PLAYERS", "SELECT * FROM player");

define("ADD_PLAYER",
		"INSERT INTO player
            (fname, lname, user_id)
            VALUES(:fname, :lname, :user_id)");

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

define("DELETE_PLAYER_BY_ID",
		"DELETE FROM player
			WHERE
				player_id = :player_id");
///////////////////////////////////////
/*
 *  SPORT
 */
//////////////////////////////////////
define("GET_ALL_SPORTS", "SELECT * FROM sport");

define("ADD_SPORT",
		"INSERT INTO sport
            (sport_name)
            VALUES(:sport_name)");

define("UPDATE_SPORT_ALL_VALUES",
		"UPDATE sport
		SET sport_name = :sport_name
        WHERE sport_id = :sport_id");

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

define("DELETE_SPORT_BY_ID",
		"DELETE FROM sport
			WHERE
				sport_id = :sport_id");
///////////////////////////////////////
/*
 * 	TEAM
 */
//////////////////////////////////////
define("GET_ALL_TEAMS", "SELECT * FROM team");

define("ADD_TEAM",
		"INSERT INTO team
            (league_id, team_name, user_id)
            VALUES(:league_id, :team_name, :user_id)");

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

define("DELETE_TEAM_BY_ID",
		"DELETE FROM team
			WHERE
				team_id = :team_id");
///////////////////////////////////////
/*
 * 	LEAGUE
 */
//////////////////////////////////////
define("GET_ALL_LEAGUES", "SELECT * FROM league");

define("ADD_LEAGUE",
		"INSERT INTO league
            (league_name, sport_id, min_age, max_age, start_date, end_date)
            VALUES(:league_name, :sport_id, :min_age, :max_age, :start_date, :end_date)");

define("UPDATE_LEAGUE_ALL_VALUES",
		"UPDATE league
		SET
			league_name = :league_name,
			sport_id = :sport,
		    min_age = :min_age,
		    max_age =
            (league_name, sport_id, min_age, max_age, start_date, end_date)
            VALUES(:league_name, :sport_id, :min_age, :max_age, :start_date, :end_date)");

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

define("DELETE_LEAGUE_BY_ID",
		"DELETE FROM league
			WHERE
				league_id = :league_id");
///////////////////////////////////////
/*
 * 	ENROLLEMENT
 */
//////////////////////////////////////
define("GET_ALL_ENROLLMENT", "SELECT * FROM enrollment");

define("ADD_ENROLLMENT",
		"INSERT INTO enrollment
            (user_id, player_id, team_id, league_id, enrollment_date, fee)
            VALUES(:user_id, :player_id, :team_id, :league_id, :enrollment_date, :fee)");

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

define("DELETE_ENROLLMENT_BY_ID",
		"DELETE FROM enrollement
			WHERE
				enrollement_id = :enrollement_id");
///////////////////////////////////////
/*
 * 	PLACE
 */
//////////////////////////////////////
define("GET_ALL_PLACES", "SELECT * FROM place");

define("ADD_PLACE",
		"INSERT INTO place
            (place_name, street_address, city, state, zip)
            VALUES(:place_name, :street_address, :city, :state, :zip)");

define("GET_PLACE_BY_ID",
		"SELECT * FROM place
			WHERE
				place_id = :current_place_id");

define("DELETE_PLACE_BY_ID",
		"DELETE FROM place
			WHERE
				place_id = :place_id");
///////////////////////////////////////
/*
 * 	EVENT
 */
//////////////////////////////////////
define("GET_ALL_EVENTS", "SELECT * FROM events");

define("ADD_EVENT",
		"INSERT INTO event
            (event_type, start_date_time, place_id, home_team_id, away_team_id)
            VALUES(:event_type, :start_date, :place_id, :home_team_id, :away_team_id)");

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

define("DELETE_EVENT_BY_ID",
		"DELETE FROM events
			WHERE
				event_id = :event_id");
///////////////////////////////////////
/*
 * 	ATTENDANCE
 */
//////////////////////////////////////
define("GET_ALL_ATTENDANCE", "SELECT * FROM attendance");

define("ADD_ATTENDANCE",
		"INSERT INTO attendance
			(event_id, user_id, status)
			VALUES(:event_id, :user_id, 'NO')");

define("ADMIN_UPDATE_ATTENDANCE_STATUS_MESSAGE",
		"UPDATE attendance
			SET status = :status, message = :message
			WHERE (event_id = :event_id)
				AND
				  (user_id = :user_id)");

//TODO DELETE ATTENDANCE
