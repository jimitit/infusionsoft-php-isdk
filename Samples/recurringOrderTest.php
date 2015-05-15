<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $cid = 36; //contact Id
    $merchId = 9; //merchant account Id
    $subId = 439; //subscription program id

    // Find the newest credit card for the contact
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

    //Create the subscription on contact record
    $newProgram = $app->addRecurring($cid, false, $subId, $merchId, $newCard, 0, 0);
    echo "subscription added<br/>";

    //Generate invoice for the first charge
    $newInvoice = $app->recurringInvoice($newProgram);
    echo "subscription invoiced<br/>";

    //Charge the new invoice
    $result = $app->chargeInvoice($newInvoice, "Cutomer Paid", $newCard, $merchId, false);
    echo "customerId-" . $cid . " has been charged for invoiceId-" . $newInvoice;

} else {
    echo "Connection Failed";
}
?>
