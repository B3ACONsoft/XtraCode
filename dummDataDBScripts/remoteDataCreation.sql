DROP DATABASE IF EXISTS remoteData;
CREATE DATABASE remoteData;
USE remoteData;
/*"USER" IS A RESERVED WORD. IN ITS PLACE IVE WRITTEN "USERS" WHERE OUT IN THE OPEN AND "USER_ID" IN CASES WHERE IT MADE SENSE!!!*/
/* http://programmerguru.com/android-tutorial/how-to-sync-remote-mysql-db-to-sqlite-on-android/*/
/* www.simplifiedcoding.net CRUD for PHP and Android 
https://www.simplifiedcoding.net/android-php-mysql-login-tutorial-android-login-app-3/
*/
DROP TABLE IF EXISTS place;
DROP TABLE IF EXISTS enrollment;
DROP TABLE IF EXISTS attendance;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS player;
DROP TABLE IF EXISTS team;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS league;
DROP TABLE IF EXISTS sport;


DROP TABLE IF EXISTS sequence_data;

CREATE TABLE sequence_data (
	`sequence_name` varchar(100) NOT NULL,
	`sequence_increment` int(11) unsigned NOT NULL DEFAULT 1,
	`sequence_min_value` int(11) unsigned NOT NULL DEFAULT 1,
	`sequence_max_value` bigint(20) unsigned NOT NULL DEFAULT 18446744073709551615,
	`sequence_cur_value` bigint(20) unsigned DEFAULT 1,
	`sequence_cycle` boolean NOT NULL DEFAULT FALSE,
	PRIMARY KEY (`sequence_name`)
) ENGINE=MyISAM;

/*Create sequences*/
INSERT INTO sequence_data (sequence_name) VALUE ('league_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('sport_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('users_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('enrollment_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('events_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('place_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('attendance_seq');
INSERT INTO sequence_data (sequence_name) VALUE ('player_seq');



/*Create tables*/
CREATE TABLE sport (
  sport_id    BIGINT AUTO_INCREMENT NOT NULL,
  sport_name  VARCHAR(20) NOT NULL,
  CONSTRAINT pk_sport PRIMARY KEY (sport_id));
  
CREATE TABLE league (
  league_id   BIGINT(10) AUTO_INCREMENT NOT NULL,
  league_name VARCHAR(40) NOT NULL,
  sport_id    BIGINT(10) NOT NULL,
  min_age     BIGINT(10) NOT NULL DEFAULT 4,
  max_age     BIGINT(10) NOT NULL DEFAULT 65,
  start_date  DATE NOT NULL, 
  end_date    DATE NOT NULL,
  CONSTRAINT pk_league PRIMARY KEY (league_id),
  CONSTRAINT fk_sport_id FOREIGN KEY (sport_id) REFERENCES sport (sport_id));

CREATE TABLE team (
  team_id     BIGINT(10) AUTO_INCREMENT NOT NULL,
  league_id   BIGINT(10) NOT NULL,
  team_name   VARCHAR(40) NOT NULL,
  user_id     BIGINT(10) NOT NULL,   /* need a coach for the user_id */
  CONSTRAINT pk_team PRIMARY KEY (team_id, league_id),
  CONSTRAINT fk_team_league_id FOREIGN KEY (league_id) REFERENCES league(league_id));
  
CREATE TABLE users (
  user_id   BIGINT(10) AUTO_INCREMENT NOT NULL,
  fname     VARCHAR(20) NOT NULL,
  lname     VARCHAR(20) NOT NULL,
  phone     BIGINT(10) NOT NULL,
  emergency BIGINT(10) NOT NULL,
  email     VARCHAR(40) NOT NULL,
  user_type VARCHAR(6) NOT NULL,
  password  VARCHAR(15) NOT NULL,
  CONSTRAINT pk_users PRIMARY KEY (user_id));

CREATE TABLE player (
  player_id BIGINT(10) AUTO_INCREMENT NOT NULL,
  fname     VARCHAR(20) NOT NULL,
  lname     VARCHAR(20) NOT NULL,
  user_id   BIGINT(10) NOT NULL,
  CONSTRAINT pk_player_id PRIMARY KEY (player_id),
  CONSTRAINT fk_player_user_id FOREIGN KEY (user_id) REFERENCES users(user_id));
  
  
   
/*add a fee field*/
CREATE TABLE enrollment (
  enrollment_id BIGINT(10) AUTO_INCREMENT NOT NULL,
  user_id   BIGINT(10) NOT NULL,
  player_id BIGINT(10) NOT NULL,
  team_id   BIGINT(10) NOT NULL,
  league_id BIGINT(10) NOT NULL,
  enrollment_date DATE NOT NULL,
  fee       BIGINT(10) NOT NULL,
  CONSTRAINT pk_enrollment PRIMARY KEY (user_id, team_id),
  CONSTRAINT uk_enrollment UNIQUE (enrollment_id),
  CONSTRAINT fk_enrollment_user_id FOREIGN KEY (user_id) REFERENCES users(user_id),
  CONSTRAINT fk_enrollment_team_id_league_id FOREIGN KEY (team_id, league_id) REFERENCES team(team_id, league_id));
  
CREATE TABLE place (
  place_id BIGINT(10) AUTO_INCREMENT NOT NULL,
  place_name VARCHAR(50) NOT NULL,
  street_address VARCHAR(30) NOT NULL,
  city VARCHAR(30) NOT NULL,
  state VARCHAR(2) NOT NULL,
  zip BIGINT(5) NOT NULL,
  CONSTRAINT pk_place PRIMARY KEY (place_id));

CREATE TABLE events (
  event_id BIGINT(10) AUTO_INCREMENT NOT NULL,
  event_type VARCHAR(10) NOT NULL,
  start_date_time DATE NOT NULL,
  place_id BIGINT(10) NOT NULL,
  home_team_id BIGINT(10) NOT NULL,
  away_team_id BIGINT(10) DEFAULT NULL,
  CONSTRAINT pk_event PRIMARY KEY (event_id),
  CONSTRAINT fk_event_even FOREIGN KEY (place_id) REFERENCES place(place_id));
   
CREATE TABLE attendance (
  event_id BIGINT(10) AUTO_INCREMENT NOT NULL,
  user_id BIGINT(10) NOT NULL,
  status VARCHAR(8) NOT NULL DEFAULT 'yes',
  message VARCHAR(147),
  CONSTRAINT pk_attendance PRIMARY KEY (event_id),
  CONSTRAINT fk_attendance FOREIGN KEY (user_id) REFERENCES users(user_id));
   
