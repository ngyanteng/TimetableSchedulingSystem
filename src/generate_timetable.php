<?php
if (isset($_POST['blackout-slot'])) {
	$blackoutSlot = $_POST['blackout-slot'];

	$trim_id = $_POST['trimester-id'];
	include("conflict_matrix.php");
	require_once('solve.php');
 
	$solved = solve(0, 0,  sizeof($subject), $lastLectSlot);
	if (!$solved) {
		include('generate_timetable.php');
		return;
	}

	for($i = 0 ; $i < $total_timeslot; $i++) {
		for($j = 0; $j < sizeof($timeslotAssignment[$i]); $j++) {
			$timeslotLect[$i][$timeslotAssignment[$i][$j]] = $subject[$timeslotAssignment[$i][$j]]."-".$class[$timeslotAssignment[$i][$j]];
				
			include("db/connect_db.php");
			$color = $i+1;
			if ($secondClass[$timeslotAssignment[$i][$j]]) {
				$insert_id = $classId[$timeslotAssignment[$i][$j]];
				$sql .= "UPDATE classes SET timeslot_2 = '$color' WHERE class_id = '$insert_id';";
			}
			else {
				$insert_id = $classId[$timeslotAssignment[$i][$j]];
				$sql .= "UPDATE classes SET timeslot_1 = '$color' WHERE class_id = '$insert_id';";
			}
  
			if(!mysqli_multi_query($conn, $sql))
				echo "Error saving assigned timeslots: ".mysqli_error($conn).".";
				mysqli_close($conn);
				
		}
	}
}