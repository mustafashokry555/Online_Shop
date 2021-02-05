<?php

require_once("../../app.php");
use Online\Classes\Models\Admin;
$ad = new Admin;
$ad->logout($session);

header("location: " . URL . "admin/login.php");

?>