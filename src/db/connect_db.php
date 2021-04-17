<?php
//connect to server
$servername = "localhost";
$username = "root";
$password = "";
$sql = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

if(!$conn)
	die("Could not connect to server: ".mysqli_connect_error());

//select db
$db_selected=mysqli_select_db($conn,"timetable_scheduling");