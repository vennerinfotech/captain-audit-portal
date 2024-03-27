<!-- [ Session ] start -->
<?php
include 'process/dbh.php';
include("process/session.php");

$sql1 = "SELECT * FROM `tbl_users`";
$result1 = mysqli_query($conn, $sql1);
date_default_timezone_set('Asia/Kolkata');
$result = mysqli_query($conn, "SELECT * FROM `tbl_complain` where `com_id` = '" . $_GET['id'] . "'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result);
$outletId = $data['u_id'];
$taskName = $data['selectpur'];
$userId = $data['u_id'];
$taskStatus = $data['status'];
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
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="The Brand Landmark" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/webl.png" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

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
                                                <li class="breadcrumb-item"><a href="">Task Management</a></li>
                                                <li class="breadcrumb-item"><a href="emp-projectassign.php">Assign Project</a></li>
                                                <li class="breadcrumb-item"><a href="emp-projectassign.php">Edit Project</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Assign Project</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="process/requestAssign.php" method="POST">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label>Employee Name</label>
                                                                <select class="form-control" id="selectedEmployee" name="selectedEmployee" required>
                                                                    <option disabled="disabled">Default...</option>
                                                                    <?php while ($users = mysqli_fetch_assoc($result1)) {
                                                                        echo "<option value=" . $users['u_id'] . ">" . $users['u_name'] . "</option>";
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Project Name</label>
                                                                <input type="text" class="form-control" id="TaskName" name="TaskName" placeholder="Enter Project Name" readonly="true" value="<?php echo $taskName; ?>" required>
                                                                <input type="hidden" id="outletId" name="outletId" value="<?php echo $outletId; ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Start Date</label>
                                                                <input type="datetime-local" class="form-control" id="Startdate" name="startDate" value="<?php echo date('Y-m-d\TH:i'); ?>" placeholder="Start Date">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Due Date</label>
                                                                <input type="datetime-local" class="form-control" id="Enddate" name="endDate" value="<?php echo date('Y-m-d\TH:i'); ?>" placeholder="Due Date">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <button type="submit" name="" class="btn btn-primary">Submit</button>
                                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <!-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/> -->

    <script>
        $("#Username").chosen();
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