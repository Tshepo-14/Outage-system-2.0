<?php
session_start();
require_once "connection.php";

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

	header ("Location: login.php");
}


if (isset($_GET['del'])){
	$idzz = $_GET['del'];
   
    echo $idzz;

	$quer="DELETE FROM outages WHERE id=$idzz";
    mysqli_query($con, $quer);
    
	//$_SESSION['message'] = "Address deleted!"; 
	header('Location: tech_edit.php');
}

?>