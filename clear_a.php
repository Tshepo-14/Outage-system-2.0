<?php
require_once "connection.php";
    
    $truncatetable="TRUNCATE TABLE outages";
    mysqli_query($con,$truncatetable);

                if($truncatetable !== FALSE)
                    {
                    echo "<script> alert('All records of outages have been cleared'); </script>";
                    header("location:admin_index.php");
                    }
                    else
                    {
                    echo("No rows have been deleted.");
                    }


    //before this i want to create a condition that removes the entry from reportz if a admin is creating
    //another entry that matches the city for example remove johannesburg from reportz if admin is adding outahe

?>