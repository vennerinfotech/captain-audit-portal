<!-- [ Session ] start -->
<?php
include 'process/session.php';
include('process/dbh.php');

if (isset($_POST["search"])) {
    $startdate = $_POST['rDate'];
    $outlets = isset($_POST['outlets']) ? $_POST['outlets'] : "";
    if ($_SESSION['role'] == 'Admin') {
        $employee = isset($_POST['employee']) ? $_POST['employee'] : "";
    } else {
        $employee = $_SESSION['id'];
    }

    if ($startdate != "" && $outlets != "" && $employee != "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_oid` = '$outlets' and `r_uid` = '$employee' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } elseif ($startdate != "" && $outlets != "" && $employee == "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_oid` = '$outlets' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } elseif ($startdate == "" && $outlets == "" && $employee != "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_uid` = '$employee' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } elseif ($startdate == "" && $outlets != "" && $employee == "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_oid` = '$outlets' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } elseif ($startdate != "" && $outlets == "" && $employee != "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_uid` = '$employee' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } elseif ($startdate != "" && $outlets == "" && $employee == "") {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } else {
        if ($_SESSION['role'] == 'Admin') {
            $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` ORDER BY `r_id` DESC") or die(mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_uid` = '" . $_SESSION['id'] . "' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
        }
    }
} else {
    if ($_SESSION['role'] == 'Admin') {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` ORDER BY `r_id` DESC") or die(mysqli_error($conn));
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_reporting` where `r_uid` = '" . $_SESSION['id'] . "' ORDER BY `r_id` DESC") or die(mysqli_error($conn));
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
                                                <!-- <h5 class="m-b-10">Bootstrap Basic Tables</h5> -->
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="userdashboard.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Reporting</a></li>
                                                <li class="breadcrumb-item"><a href="#!">View Reporting</a></li>
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
                                                <div class="form-group col-md-10">
                                                    <form action="" method="POST">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <input class="form-control" type="date" name="rDate" id="rDate" data-date-format="dd-mm-YYYY" placeholder="Please Enter First Date" required>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" id="outlets" name="outlets">
                                                                    <option disabled="disabled" selected="selected">Select outlet</option>
                                                                    <?php
                                                                    $resultoutlet = mysqli_query($connpos, "SELECT id, outlet_name FROM tbl_outlets") or die(mysqli_error($connpos));
                                                                    while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) { ?>
                                                                        <option value="<?= $rowoutlet['id']; ?>"><?= $rowoutlet['outlet_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                                <div class="form-group col-md-3">
                                                                    <select class="form-control" id="employee" name="employee">
                                                                        <option disabled="disabled" selected="selected">Select Employee</option>
                                                                        <?php
                                                                        $resultuser = mysqli_query($conn, "SELECT u_id, u_name FROM tbl_users") or die(mysqli_error($conn));
                                                                        while ($rowuser = mysqli_fetch_assoc($resultuser)) { ?>
                                                                            <option value="<?= $rowuser['u_id']; ?>"><?= $rowuser['u_name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="form-group col-md-2">
                                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="form-group col-md-2">
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
                                            <h5>View Reporting</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-success' href="Excel/ViewReporting.php?st=&oid=&uid="><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive ">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Employee Name</th>
                                                            <th>Outlet Name</th>
                                                            <th>Date</th>
                                                            <th>Task attended</th>
                                                            <th>Task Pending/Postpone</th>
                                                            <th>Challenges</th>
                                                            <th>Waiting from</th>
                                                            <th>Alarming task</th>
                                                            <th>Routine Task</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        $totalPoint = 0;
                                                        $totalGetPoint = 0;

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $totalPoint = $totalPoint + 5;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <td><?php echo $row['r_uname']; ?></td>
                                                                <td><?php echo $row['r_outletname']; ?></td>
                                                                <td><?php echo $row['r_date']; ?></td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo nl2br($row['r_attend']); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo nl2br($row['r_ptask']); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo nl2br($row['r_ctask']); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo nl2br($row['r_wtask']); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo nl2br($row['r_altask']); ?></div>
                                                                </td>
                                                                <td>
                                                                    <div class='text-wrap width-200'><?php echo str_replace(",", "<br>", $row['r_routinetask']); ?></div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script type="text/javascript">
        function record(val) {
            if ($("#stdate").val() != "" && $("#enddate").val() != "") {
                window.location.href = 'Excel/ViewReporting.php?rdate=' + $("#rDate").val() + '&oid=' + $("#outlets").val() + '&uid=' + $("#employee").val();
            } else {
                alert("Please Select Date Wisely !!");
            }
        }
    </script>
    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                /*title: "Good job!",*/
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>
    <?php
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <?php include("footer.php") ?>
</body>

</html>