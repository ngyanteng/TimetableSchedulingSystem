<?php
include("fetch.php");
	
$conflictMatrix = array(array());
$consecutiveMatrix = array(array());
$timeslotAssignment = array();
$timeslotLect = array();
$limitedClass = array();
$lastLectSlot = array();
$subjectSorted = array();
$subjectSorted = $subject;
$count = 0;
$total_timeslot = 20;
$num = 2; //maximum number of classes for a subject to be considered for specialization constraint

sort($subjectSorted);

for($i = 0; $i < $total_timeslot; $i++) {
	$timeslotAssignment[$i] = array();
	$timeslotLect[$i] = array();
}
	
$target = $subjectSorted[0];

for($i = 0; $i < sizeof($subjectSorted); $i++) {
	if ($target == $subjectSorted[$i]) {
		$count++;
	} 
	else {
		if ($count <= $num) {
			$limitedClass += array($target => TRUE);
			$lastLectSlot += array($target => 0);
		}
		else if ($count >$num) {
			$limitedClass += array($target => FALSE);
			$lastLectSlot += array($target => 0);
		}
			$target = $subjectSorted[$i];
			$count = 1;
	}
	if ($i == array_key_last($subjectSorted)) {
		if ($count <= $num) {
			$limitedClass += array($target => TRUE);
			$lastLectSlot += array($target => 0);
		}
		else {
			$limitedClass += array($target => FALSE);
			$lastLectSlot += array($target => 0);
		}
	}
	for($j = 0; $j < sizeof($subject); $j++) {
		$conflictMatrix[$i][$j] = 0;
		$consecutiveMatrix[$i][$j] = 0;
	}
}
		
//conflictMatrixGenerator
for ($i = 0; $i < sizeof($conflictMatrix); $i++) {
	for ($j = $i; $j < sizeof($conflictMatrix); $j++) {
		if (($subject[$i] == $subject[$j] || ($limitedClass[$subject[$i]] && $limitedClass[$subject[$j]] && ($specialize[$i] == $specialize[$j]))) && $i != $j) {
			$conflictMatrix[$i][$j] = 1;
			$conflictMatrix[$j][$i] = 1;
		}
		//search for lecturer conflict
		$foundLect1 = strpos($lecturer[$i], $lecturer[$j]);
		$foundLect2 = strpos($lecturer[$j], $lecturer[$i]);
		if (($foundLect1 !== FALSE || $foundLect2 !== FALSE) && $i != $j) {
			$conflictMatrix[$i][$j] = 1;
			$conflictMatrix[$j][$i] = 1;
			$consecutiveMatrix[$i][$j] = 1;
			$consecutiveMatrix[$j][$i] = 1;
		}
	}
}
	/*
    for($i = 0; $i < sizeof($consecutiveMatrix); $i++) {
		for($j = 0; $j < sizeof($consecutiveMatrix[$i]); $j++) 
			echo $consecutiveMatrix[$i][$j];
			echo "\n\r<br>";
	}
	*/   