<!-- [ Session ] start -->
<?php 
    include 'process/session.php';
    include('process/dbh1.php');
    $whOutlet = "";
    if(isset($_POST['searchRecord'])){
        $startMonth = "";
        $endMonth = "";
        $outlet_id = "";
        $startMonth = $_POST['stdate'];
        $endMonth = $_POST['enddate'];
        $outlet_id = $_POST['seloutlets'];
        echo $outlet_id;
        $where = "";
        if ($startMonth != '' && $endMonth != '' && $outlet_id != '') {
            $where = "and sale_date>='$startMonth' and  sale_date <= '$endMonth' and outlet_id = '$outlet_id'";
        }
        if ($startMonth != '' && $endMonth != '' && $outlet_id == '') {
            $where = "and sale_date>='".$startMonth."' and  sale_date <= '".$endMonth."'";
        }
        $result = mysqli_query($connpos,"SELECT sale_date,sum(total_payable) as total_payable, payment_method_id, outlet_id FROM tbl_sales WHERE del_status = 'Live' and order_status = '3' ".$where." group by sale_date, outlet_id") or die(mysqli_error($connpos));

    }else if(isset($_POST['createFilterExcel'])){
        $startMonth = "";
        $endMonth = "";
        $outlet_id = "";
        $startMonth = $_POST['stdate'];
        $endMonth = $_POST['enddate'];
        $outlet_id = $_POST['seloutlets'];
        // header("Location : ");
        header("Location: Excel/ViewPosTotalSale.php?oid=".$outlet_id."&sdate=".$startMonth."&edate=".$endMonth);
    } else {
        if ($_SESSION['outlet_id'] == 1){
            $result = mysqli_query($connpos,"SELECT sale_date,sum(total_payable) as total_payable, payment_method_id, outlet_id FROM tbl_sales WHERE del_status = 'Live' and order_status = '3' and sale_date >= 'subdate(CURDATE(), 1)' and  sale_date <= 'CURDATE()' group by sale_date, outlet_id") or die(mysqli_error($connpos));
            $whOutlet = "";
        } else {
            $result = mysqli_query($connpos,"SELECT sale_date,sum(total_payable) as total_payable, payment_method_id, outlet_id FROM tbl_sales WHERE del_status = 'Live' and order_status = '3' and outlet_id = '".$_SESSION['outlet_id']."' and sale_date >= 'subdate(CURDATE(), 1)' and  sale_date <= 'CURDATE()' group by sale_date, outlet_id") or die(mysqli_error($connpos));
            $whOutlet = "where id =".$_SESSION['outlet_id'];
        }
    }

    function Name($id, $conn){
        $result = mysqli_query($conn, "SELECT outlet_name from `tbl_outlets` where `id` = '$id'");  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){
            return $row['outlet_name'];
        }
    }
?>
<!-- [ Session ] end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captain Audit Portal</title>
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
                                                <li class="breadcrumb-item"><a href="view-posdailySale.php">View Daily Sale</a></li>
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
                                                <div class="form-group col-md-12">
                                                    <form action="" method="POST">
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                <input class="form-control" type="date" name="stdate" id="stdate" value="<?php echo date('Y-m-d');?>" data-date-format="dd-mm-YYYY" placeholder="Please Enter First Date" required>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <input class="form-control" type="date" name="enddate" id="enddate" value="<?php echo date('Y-m-d');?>" data-date-format="dd-mm-YYYY" placeholder="Please Enter Last Date" required>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" id="seloutlets" name="seloutlets">
                                                                    <option disabled value="" >Please Select</option>
                                                                    <?php 
                                                                    $resultoutlet = mysqli_query($connpos,"SELECT id, outlet_name FROM tbl_outlets $whOutlet") or die(mysqli_error($connpos));
                                                                    while($rowoutlet=mysqli_fetch_assoc($resultoutlet)) { ?>
                                                                    <option value="<?= $rowoutlet['id']; ?>"><?= $rowoutlet['outlet_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <input type="submit" name="searchRecord" class="btn btn-primary" value="Search">
                                                                <input type="submit" name="createFilterExcel" class="btn btn-success" value="Create Excel">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Daily Sale</h5>
                                            <!-- <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewattendence.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewattendence.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Date.</th>
                                                            <th>Outlet Name</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php $counter = 1; $total = 0; while($row=mysqli_fetch_assoc($result)) { $total += round($row['total_payable'], 2); ?>
                                                        <tr>
                                                            <td><?= $counter;$counter++; ?></td>
                                                            <td><?= $row['sale_date']; ?></td>
                                                            <td><?= Name($row['outlet_id'], $connpos); ?></td>
                                                            <td><?= round($row['total_payable'], 2); ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3"> Total </td>
                                                            <td><?= $total; ?></td>
                                                        </tr>
                                                    </tfoot>
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
