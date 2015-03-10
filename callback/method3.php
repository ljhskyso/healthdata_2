<?php
$sURL = "https://ohmage-omh.smalldata.io/dsu/oauth/authorize?client_id=5555-2015-jiheng&response_type=code";

$dsuClientID = "5555-2015-jiheng";
$dsuSecret = "y2Erf3dQEcam";

$rsp = file_get_contents($sURL, false, null);

print $rsp;
?>