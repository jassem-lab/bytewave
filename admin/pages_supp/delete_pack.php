<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "majdoub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}

	
	$id = $_GET['ID'];
	$sql = "select * from sponsoringpacks where id=".$id ; 
	$req = mysqli_query($conn , $sql);
	while ($enreg = mysqli_fetch_array($req)) {
		$titre = $enreg["titre"] ; 
	}

	$sql3 = "delete from sponsoringpacks where id=".$id;
	$requete3 = mysqli_query($conn,$sql3) ;			
		
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../pack-sponsoring.php"</SCRIPT>';
  
?>