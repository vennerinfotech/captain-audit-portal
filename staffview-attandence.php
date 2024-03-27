<!-- [ Session ] start -->
<?php include 'process/session.php'; ?>
<?php include('process/dbh.php') ?>
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
                                                <li class="breadcrumb-item"><a href="#!">Attendance Management</a></li>
                                                <li class="breadcrumb-item"><a href="#!">View Attendance</a></li>
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
                                            <h5>View Attendance</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewstaffattendence.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewstaffattendence.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                                <th>Store Name</th>
                                                                <th>Staff Name</th>
                                                            <?php } else if ($_SESSION['role'] == 'staff') { ?>
                                                                <th style="display:none;">Store Name</th>
                                                                <th style="display:none;">Staff Name</th>
                                                            <?php } else { ?>
                                                                <th style="display:none;">Store Name</th>
                                                                <th>Staff Name</th>
                                                            <?php } ?>
                                                            <th>Image</th>
                                                            <th>In-Date/Time</th>
                                                            <th>Image</th>
                                                            <th>Out-Date/Time</th>
                                                            <th>Working Hours</th>
                                                            <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                                <th>Action</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        if ($_SESSION['role'] == 'Admin') {
                                                            $result = mysqli_query($conn, "SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff`where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id and `tbl_staff`.ustaff_id = `tbl_ststaffattendence`.staff_id") or die(mysqli_error($conn));
                                                        } else if ($_SESSION['role'] == 'staff') {
                                                            $result = mysqli_query($conn, "SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff` where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id and `tbl_users`.u_id='" . $_SESSION['id'] . "' and `tbl_ststaffattendence`.store_id = '" . $_SESSION['id'] . "' and tbl_staff.ustaff_id = tbl_ststaffattendence.staff_id and tbl_ststaffattendence.staff_id = '" . $_SESSION['staffid'] . "'") or die(mysqli_error($conn));
                                                        } else {
                                                            $result = mysqli_query($conn, "SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff` where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id and `tbl_users`.u_id='" . $_SESSION['id'] . "' and `tbl_ststaffattendence`.store_id = '" . $_SESSION['id'] . "' and tbl_staff.ustaff_id = tbl_ststaffattendence.staff_id") or die(mysqli_error($conn));
                                                        }

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                                    <td><?php echo $row["u_name"]; ?></td>
                                                                    <td><?php echo $row["staffame"]; ?></td>
                                                                <?php } else if ($_SESSION['role'] == 'staff') { ?>
                                                                    <td style="display:none;"><?php echo $row["u_name"]; ?></td>
                                                                    <td style="display:none;"><?php echo $row["staffame"]; ?></td>
                                                                <?php } else { ?>
                                                                    <td style="display:none;"><?php echo $row["u_name"]; ?></td>
                                                                    <td><?php echo $row["staffame"]; ?></td>
                                                                <?php } ?>

                                                                <td>
                                                                    <a class="example-image-link" href="Upload/staffateendence/<?php echo $row["cimage"]; ?>" data-lightbox="example-1"><img class="example-image" src="Upload/staffateendence/<?php echo $row["cimage"]; ?>" style="height: 50px; width: 50px;" /></a>
                                                                </td>
                                                                <td><?php echo $row["cdate"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/eveningself/<?php echo $row["uimage"]; ?>" data-lightbox="example-1"><img class="example-image" src="Upload/eveningself/<?php echo $row["uimage"]; ?>" style="height: 50px; width: 50px;" /></a>
                                                                </td>
                                                                <td><?php echo $row["udate"]; ?></td>
                                                                <?php
                                                                $date1 = $row["cdate"];
                                                                $date2 = $row["udate"]; ?>
                                                                <td>
                                                                    <?php
                                                                    if ($row["udate"] == "") {
                                                                        echo "";
                                                                    } else {
                                                                        echo $hour = round((strtotime($date2) - strtotime($date1)) / 3600, 1);
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                if ($_SESSION['role'] == 'Admin') { ?>
                                                                    <td>

                                                                        <button type="button" onclick="window.location='process/staffdelete-attandense.php?edit=<?php echo $row['storestaff_id']; ?>'" class="btn btn-sm btn-danger">Delete</button>
                                                                    </td>

                                                                <?php } ?>

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

    <script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <!-- Required Js -->
    <?php include("process/script.php") ?>
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