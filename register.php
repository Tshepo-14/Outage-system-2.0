<?php
require_once "connection.php";

    $tech_id=$_POST['techid'];
    $email=$_POST['email'];
    $passwordz=$_POST['pass'];
   
    $sql = "INSERT INTO tech (id, username, password) VALUES ('$tech_id', '$email', '$passwordz')";

    if (mysqli_query($con, $sql)) {

      
        header("location: register_tech.php");

    } else {
       
    header("location: register_tech.php");
    echo "Error: " . $sql . "<br>" . mysqli_error($con);

    }

?>