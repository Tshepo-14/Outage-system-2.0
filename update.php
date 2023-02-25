<?php
session_start();
require_once "connection.php";

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

	header ("Location: login.php");
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $citya=$_POST['area'];
    $outagesa=$_POST['updatep'];
    $progresa = $_POST['progress'];


    mysqli_query($con, "UPDATE outages SET city='$citya', outages='$outagesa', progress='$progresa' WHERE id=$id");
    echo '<script> alert("Updated"); </script>';
    header('location: tech_edit.php');

}



?>


