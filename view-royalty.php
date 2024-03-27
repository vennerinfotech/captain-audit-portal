<!-- [ Session ] start -->
<?php 
    include 'process/dbh.php';
    include("process/session.php");
    
    if (isset($_POST["importRoyalty"])) {
    $fileName = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {
            $counter = 0;
            if (($handle = fopen($fileName, "r")) !== FALSE) {
                while (($data123 = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($counter++ == 0) continue;
                    // $frandno = rand();
                    mysqli_query($conn,"insert into tbl_royalty (u_id, s_date, e_date, month, amount, stuts) values ('".$data123[0]."','".$_POST['royaltyStartDate']."','".$_POST['royaltyEndDate']."','".$_POST['royaltyMonth']."','".$data123[2]."','".$data123[3]."')") or die(mysqli_error($conn));

                    // $result1 = mysqli_query($conn,"SELECT  * FROM tbl_users where u_id = '".$_SESSION['id']."'");
                    // $row1=mysqli_fetch_assoc($result1);
                    // $filenamelog = "Logfile/".$frandno.".txt";
                    // $content = $row1['u_name']." ".$_POST['status']." ".date('Y-m-d')." "."\n";   
                    // $fp = fopen($filenamelog,"a");
                    // fwrite($fp,$content);
                    // fclose($fp);
                }
                // fclose($handle);
                header("Location:view-royalty.php");
            }

        }
    }

    if($_GET['action'] == "createcsv")
    {
        ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large

        //create a file
        $filename = "export_royalty_".date("Y.m.d").".csv";
        $csv_file = fopen('php://output', 'w');
        
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'"');

        // This is your sql query to pull that data you need exported
        $results = mysqli_query($conn,"SELECT * FROM tbl_users where u_role = 'Store' ") or die(mysqli_error($conn));
        ob_end_clean();
        // The column headings of your .csv file
        $header_row = array("uid", "username", "amount", "status");
        fputcsv($csv_file,$header_row,',','"');
        
        // Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
        foreach($results as $result)
        {
            // Array indexes correspond to the field names in your db table(s)
            $row = array(
                $result['u_id'],
                $result['u_name'],
            );
            fputcsv($csv_file,$row);
        }
        
        exit();   
    }
    
?>
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
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="view-royalty.php">View Royalty</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->


                            <?php
                        if(isset($_GET["stid"]))
                        {
                            $st="Paid";
                            if($_GET["status"]=="Unpaid")
                            {
                                $st="Paid";
                            }
                            else
                            {
                                $st="Unpaid";
                            }
                            mysqli_query($conn,"update  tbl_royalty set stuts='$st' where royalty_id='".$_GET["stid"]."'") or die(mysqli_error($conn));
                            echo "<script>window.location='view-royalty.php';</script>";
                        }
                        ?>


                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Royalty</h5>
                                             <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewroyalty.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewroyalty.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Store Name</th>
                                                            <th>Amount</th>
                                                            <th>From Date</th>
                                                            <th>Due Date</th>
                                                            <th>Royalty Month</th>
                                                            <th>Submit Date</th>
                                                            <th>Total Day</th>
                                                            <th>Stauts</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php
                                                $count=1;
                                                $result=mysqli_query($conn,"SELECT * FROM `tbl_royalty`, `tbl_users` where `tbl_royalty`.u_id = `tbl_users`.u_id ") or die(mysqli_error($conn));
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>


                                                        <tr>
                                                            <td><?php echo $count;$count++; ?></td>
                                                            <td><?php echo $row["u_name"]; ?></td>
                                                            <td><?php echo $row["amount"]; ?></td>
                                                            <td><?php echo $row["s_date"]; ?></td>
                                                            <td><?php echo $row["e_date"]; ?></td>
                                                            <td><?php echo $row["month"]; ?></td>
                                                            <td><?php echo $row["sdate"]; ?></td>
                                                            <td>
                                                                <?php 
                                                                    $date1_ts = strtotime($row['e_date']);
                                                                    $date2_ts = strtotime($row['sdate']);
                                                                    $diff = $date2_ts - $date1_ts;
                                                                    $dateDiff =  round($diff / 86400);
                                                                    if($row["sdate"]==""){
                                                                        echo "";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $dateDiff;
                                                                    }
                                                                    
                                                                ?></td>
                                                            <td>
                                                            <a class="btn btn-sm btn-info" href="?stid=<?php echo $row["royalty_id"]; ?>&status=<?php echo $row["stuts"]; ?>"><?php echo $row["stuts"]; ?></a></td>

                                                            <td>

                                                          <button type="button" onclick="window.location='update-royalty.php?edit=<?php echo $row["royalty_id"]; ?>'" class="btn btn-sm btn-info">Update</button> </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
									<!-- import lead -->
                                    <?php if($_SESSION['role'] == "Admin"){?>
                                        <div class="row">
                                            <!-- [ form-element ] start -->
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Import Royalty</h5>
                                                        <div class="text-right m-3">
                                                        <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form class="form-horizontal" action="" method="post"   name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                                                    <div class="form-group col-md-12">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4">
                                                                                <label>Choose CSV File</label>
                                                                                <input type="file" name="file" id="file" accept=".csv" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4">
                                                                                <label>Start Date</label>
                                                                                <input type="date" class="form-control" id="royaltyStartDate" name="royaltyStartDate" placeholder="Start Date" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label>End Date</label>
                                                                                <input type="date" class="form-control" id="royaltyEndDate" name="royaltyEndDate" placeholder="End Date" max="<?= date('Y-m-d'); ?>" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label>Month</label>
                                                                                <input type="month" class="form-control" id="royaltyMonth" name="royaltyMonth" placeholder="Month" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <!-- <a class="btn btn-secondary" href="Logfile/royalty.csv">Sample File</a> -->
                                                                        <a class="btn btn-secondary" href='?action=createcsv'>Sample File</a>
                                                                        <button id="btnadd" name="importRoyalty" class="btn btn-primary">Import</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- [ form-element ] end -->
                                            <!-- [ Main Content ] end -->
                                        </div>
                                    <?php } ?>
                                    <!-- import lead end -->
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
