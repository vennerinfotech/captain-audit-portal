<!-- [ Session ] start -->
<?php
include 'process/session.php';
include('process/dbh.php');

if (isset($_POST["search"])) {
    if ($_POST['stdate'] != "" && $_POST['enddate'] != "") {
        $startdate = date("Y-m-d", strtotime($_POST['stdate']));
        $enddate = date('Y-m-d', strtotime($_POST['enddate'] . ' + 1 days'));

        if ($_SESSION['role'] == "Admin") {
            $result = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id and tbl_dayselfi.cdate between '$startdate' and '$enddate'") or die(mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='" . $_SESSION['id'] . "' and `tbl_users`.u_id = '" . $_SESSION['id'] . "' and tbl_dayselfi.cdate between '$startdate' and '$enddate' ") or die(mysqli_error($conn));
        }
    }
} else {
    if ($_SESSION['role'] == 'Admin') {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id ORDER BY tbl_dayselfi.day_id DESC") or die(mysqli_error($conn));
        print_r($result);
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='" . $_SESSION['id'] . "' and `tbl_users`.u_id = '" . $_SESSION['id'] . "' ORDER BY tbl_dayselfi.day_id DESC") or die(mysqli_error($conn));
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

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <!-- Full-screen loader -->
        <div id="loader" style="display: block; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%;  text-align: center;  background-color: rgba(0, 0, 0, 0.8);">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);color:white;font-size: x-large;">
                Loading...
            </div>
        </div>
    <?php
    }
    ?>

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
                                                <li class="breadcrumb-item"><a href="#!">Attendance Management</a></li>
                                                <li class="breadcrumb-item"><a href="view-attandence.php">Out Attendance</a></li>
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
                                                            <div class="form-group col-md-4">
                                                                <input class="form-control" type="date" name="stdate" id="stdate" data-date-format="dd-mm-YYYY" placeholder="Please Enter First Date">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <input class="form-control" type="date" name="enddate" id="enddate" data-date-format="dd-mm-YYYY" placeholder="Please Enter Last Date">
                                                            </div>
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
                                            <h5>View Attendance</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewattendence.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewattendence.php?st="><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Action</th>
                                                            <th>User Name</th>
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

                                                        while ($row = mysqli_fetch_assoc($result)) {
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
                                                                        <button type="button" <?php if ($date2 != "") echo "disabled"; ?> onclick="window.location='out-attandence.php?edit=<?php echo $row['day_id']; ?>'" class="btn btn-sm btn-info">Out Attendance</button>
                                                                    <?php } else { ?>
                                                                        <button type="button" <?php if ($date2 != "") echo "disabled"; ?> onclick="window.location='out-attandence.php?edit=<?php echo $row['day_id']; ?>'" class="btn btn-sm btn-info">Out Attendance</button>
                                                                    <?php } ?>

                                                                </td>
                                                                <td><?php echo $row["u_name"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/morningself/<?php echo $row['image'] ?>" data-lightbox="example-1"><img class="example-image" src="Upload/morningself/<?php echo $row['image']; ?>" style="height: 50px; width: 50px;" /></a>
                                                                </td>
                                                                <td><?php echo $row["cdate"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/eveningself/<?php echo $row['oimage'] ?>" data-lightbox="example-1"><img class="example-image" src="Upload/eveningself/<?php echo $row['oimage']; ?>" style="height: 50px; width: 50px;" /></a>
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
                                                            <th>
                                                                <?php
                                                                $val1 = $totalPoint;
                                                                $val2 = $totalGetPoint;
                                                                if ($val2 != 0) {
                                                                    $res = ($val1 / $val2) * 100;
                                                                    // 1 digit after the decimal point
                                                                    $res = round($res, 1); // 66.7
                                                                    echo "Success: " . $res . "%";
                                                                } else {
                                                                    echo "Average: 0";
                                                                }
                                                                ?>
                                                            </th>
                                                        </tr>
                                                    </tfoot>
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
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script type="text/javascript">
        function record(val) {
            if ($("#stdate").val() != "" && $("#enddate").val() != "") {
                window.location.href = 'Excel/Viewattendence.php?st=' + $("#stdate").val() + '&end=' + $("#enddate").val();
            } else {
                alert("Please Select Date Range Wisely !!");
            }
        }
    </script>
    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            }).then(function() {
                // Hide loader after dialog is closed
                var loader = document.getElementById('loader');
                loader.style.display = 'none';
            });
        </script>

    <?php
        // Unset session variables after displaying the message
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <?php include("footer.php") ?>
</body>

</html>