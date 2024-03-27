<!-- [ Session ] start -->
    <?php include("process/session.php") ?>
<!-- [ Session ] end -->
<?php

require_once ('process/dbh.php');
//$sql = "SELECT * from `employee_leave`";
$sql = "Select tbl_users.u_id, tbl_users.u_name, tbl_userleave.ul_startdate, tbl_userleave.ul_enddate,tbl_userleave.ul_datetime, tbl_userleave.ul_reason, tbl_userleave.ul_status, tbl_userleave.ul_id From tbl_users, tbl_userleave Where tbl_users.u_id = tbl_userleave.ul_uid ORDER BY `tbl_userleave`.`ul_id` DESC";

//echo "$sql";
$result = mysqli_query($conn, $sql);
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
                                                <li class="breadcrumb-item"><a href="emp-leaveapprove.php">Employee Leave</a></li>
                                                <li class="breadcrumb-item"><a href="#!">All Leave Application</a></li>
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
                                            <h3>List Of Employee Leave Application</h3>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Employeeleave.php"><i class='feather icon-check-circle'> PDF</i></a>

                                                <a class='btn btn-sm btn-success' href="Excel/Employeeleave.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th style='display:none;'>uid</th>
                                                            <th style='display:none;'>ulid</th>
                                                            <th>Name</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
															<th>Date Time</th>
                                                            <th>Total Days</th>
                                                            <th>Reason</th>
                                                            <th>Status</th>
                                                            <th>Approve | Cancel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter=1;
                                                            while ($users = mysqli_fetch_assoc($result)) {
                                                                $counter;
                                                                
                                                                    $date1_ts = strtotime($users['ul_startdate']);
                                                                    $date2_ts = strtotime($users['ul_enddate']);
                                                                    $diff = $date2_ts - $date1_ts;
                                                                    $dateDiff =  (round($diff / 86400))+1;
                                                                
                                                            	//echo "difference " . $interval->days . " days ";
                                                                echo "<tr>";
                                                                echo "<td style='display:none;'>".$users['u_id']."</td>";
                                                                echo "<td style='display:none;'>".$users['ul_id']."</td>";
                                                                echo "<td>".$counter++."</td>";
                                                                echo "<td>".$users['u_name']."</td>";
                                                                echo "<td>".$users['ul_startdate']."</td>";
                                                                echo "<td>".$users['ul_enddate']."</td>";
																echo "<td>".$users['ul_datetime']."</td>";
                                                                echo "<td>".$dateDiff."</td>";
                                                                echo "<td class='text-wrap width-200'>".$users['ul_reason']."</td>";
                                                                echo "<td>".$users['ul_status']."</td>";
                                                                if($users['ul_status']=='Approved'){
                                                                     echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-success' href=\"leaveapprove.php?id=$users[u_id]&token=$users[ul_id]\"><i class='feather icon-check-circle'></i>Approve</a><a class='btn btn-sm btn-danger' href=\"leavecancle.php?id=$users[u_id]&token=$users[ul_id]\"><i class='feather icon-slash'></i>Cancel</a></td>";
                                                                 }else{
                                                                echo "<td><a class='btn btn-sm btn-success' href=\"leaveapprove.php?id=$users[u_id]&token=$users[ul_id]\"><i class='feather icon-check-circle'></i>Approve</a><a style='pointer-events:none;' class='btn btn-sm btn-danger' href=\"leavecancle.php?id=$users[u_id]&token=$users[ul_id]\"><i class='feather icon-slash'></i>Cancel</a></td>";
                                                            }
                                                            }
                                                        ?>
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
     <?php if(isset($_SESSION['status']) && $_SESSION['status'] != ''){?>
    <script>
        swal({
          /*title: "Good job!",*/
          text: "<?php echo $_SESSION['status'];?>",
          icon: "<?php echo $_SESSION['status_code'];?>",
          button: "Ok",
        });
    </script>
    <?php
        unset($_SESSION['status'],$_SESSION['status_code']);
    }?>
    <?php include("footer.php") ?>
</body>

</html>
