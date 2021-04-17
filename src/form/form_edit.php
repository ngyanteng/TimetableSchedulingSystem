<?php
//Edit subject
if ($_POST['data-type'] == "subjects") {
	$subj_id = strip_tags($_POST['subject-id']);
	$subj_code = strip_tags($_POST['edit-subject-code']);
	$subj_name = strip_tags($_POST['edit-subject-name']);
	$subj_spec = strip_tags($_POST['edit-specialization']);
	$lect_hour = strip_tags($_POST['edit-lecture-hours']);
	$tuto_hour = strip_tags($_POST['edit-tutorial-hours']);

	include('../db/connect_db.php');

	$sql .= "UPDATE subjects SET subj_code = '$subj_code', subj_name = '$subj_name', subj_spec = '$subj_spec', lect_hour = '$lect_hour', tuto_hour = '$tuto_hour' WHERE subj_id = '$subj_id';";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Subject updated successfuly.<br>";
	else
		echo "Error updating subject: ".mysqli_error($conn).".";
	
	mysqli_close($conn);
}
//Edit lecturer
else if ($_POST['data-type'] == "lecturers") {
	$lect_id = strip_tags($_POST['lecturer-id']);
	$lect_code = strip_tags($_POST['edit-lecturer-code']);
	$lect_name = strip_tags($_POST['edit-lecturer-name']);

	include('../db/connect_db.php');

	$sql .= "UPDATE lecturers SET lect_code = '$lect_code', lect_name = '$lect_name' WHERE lect_id = '$lect_id';";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Lecturer updated successfuly.<br>";
	else {
		echo "<script>console.log('Error updating lecturer: ".mysqli_error($conn).".')";
	}
	
	mysqli_close($conn);
}
//Edit class
else if ($_POST['data-type'] == "classes") {
	$class_id = strip_tags($_POST['class-id']);
	$subj_code = strip_tags($_POST['edit-subject-code']);
	$class_code = strip_tags($_POST['edit-class-code']);
	$lect_code = strip_tags($_POST['edit-lecturer-code']);

	include('../db/connect_db.php');

	$sql .= "UPDATE classes SET subj_code = '$subj_code', class_code = '$class_code', lect_code = '$lect_code' WHERE class_id = '$class_id';";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Class updated successfuly.<br>";
	else
		echo "Error updating class: ".mysqli_error($conn).".";
	
	mysqli_close($conn);
}
//Edit trimester
else if ($_POST['data-type'] == "trimesters") {
	$trim_id = strip_tags($_POST['trimester-id']);
	$trim_code = strip_tags($_POST['edit-trimester-code']);
	$trim_name = strip_tags($_POST['edit-trimester-name']);

	include('../db/connect_db.php');

	$sql .= "UPDATE trimesters SET trim_code = '$trim_code', trim_name = '$trim_name' WHERE trim_id = '$trim_id';";
  
	if(mysqli_multi_query($conn, $sql))
		echo "Trimester updated successfuly.<br>";
	else {
		echo "<script>console.log('Error updating trimester: ".mysqli_error($conn).".')";
	}
	
	mysqli_close($conn);
}