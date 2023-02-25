<?php
require_once "connection.php";
    $cityz = $_POST['search'];
    


    $sql = "select * from outages where city like '%$cityz%'";

    $result = $con->query($sql);    

                if ($result->num_rows > 0){
                while($row = $result->fetch_assoc() ){
                    //echo $row["name"]."  ".$row["age"]."  ".$row["gender"]."<br>";
                    echo "<script>  
                    alert('Please note there is currently a outage for stated city and we are currently investigating');
                    location.href = 'user_index.php';
                    </script>"; 
                }
                } else {
                    echo "<script>  
                    alert('Please note there is currently no outages for stated city');
                    location.href = 'user_index.php';
                    </script>"; 
                }
$con->close();

?>
