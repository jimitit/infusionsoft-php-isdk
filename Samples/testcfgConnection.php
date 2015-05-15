<?php
$app_name = 'applicationName';
$api_key = 'api-key-here';

require_once("../src/isdk.php");

$app = new iSDK;
echo "created object!<br/>";

if ($app->cfgCon($app_name, $api_key)) {
    echo "app connected!<br/>";
} else {
    echo "connection failed!<br/>";
}

?>
