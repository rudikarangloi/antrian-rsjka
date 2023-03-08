<?php
	ini_set('display_errors', '0');	
	include "mysql_connect.php";
	
    $id = $_POST['id'];	
	
	$result = $mysqli->query("UPDATE data_antrian SET status= 2,status_error='',waktudilayani=NOW(),terlayani='1' WHERE id=".$id.""); 
	if (!$result)
		echo json_encode(array('status'=>0));
	else
		echo json_encode(array('status'=>1));
	
	include 'mysql_close.php';
	
