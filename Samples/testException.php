<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName", "api-key", "throw")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $qry = array("FakeColumn" => "FakeValue");

    try {
        $r = $app->dsQuery("FakeTable", 1, 0, $qry, array("FakeColumn"));
    } catch (iSDKException $e) {
        echo "iSDKException code {$e->getCode()}, message: {$e->getMessage()}\n";
        exit;
    }

    echo "Test failed: exception should have been thrown\n";
    exit(1);

} else {
    echo "connection failed";
}

?>
