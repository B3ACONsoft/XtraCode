<?php
/*
    David Johnson
        2/20/2016
*/
//connection params
define("DSN", "mysql:host=localhost;dbname=remoteData");
define("USERNAME", "root");
define("PASSWORD", "remember");

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
define("GET_ALL_TEAMS", "SELECT * FROM team");
define("GET_ALL_ENROLLMENT", "SELECT * FROM enrollment");
define("GET_ALL_PLACES", "SELECT * FROM place");
define("GET_ALL_EVENTS", "SELECT * FROM events");

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
define("ADD_PLAYER", 
       "NOTHING FOR NOW");

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
