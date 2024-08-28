<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bytewave";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}

	
	$id = $_GET['ID'];
	
	$sql = "delete from serviceType where id=".$id;
	$requete = mysqli_query($conn,$sql) ;			
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../services-type.php"</SCRIPT>';
  
?>