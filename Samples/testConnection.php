<?php
require_once("../src/isdk.php");

$app = new iSDK;
echo "created object!<br/>";

if ($app->cfgCon("connectionName")) {

    echo "app connected!<br/>";

} else {
    echo "connection failed!<br/>";
}
?>