<?php
if ($_POST['data-file'] == "classes") {
	$errors= array();
	$tri_id = strip_tags($_POST['trim-id']);
    $file_name = $_FILES['csv-import']['name'];
    $file_tmp = $_FILES['csv-import']['tmp_name'];
    $file_type = $_FILES['csv-import']['type'];
	$tmp = explode('.',$_FILES['csv-import']['name']);
    $file_ext = strtolower(end($tmp));
      
    $extensions= array("csv");
    
	//check if file is csv format
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="Extension not allowed, please choose a CSV file.";
    }
	 
	if(empty($errors)==true) {
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name);
		include('../db/connect_db.php');
		
		$file = fopen($_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name, 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
			//$line is an array of the csv elements
			$sql .= "INSERT INTO classes (subj_code, class_code, lect_code, trim_id)
				VALUES ('$line[0]', '$line[1]', '$line[2]', '$tri_id') ON DUPLICATE KEY UPDATE subj_code = VALUES(subj_code), class_code = VALUES(class_code), lect_code = VALUES(lect_code), trim_id = VALUES(trim_id);";
		}
		fclose($file);

		if(mysqli_multi_query($conn, $sql)) {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Classes.php';
					alert('Data imported successfully from CSV file.');
				</script>";
		}
		else {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Classes.php';
					alert('".mysqli_error($conn)."');
				</script>";
		}
		
		mysqli_close($conn);
	}
	else {
		$error = implode("-",$errors);
		echo "<script>
		window.location = '/TimetableSchedulingSystem/Classes.php';
		alert('$error');
		</script>";
	}
}
else if ($_POST['data-file'] == "subjects") {
	$errors= array();
    $file_name = $_FILES['csv-import']['name'];
    $file_tmp = $_FILES['csv-import']['tmp_name'];
    $file_type = $_FILES['csv-import']['type'];
	$tmp = explode('.',$_FILES['csv-import']['name']);
    $file_ext = strtolower(end($tmp));
      
    $extensions= array("csv");
     
	//check if file is csv format
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="Extension not allowed, please choose a CSV file.";
    }
	 
	if(empty($errors)==true) {
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name);
		include('../db/connect_db.php');
		
		$file = fopen($_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name, 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
			//$line is an array of the csv elements				
			$sql .="INSERT INTO subjects (subj_code, subj_name, subj_spec, lect_hour, tuto_hour)
				VALUES ('$line[0]', '$line[1]', '$line[2]', '$line[3]', '$line[4]') ON DUPLICATE KEY UPDATE subj_code = VALUES(subj_code), subj_name = VALUES(subj_name), subj_spec = VALUES(subj_spec), lect_hour = VALUES(lect_hour), tuto_hour = VALUES(tuto_hour);";
		}
		fclose($file);

		if(mysqli_multi_query($conn, $sql)) {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Subjects.php';
					alert('Data imported successfully from CSV file.');
				</script>";
		}
		else {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Subjects.php';
					alert('".mysqli_error($conn)."');
				</script>";
		}
		
		mysqli_close($conn);
	}
	else {
		$error = implode("-",$errors);
		echo "<script>
		window.location = 'Subjects.php';
		alert('$error');
		</script>";
	}
}
else if ($_POST['data-file'] == "lecturers") {
	$errors= array();
    $file_name = $_FILES['csv-import']['name'];
    $file_tmp = $_FILES['csv-import']['tmp_name'];
    $file_type = $_FILES['csv-import']['type'];
	$tmp = explode('.',$_FILES['csv-import']['name']);
    $file_ext = strtolower(end($tmp));
      
    $extensions= array("csv");
    
	//check if file is csv format
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="Extension not allowed, please choose a CSV file.";
    }
	
	if(empty($errors)==true) {
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name);
		include('../db/connect_db.php');
		
		$file = fopen($_SERVER['DOCUMENT_ROOT']."/TimetableSchedulingSystem/upload/".$file_name, 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
		//$line is an array of the csv elements
			$sql .= "INSERT INTO lecturers (lect_code, lect_name)
				VALUES ('$line[0]', '$line[1]') ON DUPLICATE KEY UPDATE lect_code = VALUES(lect_code), lect_name = VALUES(lect_name);";
		}
		fclose($file);

		if(mysqli_multi_query($conn, $sql)) {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Lecturers.php';
					alert('Data imported successfully from CSV file.');
				</script>";
		}
		else {
			echo "<script>
					window.location = '/TimetableSchedulingSystem/Lecturers.php';
					alert('".mysqli_error($conn)."');
				</script>";
		}
		
		mysqli_close($conn);
	}
	else {
		$error = implode("-",$errors);
		echo "<script>
		window.location = 'Lecturers.php';
		alert('$error');
		</script>";
	}
}