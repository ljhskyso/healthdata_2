<?php
// -----------------------------
// mobility summary
// -----------------------------
$mobSummary = json_decode( file_get_contents('mobility_summary.json'), true );
$mobSegment = json_decode( file_get_contents('mobility_segment.json'), true );
$mobStream  = json_decode( file_get_contents('mobility_stream.json'), true );

// -----------------------------
// PAM summary
// -----------------------------
$pamSummary = json_decode( file_get_contents('pam_mood.json'), true );


echo count($mobSummary) . ", ";
echo count($mobSegment) . ", ";
echo count($mobStream) . ", ";
echo count($pamSummary) . ", ";

for ($i=0; $i<count($mobSummary); $i++) {
	echo $mobSummary[$i]["body"]["date"] . ", ";
	echo $mobSummary[$i]["body"]["active_time_in_seconds"] . ", <br>";
}
for ($i=0; $i<count($pamSummary); $i++) {
	echo $pamSummary[$i]["body"]["effective_time_frame"]["date_time"] . ", ";
	echo $pamSummary[$i]["body"]["positive_affect"] . "/";
	echo $pamSummary[$i]["body"]["negative_affect"] . ", <br>";
}

// -----------------------------
// Merge Two JSONs
// -----------------------------


?>