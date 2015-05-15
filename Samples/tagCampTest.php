<?php

require_once("../src/isdk.php");

$app = new iSDK;

if ($app->cfgCon("connectionName")) {

    echo "connected<br/>";
    echo "app connected<br/>";

    $cid = 36;

    $groupId = 99;
    $result = $app->grpAssign($cid, $groupId);
    echo "tag applied to contact . " . $cid . "<br/>";

    $campId = 83;
    $result = $app->campAssign($cid, $campId);
    echo "Added " . $cid . " to Followup Sequence " . $campId . "<br/>";

} else {
    echo "Connection Failed";
}

?>