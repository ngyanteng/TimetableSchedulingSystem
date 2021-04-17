<?php
//export subjects data in csv
if ($_POST['data-type'] == "subjects") {
	include('../db/connect_db.php');

	$query = "SELECT subj_code, subj_name, subj_spec, lect_hour, tuto_hour FROM subjects";
	$result = $conn->query($query);
	if (!$result) die('Couldn\'t fetch records');
	$fp = fopen('php://output', 'w');

	if ($fp && $result) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Subjects.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
		}
		die;
	}
}
//export lecturers data in csv
else if ($_POST['data-type'] == "lecturers") {
	include('../db/connect_db.php');

	$query = "SELECT lect_code, lect_name FROM lecturers";
	$result = $conn->query($query);
	if (!$result) die('Couldn\'t fetch records');
	$fp = fopen('php://output', 'w');

	if ($fp && $result) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Lecturers.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
		}
		die;
	}
}
//export classes data in csv
else if ($_POST['data-type'] == "classes") {
	$trim_id = strip_tags($_POST['trim-id']);
	$trim_code = strip_tags($_POST['trim-code']);
	include('../db/connect_db.php');

	$query = "SELECT subj_code, class_code, lect_code FROM classes WHERE trim_id = '$trim_id'";
	$result = $conn->query($query);
	if (!$result) die('Couldn\'t fetch records');
	$fp = fopen('php://output', 'w');

	if ($fp && $result) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Classes_'.$trim_code.'.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
		}
		die;
	}
}