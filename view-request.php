<!-- [ Session ] start -->
<?php include 'process/dbh.php';
include("process/session.php");
?>
<!-- [ Session ] end -->
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Captain Audit Portal</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
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

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .wrapper1 {
            display: block;
            width: 100%;
            overflow-x: auto;
        }

        .wrapper1 {
            height: 20px;
        }

        .div1 {
            width: 1080px;
            height: 20px;
        }
    </style>
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
                                                <li class="breadcrumb-item"><a href="#!">Request Management</a></li>
                                                <li class="breadcrumb-item"><a href="view-request.php">View Request</a></li>
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
                                                <a class='btn btn-sm btn-success' href="Excel/ViewRequest.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="wrapper1">
                                                <div class="div1"></div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <?php
                                                            if ($_SESSION['role'] == 'Admin') {
                                                                echo "<th>Store Name</th>";
                                                            }
                                                            ?>
                                                            <th>Subject</th>
                                                            <th>Request Description / Detail</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <?php
                                                            if ($_SESSION['role'] == 'Admin') {
                                                                echo "<th>Approval</th>";
                                                                echo "<th>Assign</th>";
                                                            }
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $count = 1;
                                                        if ($_SESSION['role'] == "Admin") {
                                                            $result = mysqli_query($conn, "SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id = `tbl_users`.u_id") or die(mysqli_error($conn));
                                                        } else {
                                                            $result = mysqli_query($conn, "SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id ='" . $_SESSION['id'] . "'  AND `tbl_complain`.u_id = `tbl_users`.u_id ") or die(mysqli_error($conn));
                                                        }

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                                    <td><?php echo $row["u_name"]; ?></td>
                                                                <?php } ?>
                                                                <td><?php echo $row["selectpur"]; ?></td>
                                                                <td><?php echo $row["note"]; ?></td>
                                                                <td><?php echo $row["created_at"]; ?></td>
                                                                <?php
                                                                if ($row['status'] == 'Accepted') { ?>
                                                                    <td style="color:green;"><?php echo $row["status"]; ?></td>
                                                                <?php } else { ?>
                                                                    <td style="color:red;"><?php echo $row["status"]; ?></td>
                                                                <?php }
                                                                ?>

                                                                <?php

                                                                if ($_SESSION['role'] == 'Admin') {
                                                                    if ($row['status'] == 'Accepted') {
                                                                        echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-success' href=\"process/complainapprove.php?id=$row[u_id]&token=$row[com_id]\"><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                        echo "<td><a class='btn btn-sm btn-primary' href='request-assign.php?id=$row[com_id]'><i class='feather icon-check-circle'></i>Assign</a></td>";
                                                                    } else {
                                                                        echo "<td><a class='btn btn-sm btn-success' href='process/requestApprove.php?id=$row[com_id]'><i class='feather icon-check-circle'></i>Accept</a></td>";
                                                                        echo "<td><a style='pointer-events:none;' class='btn btn-sm btn-primary' href='request-assign.php?id=$row[com_id]'><i class='feather icon-check-circle'></i>Assign</a></td>";
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
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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