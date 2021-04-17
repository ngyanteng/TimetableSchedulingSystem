<?php
//New subject
if ($_POST['data-type'] == "subjects") {
	$subj_code = strip_tags($_POST['new-subject-code']);
	$subj_name = strip_tags($_POST['new-subject-name']);
	$subj_spec = strip_tags($_POST['new-specialization']);
	$lect_hour = strip_tags($_POST['new-lecture-hours']);
	$tuto_hour = strip_tags($_POST['new-tutorial-hours']);

	include("../db/connect_db.php");

	$sql .= "INSERT INTO subjects (subj_code, subj_name, subj_spec, lect_hour, tuto_hour) VALUES ('$subj_code', '$subj_name', '$subj_spec', '$lect_hour', '$tuto_hour')";
  
  if(mysqli_multi_query($conn, $sql))
	echo "Subject created successfuly.<br>";
  else
	echo "Error creating subject: ".mysqli_error($conn).".";
	
	mysqli_close($conn);
}
//New lecturer
else if ($_POST['data-type'] == "lecturers") {
	$lect_code = strip_tags($_POST['new-lecturer-code']);
	$lect_name = strip_tags($_POST['new-lecturer-name']);
	
	include("../db/connect_db.php");

$sql .= "INSERT INTO lecturers (lect_code, lect_name) VALUES ('$lect_code', '$lect_name')";
  
  if(mysqli_multi_query($conn, $sql))
	echo "Lecturer created successfuly.<br>";
  else
	echo "Error creating lecturer: ".mysqli_error($conn).".";
	
	mysqli_close($conn);
}
//New class
else if ($_POST['data-type'] == "classes") {
	$trim_id = strip_tags($_POST['trim-id']);
	$subj_code = strip_tags($_POST['new-subject-code']);
	$class_code = strip_tags($_POST['new-class-code']);
	$lecturers_code = $_POST['new-lecturer-code'];
	$lect_code = $lecturers_code[0];
	
	//class with more than one lecturer
	if (!empty($lecturers_code[1])) {
		for($i = 1; $i < sizeof($lecturers_code); $i++) {
			$lect_code .= "/".$lecturers_code[$i];
		}
	}
	
	include("../db/connect_db.php");

	$sql .= "INSERT INTO classes (subj_code, class_code, lect_code, trim_id) VALUES ('$subj_code', '$class_code', '$lect_code', '$trim_id')";
  
  if(mysqli_multi_query($conn, $sql))
	echo "Class created successfuly.<br>";
  else
	echo "<script>console.log('Error creating class: ".mysqli_error($conn).".')</script>";
	
	mysqli_close($conn);
}
//New trimester
else if ($_POST['data-type'] == "trimesters") {
	$trim_code = strip_tags($_POST['new-trimester-code']);
	$trim_name = strip_tags($_POST['new-trimester-name']);
	
	include("../db/connect_db.php");

$sql .= "INSERT INTO trimesters (trim_code, trim_name) VALUES ('$trim_code', '$trim_name')";
  
  if(mysqli_multi_query($conn, $sql))
	echo "Trimester created successfuly.<br>";
  else
	echo "Error creating trimester: ".mysqli_error($conn).".";
	
	mysqli_close($conn);
}