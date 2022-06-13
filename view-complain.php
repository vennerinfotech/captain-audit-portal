<!-- [ Session ] start -->
<?php include 'process/dbh.php';?>
    <?php include("session.php") ?>
<!-- [ Session ] end -->
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
    <section class="pcoded-main-container">
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
                                                <!-- <h5 class="m-b-10">Bootstrap Basic Tables</h5> -->
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                 <li class="breadcrumb-item"><a href="#!">Complain Management</a></li>
                                                <li class="breadcrumb-item"><a href="view-complain.php">View Complain</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->


                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Complain</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewcomplain.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewcomplain.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Store Name</th>
                                                            <th>Subject</th>
                                                            <th>Purpose</th>
                                                            <th>Status</th>
                                                            <?php

                                                            if($_SESSION['role']=='Admin')
                                                            {
                                                                echo "<th>Approval</th>"; 
                                                            }
                                                            else 
                                                            {
                                                               echo "<th style='display:none;'>Approval</th>"; 
                                                            }

                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php

                                                $count=1;
                                                if($_SESSION['role']=="Admin")
                                                {
                                                    $result=mysqli_query($conn,"SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id = `tbl_users`.u_id") or die(mysqli_error($conn));
                                                }
                                                elseif ($_SESSION['role']=="Store") 
                                                {
                                                    $result=mysqli_query($conn,"SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id ='".$_SESSION['id']."'  AND `tbl_users`.u_id = '".$_SESSION['id']."'") or die(mysqli_error($conn));
                                                }
                                                else
                                                {
                                                    return;
                                                }
                                                
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>

                                                        <tr>
                                                            <td><?php echo $count;$count++; ?></td>
                                                            <td><?php echo $row["u_name"]; ?></td>
                                                            <td><?php echo $row["selectpur"]; ?></td>
                                                            <td><?php echo $row["note"]; ?></td>
                                                            <?php 
                                                                if($row['status']=='Accepted'){?>
                                                                    <td style="color:green;"><?php echo $row["status"]; ?></td>
                                                                <?php }else{ ?>
                                                                    <td style="color:red;"><?php echo $row["status"]; ?></td>
                                                               <?php }
                                                            ?>
                                                            
                                                            <?php

                                                            if($_SESSION['role']=='Admin')
                                                            {
                                                                if($row['status']=='Accepted'){
                                                                    echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-success' href=\"process/complainapprove.php?id=$row[u_id]&token=$row[com_id]\"><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                }else{
                                                                    echo "<td><a class='btn btn-sm btn-success' href=\"process/complainapprove.php?id=$row[u_id]&token=$row[com_id]\"><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                }
                                                                
                                                            }
                                                            else 
                                                            {
                                                                if($row['status']=='Accepted'){
                                                                    echo "<td><a style='display:none;' class='btn btn-sm btn-success' href=\"process/complainapprove.php?id=$row[u_id]&token=$row[com_id]\"><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                }else{
                                                                    echo "<td><a style='display:none;' class='btn btn-sm btn-success' href=\"process/complainapprove.php?id=$row[u_id]&token=$row[com_id]\"><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                }
                                                            }  
                                                            ?>
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->
                                <!-- [ inverse-table ] start -->
    
                                <!-- [ Background-Utilities ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->

    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

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
