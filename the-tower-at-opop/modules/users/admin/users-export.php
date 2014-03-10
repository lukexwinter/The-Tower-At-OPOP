<?php

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->checkPermissions("ADMIN", "USERS", true);

	$file = 'CDS_Users_Export';
	
	$link = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("Can not connect." . mysql_error());
	mysql_select_db(DB_NAME) or die("Can not connect.");
	
	$result = mysql_query("SHOW COLUMNS FROM ".TBL_USERS."");
	
	$i = 0;
	$csv_output = "";
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			$csv_output .= $row['Field'].", ";
			$i++;
		}
	}
	$csv_output .= "\r\n";
	
	$values = mysql_query("SELECT * FROM ".TBL_USERS."");
	while ($rowr = mysql_fetch_row($values)) {
		for ($j=0;$j<$i;$j++) {
			$csv_output .= '"'.$rowr[$j].'",';
		}
	$csv_output .= "\r\n";
	}
	
	$filename = $file."_".date("Y-m-d_H-i",time());
	
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mac') !== false) {
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	} else {
		header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
	}
	
	header("Content-disposition: csv" . date("Y-m-d") . ".csv");
	header("Content-disposition: filename=".$filename.".csv");
	print $csv_output;
	exit;

?>