<?php
require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $qry = array('JobTitle' => 'New Order for Contact 123');
    $rets = array('Id');
    $cards = $app->dsQuery("Job", 100, 0, $qry, $rets);

    echo "<pre>";
    print_r($cards);
    echo "</pre>";

} else {
    echo "Connection Failed";
}

?>
