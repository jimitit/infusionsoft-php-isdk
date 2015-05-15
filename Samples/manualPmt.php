<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $currentDate = date("d-m-Y");
    $oDate = $app->infuDate($currentDate);
    echo "date set<br/>";

    $cid = 36;

    $newOrder = $app->blankOrder($cid, "New Order for Contact " . $cid, $oDate, 0, 0);
    echo "New order created=" . $newOrder . "<br/>";

    $result = $app->addOrderItem($newOrder, 0, 4, 66.66, 1, "Infusionsoft Stuff", "new stuff!");
    echo "item added<br/>";

    $operation = $app->manualPmt($newOrder, 66.66, $oDate, "Cash", "fakemoney", false);

    if ($operation) {
        echo "payment has been added for invoiceId-" . $newOrder;
    } else {
        echo "Manual Payment Failed<br />";
    }

} else {
    echo "Connection Failed";
}

?>
