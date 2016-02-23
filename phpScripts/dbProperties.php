<?php

//connection params
define("DSN", "mysql:host=localhost;dbname=remoteData");
define("USERNAME", "root");
define("PASSWORD", "remember");


define("GET_ALL_SPORTS", "SELECT * FROM sport");
define("GET_ALL_LEAGUES", "SELECT * FROM league");
define("GET_ALL_USERS", "SELECT * FROM users");
define("GET_ALL_TEAMS", "SELECT * FROM team");
define("GET_ALL_ENROLLMENT", "SELECT * FROM enrollment");
define("GET_ALL_PLACES", "SELECT * FROM place");
define("GET_ALL_EVENTS", "SELECT * FROM events");


define("ADD_SPORT", "NOTHING FOR NOW");
define("ADD_LEAGUE", "NOTHING FOR NOW");
define("ADD_USER", 
       "INSERT INTO users 
             (fname, lname, phone, emergency, email, user_type, password) 
             VALUES(:fname, :lname, :phone, :emergency, :email, :user_type, :password)");
define("ADD_TEAM", "nOTHING FOR NOW");
define("ADD_ENROLLMENT", "NOTHING FOR NOW");
define("ADD_PLACE", "NOTHING FOR NOW");
define("ADD_EVENT", "NOTHING FOR NOW");
             
?>