<?php
   session_start();
   require_once "connection.php";
   
   if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
   
       header ("Location: login.php");
   }

   if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $record=mysqli_query($con,"select * from outages where id=$id");
    $countD=mysqli_num_rows($record);
    
   if($countD==1){
        $n=mysqli_fetch_array($record);
        $citye=$n['city'];
        $outage=$n['outages'];
        $progres=$n['progress'];
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Outage System dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="tech_index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   <!--Sidebar Icon-->
                </div>
                <div class="sidebar-brand-text mx-3">Outage System Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="tech_index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

        

            <li class="nav-item active">
                <a class="nav-link" href="tech_edit.php">
                    <i class="fas fa-bolt"></i>
                    <span> Edit Faults</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group" hidden>
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for outages..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                                                <!-- Nav Item - Alerts -->
                                                <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <!--insert a loop to show all people that are reporting a fault --> 
                                <?php 
                                ?>
                                <!-- have a stored for all reported to alert admin-->
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <?php
                                        //create a loop to show information from reportz to show users in which area are querying the system
                                        $complains=0;

                                        //$sql="select * from outages where serviceID=$city";
                                    
                                        $sql="select * from reportz";
                                        $result= mysqli_query($con, $sql);
                                        $detail=0;
                                        $city="";
                                    
                                    ?>
                                    
                                    <?php
                                         while($row = mysqli_fetch_array($result)) { ?>
                                         <p>
                                    
                                        <span class="font-weight-bold"><?php echo $row['numPeople']; ?> users from <?php echo $row['city']; ?> have reported a fault</span>  
                                   
                                    </p>
                                    <?php
                                    }
                                    ?>
                                    
                                </a>

                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Technician </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- code for adding outages dropdown-->

                    <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add outages </h5>
                              <i class='fa fa-close'></i>
                              <!--<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="close"></button> -->
                            </div>
                            <div class="modal-body">
                                <!-- contents for city and what outage is e.g we are looking into outage -->
                               
                            </div>

                            <div class="modal-footer">
                              <
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- Content Row -->
                    <div class="row">
                    <?php
                        $query = "select count(*) from outages";
                        $qresult = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($qresult);
                        $count = $row["count(*)"];

                    ?>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" hidden>
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Outages </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$count"; ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" hidden>
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ongoing Faults </div>
                                                <!--ongoing faults will be displayed here -->
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hashtag text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" hidden>
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                            $queryup = " SELECT SUM(numPeople) AS TotalItemsOrdered FROM reportz";
                            $qresultup = mysqli_query($con, $queryup);
                            $rowup = mysqli_fetch_assoc($qresultup);
                            $countup = $rowup["TotalItemsOrdered"];
                            ?>

                        <!-- Pending Requests Card Example -->
                        <!-- have alerts of same customer checking system in same area -->
                        <div class="col-xl-3 col-md-6 mb-4" hidden>
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Customers reporting faults </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$countup"; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                       
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit faults </h6>
                                </div>
                                <!--Form that lets admin or tech add faults-->
                                <form name="f1" action="update.php" method="POST">
                                    <div class="form-group" style="margin: auto">
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                        <label for="email">Area:</label>
                                        <input type="text" class="form-control" id="area" name= "area" style="width: 80%;" value="<?php echo $citye;?>" required>

                                        <label for="comment">Latest update:</label>
                                        <textarea class="form-control" rows="5" id="updatep" name="updatep" style="width: 80%;" required> <?php echo $outage;?> </textarea>
                                        <br>
                                        <label for="Progress" class="form-label">Progress 0% -100%</label>
                                        <br>
                                        <input type="text" class="form-control" id="progress" name= "progress" style="width: 80%;" value="<?php echo $progres; ?>" required>
                                        <br>
                                        <button class="btn-primary" type="submit" name="update" >update</button>
                                    </div> 
                                </form>
                            </div>
                        </div>

                           

                        </div>

                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!--  Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Edit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- This we have php block to view all values of logged in user -->
                    <form name ="f2" action="editProfile.php" method="POST"><!--Form to save new tech ID,  username and password-->
                                <div class="form-group">
                                <div class="form-group">
                                              <label for="email">Tech ID:</label>
                                              <input type="text" class="form-control" id="email" disabled name="techid" required>
                                              <label for="email">Email address:</label>
                                              <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="pwd">Password:</label>
                                              <input type="password" class="form-control" id="pwd" name="pass" required>
                                            </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <input type ="submit" class="btn btn-primary" value="Update">
                                            </div>
                    </form> 

                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>

        let map = google.maps.Map, heatmap = google.maps.visualization.HeatmapLayer;

        function myMap() {
            var location={lat:  -30.559482, lng:  22.937506};
            var map = new google.maps.Map(document.getElementById("googleMap"),{
            zoom: 5.5,
            center: location
            });

            var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);


            var tourplan= new google.maps.Circle({
                center: new google.maps.LantLang(-30.559482, 22.937506),
                rafius: 9000000,
                strokeColor: "#0000FF",
                strokeOpacity:0.6 ,
                strokeWeight: 2,
                fillOpacity: 0.4,
                
            });

            tourplan.setMap(map);
        }
       google.maps.event.addDomListener(window, 'load' ,loadmap);
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEbZlMy7yIOiOfMAs3bADikQKLl5n8u5Q&callback=myMap"></script>

</body>

</html>