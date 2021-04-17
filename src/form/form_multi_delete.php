<?php
//Delete subjects
if ($_POST['data-type'] == "subjects") {
	$subj_id = $_POST['subject-checkbox'];

	include("../db/connect_db.php");

	foreach ($subj_id as $su) {
		$sql .= "DELETE FROM subjects WHERE subj_id = '$su';";
	}
  
	if(mysqli_multi_query($conn, $sql))
		echo "Subjects deleted successfuly.<br>";
	else
		echo "Error deleting subject: ".mysqli_error($conn).".";
}
//Delete lecturers
else if ($_POST['data-type'] == "lecturers") {
	$lect_id = $_POST['lecturer-checkbox'];

	include("../db/connect_db.php");

	foreach ($lect_id as $le) {
		$sql .= "DELETE FROM lecturers WHERE lect_id = '$le';";
	}

	if(mysqli_multi_query($conn, $sql))
		echo "Lecturers deleted successfuly.<br>";
	else
		echo "Error deleting lecturer: ".mysqli_error($conn).".";
}
//Delete classes
else if ($_POST['data-type'] == "classes") {
	$class_id = $_POST['class-checkbox'];
	
	include("../db/connect_db.php");
	
	foreach ($class_id as $cl) {
		$sql .= "DELETE FROM classes WHERE class_id = '$cl';";
	}

	if(mysqli_multi_query($conn, $sql))
		echo "Classes deleted successfuly.<br>";
	else
		echo "<script>console.log('Error deleting class: ".mysqli_error($conn).".')</script>";
}
//Delete trimesters
else if ($_POST['data-type'] == "trimesters") {
	$trim_id = $_POST['trimester-checkbox'];

	include("../db/connect_db.php");

	foreach ($trim_id as $tr) {
		$sql .= "DELETE FROM trimesters WHERE trim_id = '$tr';";
		$sql .= "DELETE FROM classes WHERE trim_id = '$tr';";
	}
  
	if(mysqli_multi_query($conn, $sql))
		echo "Trimesters deleted successfuly.<br>";
	else
		echo "<script>console.log('Error deleting class: ".mysqli_error($conn).".')</script>";
}