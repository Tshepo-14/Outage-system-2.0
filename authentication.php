<?php
require_once "connection.php";


    $username=$_POST['user'];
    $password=$_POST['pass'];
    
    $username_err = $password_err = $login_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        //password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
       
    }
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      

        $sql = "select * from admin where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        

        $sqlz= "select * from tech where username = '$username' and password='$password'";
        $resultz= mysqli_query($con, $sqlz);
        $rowz = mysqli_fetch_array($resultz, MYSQLI_ASSOC);
        $countz = mysqli_num_rows($resultz);  

        $seconds = 5 + time();
    

        if($count == 1) {  
            //echo "<h1> Successful </h1>";
            session_start();
            $_SESSION['login'] = "1";
            //retrieve admin id and set as refe to use throughout application
            $sqlA="select id from admin where username = '$username' and password = '$password'";
            $resultA= mysqli_query($con, $sqlA);
            
            $num_recordA=mysqli_num_rows($resultA);

            //loop through to find value
            while($row = mysqli_fetch_array($resultA)) {
                $num_recordA=$num_recordA+1;
                if($num_recordzz>0)
                {
                 $refe=$row["id"];
                }
            }

            //set a parameter for retrieving the ID of afmin to be used throughout program
            header("location: admin_index.php");

        }elseif($countz==1){
            session_start();
            $_SESSION['login'] = "1";
            header("location: tech_index.php");
            //set a parameter for tech index id to be used throughout program

            //create a new page for tech and remove tech register option 
        }else{     
            //insert javascript code stating wrong information
           echo "<script>  
           alert('Please enter correct login details');
           location.href = 'login.php';
           </script>"; 
           session_start();
		   $_SESSION['login'] = '';
        }     

?>