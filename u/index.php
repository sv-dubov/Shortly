<?php

include_once('../backend/link.php');

$dbLinkObj = new Link();

if (isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];
    $link = $dbLinkObj->displayRecord($u_id);
    $clicks = $link->clicks + 1;
    $dbLinkObj->updateClicks($clicks, $u_id);
    header("location: " . $link->url . "");
}
