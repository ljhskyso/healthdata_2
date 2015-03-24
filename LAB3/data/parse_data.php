<?php
// mobility summary
// -----------------------------
$source_file = file_get_contents('mobility_summary.json');
$source_json = json_decode($source_file, true);
$ret = array();

// $max_geodiameter = array("date"=>null, "type"=>"max_geodiameter", "amount"=>$source_file[0]["geodiameter_in_km"]);
// $min_geodiameter = array("date"=>null, "type"=>"min_geodiameter", "amount"=>$source_file[0]["geodiameter_in_km"]);

foreach ($source_json as $day) {
	$tmp = array(
		"date"		 =>$day["body"]["date"],
		"geodiameter"=>$day["body"]["geodiameter_in_km"],
		"walking_dis"=>$day["body"]["walking_distance_in_km"],
		"active_time"=>$day["body"]["active_time_in_seconds"],
		"max_g_speed"=>$day["body"]["max_gait_speed_in_meter_per_second"],
		"coverage"	 =>$day["body"]["coverage"]
	);
	$ret[] = $tmp;
	
	// $geo = $day["body"]["geodiameter_in_km"];
	// if ($geo < $min_geodiameter["amount"]) {
	// 	$min_geodiameter["amount"] = $geo
	// }
	// if ($geo > $max_geodiameter["amount"]) {
	// 	$max_geodiameter["amount"] = $geo
	// }
}

$fp = fopen('../visual/m_summary.json','w') or die("Unable to open file!");
fwrite($fp, json_encode($ret));
fclose($fp);
echo "file 1 written.";
//
// $markers = array($max_geodiameter, $min_geodiameter);
// $fp = fopen('../visual/m_summary_markers.json','w') or die("Unable to open file!");
// fwrite($fp, json_encode($markers));
// fclose($fp);
// echo "file 2 written.";
?>

<?php
	
// PAM summary
// -----------------------------
$source_file = file_get_contents('pam_mood.json');
$source_json = json_decode($source_file, true);

$arousal_cnt = 0;
$negative_cnt = 0;
$positive_cnt = 0;
$valence_cnt = 0;
foreach ($source_json as $day) {
	$arousal_cnt	+= $day["body"]["affect_arousal"];
	$negative_cnt	+= $day["body"]["negative_affect"];
	$positive_cnt	+= $day["body"]["positive_affect"];
	$valence_cnt	+= $day["body"]["affect_valence"];
}

$ret = array(
	"charttype" => "piechart",
	"attr1" => "name",
	"attr2" => "score",
	"charts" => array(
		array(
	      "name" => "arousal",
	      "score" => $arousal_cnt
		),
		array(
	      "name" => "negative",
	      "score" => $negative_cnt
		),
		array(
	      "name" => "valence",
	      "score" => $valence_cnt
		),
		array(
	      "name" => "positive",
	      "score" => $positive_cnt
		)
	)
);

$fp = fopen('../visual/pam.json','w') or die("Unable to open file!");
fwrite($fp, json_encode($ret));
fclose($fp);
echo "file for PAM is written.";

?>