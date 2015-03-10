<?php
$sURL = "https://lifestreams.smalldata.io/dsu/dataPoints"; // The POST URL

$sPD = "schema_namespace=omh&schema_name=physical-activity&schema_version=1.0";
$aHTTP = array(
  'http' => // The wrapper to be used
    array(
    'method'  => 'GET', // Request Method
    // Request Headers Below
    'header'  => 'Authentication: Bearer ceb1c6de-ab22-473e-8e3f-65879fa5053b',
    'content' => $sPD
  )
);
$context = stream_context_create($aHTTP);
$contents = file_get_contents($sURL, false, $context);


echo gettype($contents);
?>