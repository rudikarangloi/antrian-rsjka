<?php
ini_set('display_errors', 0);

define('HostnameSA','localhost');
define('DatabaseSA','simrs_rsjka_data');
define('UsernameSA','root');
define('PasswordSA','');
define('PortSA','3306');

//$ConSA = mysqli_connect(HostnameSA.":".PortSA, UsernameSA, PasswordSA);
$ConSA = mysqli_connect("localhost", UsernameSA, PasswordSA);
$GLOBALS['_ConSA'] = $ConSA;
if ($ConSA==false)
{
	echo "Error: <font color='#FF0000'>Koneksi ke server tidak berhasil...!!</font>";
	exit;
}

function CallConnection($gDatabase,$gCon)
{
	//$SelDA =  mysql_select_db($gDatabase, $gCon);
	$SelDA =  mysqli_select_db($gCon,$gDatabase);
	if ($SelDA==false)
	{
		echo "Error: Database <font color='#FF0000'><b>".$gDatabase."</b></font> tidak ditemukan...!!";
		exit;
	}
}
?>
