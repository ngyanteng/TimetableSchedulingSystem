<?php
if (isset($_POST['trimester-id'])) {
	if ($_POST['trimester-id'] != "none") {
		include("src/db/connect_db.php");
	
		$trim_id = strip_tags($_POST['trimester-id']);
		$classes = array();
		$count = 0;
		
		//fetch data to be displayed in timetable
		$sql = "SELECT classes.subj_code, classes.class_code, classes.lect_code, classes.trim_id, classes.timeslot_1, classes.timeslot_2, subjects.subj_name FROM classes, subjects WHERE classes.subj_code = subjects.subj_code AND classes.trim_id = '$trim_id'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			//output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$row["second_class"] = FALSE;
				
				//classes with more than 2 hours will have a second class
				if ($row["timeslot_2"] != NULL) {
					$row["second_class"] = TRUE;
				}	
				$classes[] = $row;
			}
		} 
		else {
			echo "0 results";
		}

		mysqli_close($conn);

		if (!empty($classes)) {
			$timeslot = array();

			for($i = 0; $i < 20; $i++) {
				$timeslot[] = null;
			}

			foreach($classes as $cl) {
				$timeslot[($cl["timeslot_1"])-1][] = $cl;
				if ($cl["second_class"] == TRUE)
					$timeslot[($cl["timeslot_2"])-1][] = $cl;
			}
  
			echo '<tr>
				<td class="align-top"><b>9.00am - 11.00am</b></td>';
			for ($i = 0; $i < 5; $i++) {
				echo '<td class="align-top">';
				for ($j = 0; is_array($timeslot[$i*4]) && $j < sizeof($timeslot[$i*4]); $j++) {
					echo '<div class="card" data-subj="'.$timeslot[$i*4][$j]["subj_code"].'" data-class="'.$timeslot[$i*4][$j]["class_code"].'"  data-lect="'.$timeslot[$i*4][$j]["lect_code"].'">
						<div class="card-body">'.$timeslot[$i*4][$j]["subj_code"].' - '.$timeslot[$i*4][$j]["class_code"].'<br>'.$timeslot[$i*4][$j]["subj_name"].'<br>'.$timeslot[$i*4][$j]["lect_code"].'</div>
						</div>';
				}
				echo '</td>';
			}
			echo '</tr><tr>
				<td class="align-top"><b>11.00am - 1.00pm</b></td>';
			for ($i = 0; $i < 5; $i++) {
				echo '<td class="align-top">';
				for ($j = 0; is_array($timeslot[$i*4+1]) && $j < sizeof($timeslot[$i*4+1]); $j++) {
					echo '<div class="card" data-subj="'.$timeslot[$i*4+1][$j]["subj_code"].'" data-class="'.$timeslot[$i*4+1][$j]["class_code"].'"  data-lect="'.$timeslot[$i*4+1][$j]["lect_code"].'">
						<div class="card-body">'.$timeslot[$i*4+1][$j]["subj_code"].' - '.$timeslot[$i*4+1][$j]["class_code"].'<br>'.$timeslot[$i*4+1][$j]["subj_name"].'<br>'.$timeslot[$i*4+1][$j]["lect_code"].'</div>
						</div>';
				}
				echo '</td>';
			}
			echo '</tr><tr>
				<td class="align-top"><b>2.00pm - 4.00pm</b></td>';
			for ($i = 0; $i < 5; $i++) {
				echo '<td class="align-top">';
				for ($j = 0; is_array($timeslot[$i*4+2]) && $j < sizeof($timeslot[$i*4+2]); $j++) {
					echo '<div class="card" data-subj="'.$timeslot[$i*4+2][$j]["subj_code"].'" data-class="'.$timeslot[$i*4+2][$j]["class_code"].'"  data-lect="'.$timeslot[$i*4+2][$j]["lect_code"].'">
						<div class="card-body">'.$timeslot[$i*4+2][$j]["subj_code"].' - '.$timeslot[$i*4+2][$j]["class_code"].'<br>'.$timeslot[$i*4+2][$j]["subj_name"].'<br>'.$timeslot[$i*4+2][$j]["lect_code"].'</div>
						</div>';
				}
				echo '</td>';
			}
			echo '</tr><tr>
				<td class="align-top"><b>4.00pm - 6.00pm</b></td>';
			for ($i = 0; $i < 5; $i++) {
				echo '<td class="align-top">';
				for ($j = 0; is_array($timeslot[$i*4+3]) && $j < sizeof($timeslot[$i*4+3]); $j++) {
					echo '<div class="card" data-subj="'.$timeslot[$i*4+3][$j]["subj_code"].'" data-class="'.$timeslot[$i*4+3][$j]["class_code"].'"  data-lect="'.$timeslot[$i*4+3][$j]["lect_code"].'">
						<div class="card-body">'.$timeslot[$i*4+3][$j]["subj_code"].' - '.$timeslot[$i*4+3][$j]["class_code"].'<br>'.$timeslot[$i*4+3][$j]["subj_name"].'<br>'.$timeslot[$i*4+3][$j]["lect_code"].'</div>
						</div>';
				}
				echo '</td>';
			}
			echo '</tr>';
		}
	}
}