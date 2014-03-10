<?php

$start = '';
if(isset($_REQUEST['start'])){
	if ($_REQUEST['start'] == "") { $start = 0; }
	else { $start = $_REQUEST['start']; }
}

if(isset($_REQUEST['page'])){
	if ($_REQUEST['page'] == "") { 
		$page = 0; 
	} else { 
		$page = $_REQUEST['page'];
	}
} else {
	$page = 0; 
}

$id = '';
if(isset($_GET['id'])){
	if ($_GET['id'] != "") { 
		$id = $_GET['id'];
	} else { 
		$id = 0;
	}
} else {
	$id = 0;
}

$time = '';
if(isset($_GET['time'])){
	if ($_GET['time'] != "") { 
		$time = $_GET['time'];
	} else { 
		$time = 0;
	}
} else {
	$time = 0;
}

$act = '';
if(isset($_REQUEST['act'])){
	if ($_REQUEST['act'] == "") { $act = 0; }
	else { $act = $_REQUEST['act']; }
}

$q = '';
if(isset($_REQUEST['q'])){
	if ($_REQUEST['q'] == "") { $q = 0; }
	else { $q = $_REQUEST['q']; }
} else {
	$q = 0;
}


$file = '';
if(isset($_REQUEST['file'])){
	if ($_REQUEST['file'] == "") { $file = 0; }
	else { $file = $_REQUEST['file']; }
} else {
	$file = 0;
}

$urlname = 0; 
if(isset($_REQUEST['urlname']))
	if($_REQUEST['urlname'])
		$urlname = $_REQUEST['urlname'];

$draft_id = 0; 
if(isset($_REQUEST['draft_id']))
	if($_REQUEST['draft_id'])
		$draft_id = $_REQUEST['draft_id'];


$draft = 0; 
if(isset($_REQUEST['draft']))
	if($_REQUEST['draft'])
		$draft = true;
?>