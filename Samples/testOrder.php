<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $cid = 36;

    //Sets current date
    $currentDate = date("d-m-Y");
    $oDate = $app->infuDate($currentDate);
    echo "date set<br/>";

    //Creates blank order
    $newOrder = $app->blankOrder($cid, "New Order for Contact 123", $oDate, 0, 0);
    echo "newOrder=" . $newOrder . "<br/>";

    $newOrder = (int)$newOrder;

    //Adds item to order
    $result = $app->addOrderItem($newOrder, 53, 4, 66.66, 1, "JustinsStuff", "new stuff!");
    echo "item added<br/>";

    //Finds the newest credit card
    $qry = array('ContactId' => $cid);
    $rets = array('Id');
    $cards = $app->dsQuery("CreditCard", 99, 0, $qry, $rets);

    echo "<pre>";
    print_r($cards);
    echo "</pre>";

    $newCard = 0;
    $counter = 0;
    foreach ($cards as $card) {
        if ($cards[$counter]['Id'] > $newCard) {

            $newCard = (int)$cards[$counter]['Id'];

        }
        $counter++;
    }
    echo "newCard= " . $newCard . "<br/>";

    //Charge the invoice for new order with the latest credit card
    $result = $app->chargeInvoice($newOrder, "Cutomer Paid", $newCard, 9, false);

    echo "<pre>";
    print_r($result);
    echo "</pre>";
    echo "customerId-" . $cid . " has been charged for invoiceId-" . $newOrder;

} else {
    echo "connection failed";
}

?>
