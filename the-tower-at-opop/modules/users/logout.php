<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/modules.inc.php");

$session->is_user();

$session->logout();

header("Location: ".MAINURL);

?>
