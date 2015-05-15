<?php
require_once("../src/isdk.php");

$app = new iSDK;
$app->enableLogging(1);
$app->setLog('apilog.csv');

if ($app->cfgCon("connectionName")) {

    $contacts = $app->dsQuery("Contact", 10, 0, array('Id' => '%'), array('Id', 'FirstName', 'LastName'));

    echo "<pre>";
    print_r($contacts);
    echo "</pre>";

} else {
    echo "Connection Failed";
}

?>
