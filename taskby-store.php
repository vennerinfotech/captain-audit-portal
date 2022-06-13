
<!-- [ Session ] start -->
    <?php include("session.php") ?>
<!-- [ Session ] end -->
<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `tbl_users`";

//echo "$sql";
$result = mysqli_query($conn, $sql);
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Captain Audit Portal</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Captain Audit Portal is specially designed for management of any brand easily. Here you can track all processes of your business. Captain Audit Portal is product of THE BRAND LANDMARK" />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="The Brand Landmark" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/webl.png" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <?php include("navbar.php") ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?php include("header.php") ?>
    <!-- [ Header ] end -->
    
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="">Store Task</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Contextual-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Store Task</h3>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Store Name</th>
                                                            <th>Project Name</th>
                                                            <th>Start Date</th>
                                                            <th>Due Date</th>
                                                            <th>Priority</th>
                                                            <th>Status</th>
                                                            <th>Task Assign</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                $count=1;
                                                 /*$result=mysqli_query($conn,"SELECT * FROM `tbl_admintask` where task_id='".$_SESSION['id']."'") or die(mysqli_error($conn));*/

                                                $result=mysqli_query($conn,"SELECT * FROM `tbl_admintask`, `tbl_users` where `tbl_admintask`.store_id = `tbl_users`.u_id") or die(mysqli_error($conn));


                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>


                                                <tr>
                                                            <td><?php echo $count;$count++; ?></td>
                                                            <td><?php echo $row["u_name"]; ?></td>
                                                            <td><?php echo $row["p_naem"]; ?></td>
                                                            <td><?php echo $row["s_date"]; ?></td>
                                                            <td><?php echo $row["e_date"]; ?></td>
                                                            <td><?php echo $row["t_priority"]; ?></td>
                                                            
                                                                <?php 
                                                                    if($row['status']=="Assigned"){?>
                                                                        <td style="color:green;"><?php echo $row["status"]; ?></td>
                                                                        <td>
                                                                        <button style="pointer-events: none;" type="button" onclick="window.location='aassign.php?edit=<?php echo $row["task_id"];?>'" class='btn btn-sm btn-success'><i class="feather icon-check-circle"></i>Assign</button>
                                                                    </td>
                                                                   <?php }else{?>
                                                                    <td style="color:red;"><?php echo $row["status"]; ?></td>
                                                                        <td><button type="button" onclick="window.location='aassign.php?edit=<?php echo $row["task_id"];?>'" class='btn btn-sm btn-success'><i class="feather icon-check-circle"></i>Assign</button></td>
                                                                   <?php }
                                                                ?>

                                                          
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Contextual-table ] end -->
                                <!-- [ form-element ] end -->
                                <!-- [ Main Content ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <?php include("footer.php") ?>
</body>

</html>
<!-- <a class='btn btn-sm btn-info' href=\"edit-user.php?id=$users[u_id]\">Edit</a> -->