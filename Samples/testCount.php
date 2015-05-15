<?php
require_once("../src/isdk.php");

$app = new iSDK;
echo "created object!<br/>";

if ($app->cfgCon("connectionName")) {

    echo "app connected!<br/>";

    $email = 'test@example.com';
    $totalRecords = $app->dsCount("Contact", array('Email' => $email));

    echo $totalRecords;

    if ($totalRecords > 0) {
        $totalPages = ceil($totalRecords / 1000);
        $contacts = array();
        $page = 0;
        do {
            $contact = $app->dsQuery("Contact", 1000, $page++, array('Email' => $email), array('Id', 'FirstName', 'LastName', 'Email', 'Phone1'));

            foreach ($contact as $c) {
                $contacts[] = $c;
            }
        } while ($page < $totalPages);

        echo "<pre>";
        print_r($contacts);
        echo "</pre>";

    } else {
        echo "There were no contacts found with the specified email";
    }

} else {
    echo "connection failed!<br/>";
}
?>