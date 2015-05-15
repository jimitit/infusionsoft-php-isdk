<?php
//include the SDK
require_once("../../src/isdk.php");
//build our application object
$app = new iSDK;

//connect to the API - change demo to be whatever your connectionName is!
if ($app->cfgCon("demo")) {

//action set Id number to run on the posted contact
    $actionId = 123;
//grab our posted contact fields
    $contact = array('Email' => $_POST['Contact0Email'],
        'FirstName' => $_POST['Contact0FirstName'],
        'LastName' => $_POST['Contact0LastName']);
//grab the returnURL
    $returnURL = $_POST['returnURL'];

//dup check on email if it exists.
    if (!empty($contact['Email'])) {
        //check for existing contact;
        $returnFields = array('Id');
        $dups = $app->findByEmail($contact['Email'], $returnFields);

        if (!empty($dups)) {
            //update contact
            $app->updateCon($dups[0]['Id'], $contact);
            //run an action set on the contact
            $app->runAS($dups[0]['Id'], $actionId);
        } else {
            //Add new contact
            $newCon = $app->addCon($contact);
            //run an action set on the contact
            $app->runAS($newCon, $actionId);
        }

        //Send them to the success page
        header('location: ' . $returnURL);

    } else {
        //Let them know how it is ;)
        die('You must provide at least an email address.');
    }

} else {
    echo "Connection Error";
}
?>