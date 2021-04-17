<?php
/** function to assign colors recursively **/
    function solve($row, $color, $V, &$lastLectSlot) {
		global $total_timeslot, $conflictMatrix, $subject, $class, $lecturer, $classId, $secondClass;
		$numOfColors = $total_timeslot;
		$start_time = time();
		
		if ($row == 0) {
			$color = array();
			for ($i = 0; $i < $V; $i++) {
				$color[$i] = 0;
			}
		}
	
        //base case - solution found
        if ($row == $V) {
			return true;
		}
        //try all colours
        for ($currentColor = 1; $currentColor <= $numOfColors; $currentColor++) {
			if ((time() - $start_time) > 5) {
				return false;
			}
			if (isPossible($row, $V, $currentColor, $color, $lastLectSlot)) {
				//assign and proceed with next vertex 
				$color[$row] = $currentColor;
				return solve($row + 1, $color, sizeof($subject), $lastLectSlot);
				//wrong assignement
				$color[$row] = 0;
			}
        }
    }
	
	function isPossible($row, $V, $currentColor, $color, &$lastLectSlot) {
		global $conflictMatrix, $consecutiveMatrix, $timeslotAssignment, $class, $subject, $lecturer, $blackoutSlot;
		
        for ($i = 0; $i < $V; $i++) {
            if ($conflictMatrix[$row][$i] == 1 && $currentColor == $color[$i]) {
                return false;
			}
			//check for no lecturer teach four hour class constraint
			else if ($consecutiveMatrix[$row][$i] == 1 && $color[$i] != 0) {
				if ($currentColor-$color[$i] == 1 || $currentColor-$color[$i] == -1 ) {
					return false;
				}
			}
			//check for no tutorial class before lecture class constraint
			else if ($class[$row][1] != "C" && $lastLectSlot[$subject[$row]] >= $currentColor) {
				return false;
			}
			//blackout slot specified by admin to be excluded
			else if ($currentColor == $blackoutSlot) {
				return false;
			}
		}
		$timeslotAssignment[$currentColor - 1][] = $row;
		//if current class is lecture class, keep note last timeslot lecture class of each subject is assigned to
		if ($class[$row][1] == "C") {
			$lastLectSlot[$subject[$row]] = $currentColor;
		}
        return true;
    }