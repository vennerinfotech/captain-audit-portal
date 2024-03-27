<!-- [ Session ] start -->
<?php
include 'process/dbh.php';
include("process/session.php");

if (isset($_POST["search"])) {
    if ($_POST['stdate'] != "" && $_POST['stdate'] != "") {
        $startdate = date("Y-m-d", strtotime($_POST['stdate']));
        $enddate = date('Y-m-d', strtotime($_POST['enddate'] . ' + 1 days'));

        if ($_SESSION['role'] == "Admin") {
            $result = mysqli_query($conn, "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id = tbl_users.u_id and tbl_category.cat_id=tbl_expense.cat_id and tbl_expense.date between '$startdate' and '$enddate' order by tbl_expense.expense_id desc") or die(mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id='" . $_SESSION['id'] . "' and tbl_users.u_id='" . $_SESSION['id'] . "' and tbl_category.cat_id=tbl_expense.cat_id and tbl_expense.date between '$startdate' and '$enddate' order by tbl_expense.expense_id desc") or die(mysqli_error($conn));
        }
    }
} else {
    if ($_SESSION['role'] == "Admin") {
        $result = mysqli_query($conn, "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id = tbl_users.u_id and tbl_category.cat_id=tbl_expense.cat_id order by tbl_expense.expense_id desc") or die(mysqli_error($conn));
    } else {
        $result = mysqli_query($conn, "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id='" . $_SESSION['id'] . "' and tbl_users.u_id='" . $_SESSION['id'] . "' and tbl_category.cat_id=tbl_expense.cat_id order by tbl_expense.expense_id desc") or die(mysqli_error($conn));
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
                                                <li class="breadcrumb-item"><a href="view-expense.php">View Expense</a></li>
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
                                            <h5>View Expense</h5>
                                            <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewexpense.phpst=&end="><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewexpense.php?st=&end="><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div>
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Employee Name</th>
                                                            <th>Category Name</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Note</th>
                                                            <th>Image</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count;
                                                                    $count++; ?></td>
                                                                <td><?php echo $row["u_name"]; ?></td>
                                                                <td><?php echo $row["cat_name"]; ?></td>
                                                                <td><?php echo $row["date"]; ?></td>

                                                                <td><?php echo $row["amount"]; ?></td>
                                                                <td><?php echo $row["note"]; ?></td>
                                                                <td>
                                                                    <a class="example-image-link" href="Upload/expense/<?php echo $row['image']; ?>" data-lightbox="example-1"><img src="Upload/expense/<?php echo $row["image"]; ?>" style="height: 50px; width: 50px;" class="example-image" /></a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->

    <!-- Warning Section Ends -->
    <script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script type="text/javascript">
        function record(val) {
            if ($("#stdate").val() != "" && $("#enddate").val() != "") {
                window.location.href = 'Excel/Viewexpense.php?st=' + $("#stdate").val() + '&end=' + $("#enddate").val();
            } else {
                alert("Please Select Date Range Wisely !!");
            }
        }
    </script>
    <?php include("footer.php") ?>
</body>

</html>