<?php      
    $host = "sql309.epizy.com"; 
    $user = "epiz_33314110";  
    $password = "uYw3aJ4e6583kiC";  
    $db_name = "epiz_33314110_outagesystem";  
    $id_ref=0;
    $refe=0;
    //ID ref lets us save ID of tech of admin and use throughout program 
    
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 
    
    
    $user_ip=getenv('REMOTE_ADDR');
    $geo= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    $idz=(int) fread($handle,20);

    $country=$geo["geoplugin_countryName"];
    $city=$geo["geoplugin_city"];
?>  