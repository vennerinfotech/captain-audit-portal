<!-- [ Session ] start -->
<?php
include 'process/dbh.php';
include("process/session.php");
$totalP = 0;
$totalA = 0;
if (isset($_POST["search"])) {
    if ($_POST['mdate'] != "" && $_POST['txtselcat'] != '') {

        $mdate = date("m", strtotime($_POST['mdate']));
        $ydate = date("Y", strtotime($_POST['mdate']));
        $user = $_POST['txtselcat'];

        if ($_SESSION['role'] == "Admin") {
            $result = mysqli_query($conn, "SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
                        project.status as status,project.subdate as subdate
                        FROM `project`,`tbl_users` 
                        WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '$user' AND month(project.duedate) = '$mdate' AND year(project.duedate) = '$ydate'
                        order by project.pid desc") or die(mysqli_error($conn));

            $resultattand = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id and month(tbl_dayselfi.cdate) = '$mdate' AND year(tbl_dayselfi.cdate) = '$ydate' AND `tbl_dayselfi`.u_id = '$user'") or die(mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, "SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
                        project.status as status,project.subdate as subdate
                        FROM `project`,`tbl_users` 
                        WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '" . $_SESSION['id'] . "'  AND month(project.duedate) = '$mdate' AND year(project.duedate) = '$ydate'
                        order by project.pid desc ") or die(mysqli_error($conn));

            $resultattand = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='" . $_SESSION['id'] . "' and `tbl_users`.u_id = '" . $_SESSION['id'] . "' AND month(tbl_dayselfi.cdate) = '$mdate' AND year(tbl_dayselfi.cdate) = '$ydate' ") or die(mysqli_error($conn));
        }
    }
} else {
    if ($_SESSION['role'] == "Admin") {
        $result = mysqli_query($conn, "SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
                        project.status as status,project.subdate as subdate
                        FROM `project`,`tbl_users` 
                        WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee'") or die(mysqli_error($conn));

        $resultattand = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id ORDER BY tbl_dayselfi.day_id DESC") or die(mysqli_error($conn));
    } else {
        $result = mysqli_query($conn, "SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
                        project.status as status,project.subdate as subdate
                        FROM `project`,`tbl_users` 
                        WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '" . $_SESSION['id'] . "' ") or die(mysqli_error($conn));

        $resultattand = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='" . $_SESSION['id'] . "' and `tbl_users`.u_id = '" . $_SESSION['id'] . "' ORDER BY tbl_dayselfi.day_id DESC") or die(mysqli_error($conn));
    }
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
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="The Brand Landmark" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/webl.png" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="lightbox/css/lightbox.min.css">
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
                                                <!--  <h5 class="m-b-10">Bootstrap Basic Tables</h5> -->
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="view-expense.php">Task Evaluation</a></li>
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
                                            <h5>View Records</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <form action="" method="POST">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Employee Name</label>
                                                                <select type="text" class="form-control" id="txtselcat" name="txtselcat" placeholder="Select Store Name" required>
                                                                    <?php
                                                                    echo "<option value='0' >Default</option>";
                                                                    if ($_SESSION['role'] == "Admin") {
                                                                        $sql_emp = "SELECT * FROM tbl_users where u_role='Employee'";
                                                                    } else {
                                                                        $sql_emp = "SELECT * FROM tbl_users where u_role='Employee' and u_id = '" . $_SESSION['id'] . "'";
                                                                    }
                                                                    $emp_data = mysqli_query($conn, $sql_emp);
                                                                    while ($row = mysqli_fetch_assoc($emp_data)) {
                                                                        $departid = $row['u_id'];
                                                                        $emp_name = $row['u_name'];
                                                                        echo "<option value='" . $departid . "' >" . $emp_name . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Month</label>
                                                                <input class="form-control" type="month" name="mdate" id="mdate" required>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <button style="float:right;" class='btn btn-success' onclick="record(this.value)" value="filter"><i class='feather icon-check-circle'></i>Filter Excel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Task Status</h5>
                                            <div style="float: right;">
                                                <!-- <a class='btn btn-sm btn-danger' href="PDF/Viewexpense.php"><i class='feather icon-check-circle'> PDF</i></a> -->
                                                <a class='btn btn-sm btn-success' href="Excel/TaskEvaluation.php?st="><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Employee Name</th>
                                                            <th>Task Name</th>
                                                            <th>Start Date</th>
                                                            <th>Due Date</th>
                                                            <th>Submit Date</th>
                                                            <th>Status</th>
                                                            <th>Points</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        $totaldays = 0;
                                                        $diffdays = 0;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $sdate = $row['startdate'];
                                                            $sdate = new DateTime($sdate);
                                                            $sdate = $sdate->format('Y-m-d');

                                                            $edate = $row['duedate'];
                                                            $edate = new DateTime($edate);
                                                            $edate = $edate->format('Y-m-d');

                                                            // if ($row['subdate'] != "" || $row['subdate'] != "0000-00-00 00:00:00") {
                                                            //     $submitdate = $row['subdate'];
                                                            //     $submitdate = new DateTime($submitdate);
                                                            //     $submitdate = $submitdate->format('Y-m-d');
                                                            //     $date1 = date_create($edate);
                                                            //     $date2 = date_create($submitdate);
                                                            //     $diff = date_diff($date2, $date1);
                                                            //     $days = $diff->format("%R%a");
                                                            // } else {
                                                            //     $submitdate = date("Y-m-d");
                                                            //     $date1 = date_create($edate);
                                                            //     $date2 = date_create($submitdate);
                                                            //     $diff = date_diff($date2, $date1);
                                                            //     $days = $diff->format("%R%a");
                                                            // }

                                                            if (!empty($row['subdate']) && $row['subdate'] != "0000-00-00 00:00:00") {
                                                                $submitdate = new DateTime($row['subdate']);
                                                                $submitdate = $submitdate->format('Y-m-d');
                                                            } else {
                                                                $submitdate = date("Y-m-d");
                                                            }
                                                            
                                                            $date1 = date_create($edate);
                                                            $date2 = date_create($submitdate);
                                                            $diff = date_diff($date2, $date1);
                                                            $days = $diff->format("%R%a");
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <td><?php echo $row["u_name"]; ?></td>
                                                                <td class='text-wrap width-200'><?php echo $row["pname"]; ?></td>
                                                                <td><?php echo $sdate; ?></td>
                                                                <td><?php echo $edate; ?></td>
                                                                <td><?php echo $submitdate; ?></td>
                                                                <?php
                                                                if ($row["status"] == "Submitted") { ?>
                                                                    <td style="color:green;"><?php echo $row["status"]; ?></td>
                                                                <?php } else { ?>
                                                                    <td style="color:red;"><?php echo $row["status"]; ?></td>
                                                                <?php }
                                                                ?>
                                                                <?php
                                                                $totaldays = $totaldays + 5;
                                                                if ($days >= 0) { ?>
                                                                    <td style="color:green;"><?php echo 5;
                                                                                                $diffdays += 5; ?></td>
                                                                <?php } else if ($days < 0) { ?>
                                                                    <td style="color:red;"><?php echo $days;
                                                                                            $diffdays += (int)$days; ?></td>
                                                                <?php }
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th><?= 'Total Point : ' . $totaldays; ?></th>
                                                            <th><?= 'Achieve Point : ' . $diffdays; ?></th>
                                                            <th><?php if ($totaldays > 0) {
                                                                    echo 'Averag : ' . round(($diffdays * 100) / $totaldays, 2) . '%';
                                                                } else {
                                                                    echo "Averag : 0%";
                                                                } ?></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Attendance</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example1" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Action</th>
                                                            <th>Store Name</th>
                                                            <th>Image</th>
                                                            <th>In-Date/Time</th>
                                                            <th>Image</th>
                                                            <th>Out-Date/Time</th>
                                                            <th>Working Hours</th>
                                                            <th>Points</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        $totalPoint = 0;
                                                        $totalGetPoint = 0;

                                                        while ($row = mysqli_fetch_assoc($resultattand)) {
                                                            $totalPoint = $totalPoint + 5;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $date1 = $row["cdate"];
                                                                    $date2 = $row["udate"];
                                                                    if ($_SESSION['role'] == 'Admin') { ?>
                                                                        <button type="button" onclick="window.location='process/delete-attandense.php?edit=<?php echo $row['day_id']; ?>'" class="btn btn-sm btn-danger">Delete</button>
                                                                        <button type="button" <?php if ($date2 != "") echo "disabled"; ?> onclick="window.location='out-attandence.php?edit=<?php echo $row["day_id"]; ?>'" class="btn btn-sm btn-info">Out Attendance</button>
                                                                    <?php } else { ?>
                                                                        <button type="button" <?php if ($date2 != "") echo "disabled"; ?> onclick="window.location='out-attandence.php?edit=<?php echo $row["day_id"]; ?>'" class="btn btn-sm btn-info">Out Attendance</button>
                                                                    <?php } ?>

                                                                </td>
                                                                <td><?php echo $row["u_name"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/morningself/<?php echo $row["image"] ?>" data-lightbox="example-1"><img class="example-image" src="Upload/morningself/<?php echo $row["image"]; ?>" style="height: 50px; width: 50px;" /></a>
                                                                </td>
                                                                <td><?php echo $row["cdate"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/eveningself/<?php echo $row["oimage"] ?>" data-lightbox="example-1"><img class="example-image" src="Upload/eveningself/<?php echo $row["oimage"]; ?>" style="height: 50px; width: 50px;" /></a>
                                                                </td>
                                                                <td><?php echo $row["udate"]; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row["udate"] == "") {
                                                                        echo "0";
                                                                    } else {
                                                                        echo $hour = round((strtotime($date2) - strtotime($date1)) / 3600, 1);
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($row["udate"] == "") {
                                                                        echo 0;
                                                                        $totalGetPoint = $totalGetPoint + 0;
                                                                    } else {
                                                                        echo 5;
                                                                        $totalGetPoint = $totalGetPoint + 5;
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th><?= "Total Point: " . $totalPoint; ?></th>
                                                            <th><?= "Achived Point: " . $totalGetPoint; ?></th>
                                                            <th><?php if ($totalPoint > 0) {
                                                                    echo "Average: " . round(($totalGetPoint * 100) / $totalPoint, 2) . "%";
                                                                } else {
                                                                    echo "Averag : 0%";
                                                                } ?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Point Score</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Total: <?= $totalP = $totaldays + $totalPoint; ?></h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Achived: <?= $totalA = $diffdays + $totalGetPoint; ?></h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Average: <?php if ($totalP > 0) {
                                                                        echo "Average: " . round(($totalA * 100) / $totalP, 2) . "%";
                                                                    } else {
                                                                        echo "Averag : 0%";
                                                                    } ?></h5>
                                                </div>
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
    <script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script type="text/javascript">
        function record(val) {
            if ($("#mdate").val() != "") {
                window.location.href = 'Excel/TaskEvaluation.php?st=' + $("#mdate").val() + '&uid=' + $("#txtselcat").val();
            } else {
                alert("Please Select Date Range Wisely !!");
            }
        }
    </script>
    <?php include("footer.php") ?>
</body>

</html>