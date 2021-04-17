<?php
//connect to server
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

if(!$conn)
	die("Could not connect to server: ".mysqli_connect_error());
else
	echo "Sucessfully connected to server.<br>";

//select db
$db_selected=mysqli_select_db($conn,"timetable_scheduling");

if(!$db_selected){
	$sql="CREATE DATABASE timetable_scheduling";
	if(mysqli_query($conn, $sql)){
		$db_selected=mysqli_select_db($conn, "timetable_scheduling");
		echo "Database created successfully.";
	}
	else
		echo "Error creating database.";
}
else
	echo "Database selected successfully.<br>";

//create table
$sql="CREATE TABLE lecturers(
		lect_id INT(11) NOT NULL AUTO_INCREMENT,
		lect_code VARCHAR(20) NOT NULL UNIQUE,
		lect_name VARCHAR(50) NOT NULL,
		PRIMARY KEY (lect_id));
		
	CREATE TABLE subjects(
		subj_id INT(11) NOT NULL AUTO_INCREMENT,
		subj_code VARCHAR(7) NOT NULL UNIQUE,
		subj_name VARCHAR(50) NOT NULL,
		subj_spec VARCHAR(4) NOT NULL,
		lect_hour INT(1) NOT NULL,
		tuto_hour INT(1) NOT NULL,
		PRIMARY KEY (subj_id));
		
	CREATE TABLE classes(
		class_id INT(11) NOT NULL AUTO_INCREMENT,
		subj_code VARCHAR(7) NOT NULL,
		class_code VARCHAR(4) NOT NULL,
		lect_code VARCHAR(60) NOT NULL,
		trim_id INT(11) NOT NULL,
		timeslot_1 INT(2),
		timeslot_2 INT(2),
		PRIMARY KEY (class_id));
	
	CREATE TABLE trimesters(
		trim_id INT(11) NOT NULL AUTO_INCREMENT,
		trim_code VARCHAR(20) NOT NULL,
		trim_name VARCHAR(50) NOT NULL,
		PRIMARY KEY (trim_id));
		";
		
if(mysqli_multi_query($conn, $sql))
	echo "Tables created successfully.<br>";
else
	echo "Error creating table: ".mysqli_error($conn).".";