<?php

require_once("../src/isdk.php");

$app = new iSDK;
echo "created object<br/>";

if ($app->cfgCon("connectionName")) {

    echo "app connected<br/>";

    $orderId = 673;
    $firstName = 'API';
    $lastName = 'Has Updated Me';
    $street = '333 API st';
    $city = 'Chandler';

    $dat = array('ShipFirstName' => $firstName,
        'ShipLastName' => $lastName,
        'ShipStreet1' => $street,
        'ShipCity' => $city);

    $jobId = $app->dsUpdate("Job", $orderId, $dat);

    echo "JobId=$jobId<br/>";

} else {
    echo "connection failed";
}

?>