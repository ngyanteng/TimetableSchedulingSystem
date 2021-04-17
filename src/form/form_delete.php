<?php
//Delete subject
if ($_POST['data-type'] == "subjects") {
	$subj_id = strip_tags($_POST['subject-id']);

	include("../db/connect_db.php");

$sql .= "DELETE FROM subjects WHERE subj_id = '$subj_id'";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Subject deleted successfuly.<br>";
	else
		echo "Error deleting subject: ".mysqli_error($conn).".";
}
//Delete lecturer
else if ($_POST['data-type'] == "lecturers") {
	$lect_id = strip_tags($_POST['lecturer-id']);

	include("../db/connect_db.php");

	$sql .= "DELETE FROM lecturers WHERE lect_id = '$lect_id'";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Lecturer deleted successfuly.<br>";
	else
		echo "Error deleting lecturer: ".mysqli_error($conn).".";
}
//Delete class
else if ($_POST['data-type'] == "classes") {
	$class_id = strip_tags($_POST['class-id']);

	include("../db/connect_db.php");

	$sql .= "DELETE FROM classes WHERE class_id = '$class_id'";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Class deleted successfuly.<br>";
	else
		echo "Error deleting class: ".mysqli_error($conn).".";
}
//Delete trimester
else if ($_POST['data-type'] == "trimesters") {
	$trim_id = strip_tags($_POST['trimester-id']);

	include("../db/connect_db.php");

	$sql .= "DELETE FROM trimesters WHERE trim_id = '$trim_id';";
	$sql .= "DELETE FROM classes WHERE trim_id = '$trim_id';";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Trimester deleted successfuly.<br>";
	else
		echo "Error deleting trimester: ".mysqli_error($conn).".";
}