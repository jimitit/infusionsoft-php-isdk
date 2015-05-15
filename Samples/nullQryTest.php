<?php

require_once("../src/isdk.php");
$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $qry = array('Company' => '~null~');
    $rets = array('Id', 'FirstName');
    $cards = $app->dsQuery("Contact", 99, 0, $qry, $rets);

    echo "<pre>";
    print_r($cards);
    echo "</pre>";
} else {
    echo "Connection Failed";
}

?>