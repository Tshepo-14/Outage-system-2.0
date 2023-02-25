<?php
require_once "connection.php";

    $cityz=$_POST['area'];
    $updatez=$_POST['update'];
    $progress=$_POST['progress'];



    $sql = "INSERT INTO outages (city, outages, progress) VALUES ('$cityz', '$updatez','$progress')";
    //mysqli_query($con,$sql);

    //before this i want to create a condition that removes the entry from reportz if a admin is creating
    //another entry that matches the city for example remove johannesburg from reportz if admin is adding outahe
    
    
    if (mysqli_query($con, $sql)) {

      echo "<script> alert('done');</script>";
      header("location: tech_add.php");

  } else {
     
  header("location: tech_add.php");
  echo "Error: " . $sql . "<br>" . mysqli_error($con);

  }

?>