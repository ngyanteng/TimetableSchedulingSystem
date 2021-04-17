<?php
//connect to server
include('src/db/connect_db.php');

$query = "SELECT lect_code FROM lecturers ORDER BY lect_code";
$result = $conn->query($query);
if (!$result) 
	die('Couldn\'t fetch records');
while ($row = $result->fetch_array(MYSQLI_NUM)) {
	echo '<option value="'.$row[0].'">'.$row[0].'</option>';
}
