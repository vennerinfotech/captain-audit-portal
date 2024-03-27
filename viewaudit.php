<!-- [ Session ] start -->
<?php include 'process/dbh.php'; ?>
<?php include("process/session.php") ?>
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
                                                <li class="breadcrumb-item"><a href="viewaudit.php">View Audit</a></li>
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
                                            <h5>View Audit</h5>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Auditor Name</th>
                                                            <th>Store Name</th>
                                                            <th>Audit Date-Time</th>
                                                            <th>PDF</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        if ($_SESSION['role'] == "Admin") {
                                                            $result = mysqli_query($conn, "SELECT id, txtname, u_name, `time`, form_id, store_id  FROM `tbl_staudit`, `tbl_users` WHERE `tbl_users`.u_id = `tbl_staudit`.store_id") or die(mysqli_error($conn));
                                                        } else if (($_SESSION['role'] == "Store")) {
                                                            $result = mysqli_query($conn, "SELECT id, txtname, u_name, `time`, form_id, store_id FROM `tbl_staudit`, `tbl_users` WHERE `tbl_users`.u_id = `tbl_staudit`.store_id and `tbl_staudit`.store_id='" . $_SESSION['id'] . "'") or die(mysqli_error($conn));
                                                        } else {
                                                            $result = mysqli_query($conn, "SELECT id, txtname, u_name, `time`, form_id, store_id  FROM `tbl_staudit`, `tbl_users` WHERE `tbl_users`.u_id = `tbl_staudit`.store_id and `tbl_staudit`.emp_id='" . $_SESSION['id'] . "'") or die(mysqli_error($conn));
                                                        }

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row["txtname"]; ?></td>
                                                                <td><?php echo $row["u_name"]; ?></td>
                                                                <td><?php echo $row["time"]; ?></td>
                                                                <?php
                                                                $filename = 'PDF/auditpdf/' . $row["form_id"] . '.pdf';

                                                                if (file_exists($filename)) {
                                                                    echo "<td><a class='btn btn btn-sm btn-danger' href='$filename'>View PDF</a></td>";
                                                                } else {
                                                                    echo "<td><a class='btn btn btn-sm btn-success' href=\"PDF/Viewaudit.php?id=$row[id]&mu=$row[u_name]\">Generate PDF</a></td>";
                                                                }
                                                                ?>
                                                                <?php ?>
                                                                <?php echo "<td><a class='btn btn btn-sm btn-primary' href=\"updaudit-portal.php?id=$row[id]\">Edit</a></td>"; ?>
                                                            </tr>
                                                        <?php $count++;
                                                        } ?>
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

    <?php include("process/script.php") ?>
    <?php include("footer.php") ?>
</body>

</html>