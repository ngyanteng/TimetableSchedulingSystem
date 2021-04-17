<?php
if($_POST["action"] == "filter") {
	include('Timetable.php');
}
if($_POST["action"] == "generate" && isset($_POST['trimester-id'])) {
	if ($_POST['trimester-id'] != "none") {
		include('src/generate_timetable.php');
		include('Timetable.php');
	}
	else if ($_POST['trimester-id'] == "none") {
		echo "<script>
				window.location = 'Timetable.php';
				alert('Please select a trimester first.');	
			</script>";
	}
}