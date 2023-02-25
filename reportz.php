<?php
require_once "connection.php";

    $complains=1;

    $sql="select * from reportz where city='$city'";
    $result= mysqli_query($con, $sql);
    $detail=0;
    $num_record=mysqli_num_rows($result);
    $num_recordzz;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Outage System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <!--<a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
            can unhide but this is for tab to show admin and technician  functionality
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="index.html"> Admin </a></li>
                <li class="sidebar-nav-item"><a href="admin_index.html"> Technician </a></li>
            </ul>
        </nav>-->
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                
                    <?php
                    
                        while($row = mysqli_fetch_array($result)) {
                            $num_recordzz=$num_recordzz+1;
                            //$sqlf="select numPeople from reportz where city='$city'";
                            //$resultf= mysqli_query($con, $sqlf);
                            
                            if($num_recordzz>0)
                            {
                                //echo "There is a outage";
                                //echo "$resultf";
                                //echo "$row[numPeople]";
                                $detail=$row["numPeople"];
                                $complains=$complains+$detail;
                                //echo "$complains";
                                //echo "$complains";
                                //alter table sql
                                $sqlu="UPDATE reportz SET numPeople=$complains";
                                mysqli_query($con,$sqlu);
                                
                            }
                            else{
                                echo "There is no outage";
                                //instert sql
                                $sqla="INSERT INTO reportz (numPeople, city) VALUES ('$complains','$city')";
                                mysqli_query($con,$sqla);
                            }
                            //find a way if we can automatically add city with 5 people querying table to outages
                            //limitations will be users can query the report page more than 5 times \
                            //having one user automatically create a outage
                        }

                    ?>
                    <h1 class="mb-1">Outage system</h1>
                    <h3 class="mb-5"><em>System administrator will be notified of problem in <? echo "$city";  ?>, in the mean time please make sure there is 
                    power to unit and system has been rebooted.
                    <h3> Please find reference <? echo "$city"; ?> </h3>


                </em></h3>
                <a class="btn btn-primary btn-xl" href="index.php">Home</a>
            </div>
        </header>
        <!-- About-->
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                <p class="text-muted small mb-0">By Tshepo Molaoa &copy; Outage System 2022</p>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
