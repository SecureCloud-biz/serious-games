<?php
	require_once('../../../inc/db/connect.php');
	$referenceTitle = mysql_real_escape_string($_POST['reference-title']);
	$referenceURL = stripslashes(mysql_real_escape_string($_POST['reference-url']));
	$referenceID = $_POST['reference-id'];
	$referenceQuery = "UPDATE referencetable SET referenceTitle ='$referenceTitle', referenceURL ='$referenceURL' WHERE referenceID = '$referenceID'";
	mysql_query ($referenceQuery);
	header('location:../../modules.php');
?>