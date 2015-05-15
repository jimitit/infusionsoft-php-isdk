<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $tmpId = $app->addEmailTemplate("This is my API template", 'Test', 'Test@test.com', 'test@example.com', '', '', 'This is my API Template', 'Test Text Body', '', 'TEXT', 'Contact');

    echo "Template " . $tmpId . " has been created!";

} else {
    echo "Connection Failed";
}

?>