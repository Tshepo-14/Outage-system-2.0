<?php

session_start();
require_once "connection.php";

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

	header ("Location: tech_index.php");
}


if(isset($_POST['update'])){
    $id=$_POST['techid'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    mysqli_query($con, "UPDATE tech SET email='$email', password='$password' WHERE nmb=$id");
    echo '<script> alert("Tech record updated succesfully"); </script>';
    header('location: tech_index.php');

}


?>