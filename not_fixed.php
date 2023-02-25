<?php
require_once "connection.php";

   

    $sqlp="select * from users where city='$city'";
    $resultz= mysqli_query($con, $sqlp);
    $detail=1;
    $num_record=mysqli_num_rows($resultz);
    $num_recordzz;

    while($row = mysqli_fetch_array($resultz)) {
        //$num_recordzz=$num_recordzz+1;
        if($num_recordzz>0)
        {
         $detail=$row["counts"];
         $detail=$detail+1;

         $sqlu="UPDATE `reportz` SET `numPeople`=$complains";
         mysqli_query($con,$sqlu);
         

        }
        else{
            //$sqlup = "INSERT INTO user (city, counts) VALUES ('$city', '$details')";
            //mysqli_query($con, $sqlup);
            echo "else loop";
        }
    }

    $sql = "INSERT INTO user (city, counts) VALUES ('$city', '$detail')";

    if (mysqli_query($con, $sql)) {
        header("location: user_index.php");
        echo "$city";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        header("location: user_index.php");
      }
?>