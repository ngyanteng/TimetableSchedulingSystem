<?php
include("db/connect_db.php");

$sql = "SELECT classes.class_id, classes.subj_code, classes.class_code, classes.lect_code, subjects.subj_spec, subjects.lect_hour FROM classes, subjects WHERE classes.subj_code = subjects.subj_code AND classes.trim_id = '$trim_id'";
$result = mysqli_query($conn, $sql);
$classes = array();

if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		if ($row["class_code"][1] == "C") {
			$row["type"] = "C";
		}
		else {
			$row["type"] = "T";
		}
		$row["second_class"] = FALSE;
		$classes[] = $row;
		if ($row["lect_hour"] == 3 && $row["class_code"][1] == "C") {
			$row["type"] = "C";
			$row["second_class"] = TRUE;
			$classes[] = $row;
		}
	}
} 
else {
	echo "0 results";
}

mysqli_close($conn);

shuffle($classes);
usort($classes, function($a, $b) {
    return $a["type"] <=> $b["type"];
});

$class_id = array();
$subject = array();
$lecturer = array();
$class = array();
$specialize = array();
$second_class = array();

foreach($classes as $cl) {
	$classId[] = $cl["class_id"];
	$subject[] = $cl["subj_code"];
	$lecturer[] = $cl["lect_code"];
	$class[] = $cl["class_code"];
	$specialize[] = $cl["subj_spec"];
	$secondClass[] = $cl["second_class"];
}
