<!-- [ Session ] start -->
<?php 

    include 'process/dbh.php';
    include("process/session.php");

    $result = mysqli_query($conn,"SELECT  * FROM tbl_salary ORDER BY s_id DESC ") or die(mysqli_error($conn));
        
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
                                                <li class="breadcrumb-item"><a href="view-salary.php">View Salary</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>View Salary</h5>
                                             <!-- <div style="float: right;">
                                                <a class='btn btn-sm btn-danger' href="PDF/Viewroyalty.php"><i class='feather icon-check-circle'> PDF</i></a>
                                                <a class='btn btn-sm btn-success' href="Excel/Viewroyalty.php"><i class='feather icon-check-circle'> EXCEL</i></a>
                                            </div> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table id="example" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Print</th>
                                                            <th>Employee Name</th>
                                                            <th>Salary Month</th>
                                                            <th>Salary Date</th>
                                                            <th>Basic Salary</th>
                                                            <th>Advance</th>
                                                            <th>Total Worked Days</th>
                                                            <th>Gross Salary Amount</th>
                                                            <th>Adjustment Amount</th>
                                                            <th>Incentive Amount</th>
                                                            <th>Total Payable Amount</th>
                                                            <th>Payment Method</th>
                                                            <th>EDIT</th>
                                                            <th>DELETE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $count=1;
                                                            while($row=mysqli_fetch_assoc($result)){?>
                                                            <tr>
                                                            <td><?php echo $count;?></td>
                                                            <td><button type="button" class="btn btn-success btn-sm" onClick="printDiv('printarea<?php echo $count;?>')">Print</button></td>
                                                            <td>
                                                                <?php 
                                                                $result1 = mysqli_query($conn,"SELECT  * FROM tbl_users where u_id = '".$row["u_id"]."'");
                                                                $row1=mysqli_fetch_assoc($result1);
                                                                echo $row1["u_name"]; 
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row["s_month"]; ?></td>
                                                            <td><?php echo $row["s_date"]; ?></td>
                                                            <td><?php echo $row["s_basicsalary"]; ?></td>
                                                            <td><?php echo $row["s_advamount"]; ?></td>
                                                            <td><?php echo $row["s_tdworked"]; ?></td>
                                                            <td><?php echo $row["s_gsamount"]; ?></td>
                                                            <td><?php echo $row["s_adjamount"]; ?></td>
                                                            <td><?php echo $row["s_insamount"]; ?></td>
                                                            <td><?php echo $row["s_tpamount"]; ?></td>
                                                            <td><?php echo $row["s_paymethod"]; ?></td>
                                                            <td>
                                                            <a class="btn btn-sm btn-info" href="update-salary.php?stid=<?php echo $row["s_id"]; ?>">EDIT</a></td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" onclick='removedata(<?php echo $row["s_id"]; ?>)'>Delete</button>
                                                            </td>
                                                            
                                                            <td style="display:none;" id="printarea<?php echo $count;?>">
                                                            <style>
                                                                #customers {
                                                                  font-family: Arial, Helvetica, sans-serif;
                                                                  border-collapse: collapse;
                                                                  width: 100%;
                                                                  margin-top: 20px;
                                                                }

                                                                #customers td, #customers th {
                                                                  border: 1px solid #ddd;
                                                                  padding: 8px;
                                                                }
                                                            </style>
                                                                <div class="row" style="padding: 11px;">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex justify-content-end" style="text-align: right;"> <span>Date : <?php echo $row["s_date"]; ?></span> </div>
                                                                    <div class="text-center lh-1 mb-2">
                                                                        <h2 class="fw-bold" style="text-align: center;">Payslip</h2><span class="fw-normal">Payment slip for the month of <?php echo $row["s_month"]; ?></span>
                                                                    </div>
                                                                    <div class="text-center lh-1 mb-2">
                                                                        <span class="fw-normal">Employee Name : <?php echo $row1["u_name"]; ?></span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <table id="customers">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th >Description</th>
                                                                                    <th scope="col">Amount</th>
                                                                                    <th scope="col">Description</th>
                                                                                    <th scope="col">Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Basic Salary</td>
                                                                                    <td><?php echo $row["s_basicsalary"]; ?></td>
                                                                                    <td>Advance</td>
                                                                                    <td><?php echo $row["s_advamount"]; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Total day worked</td>
                                                                                    <td><?php echo $row["s_tdworked"]; ?></td>
                                                                                    <td>Gross Salary Amount</td>
                                                                                    <td><?php echo $row["s_gsamount"]; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Adjesment Amount</td>
                                                                                    <td><?php echo $row["s_adjamount"]; ?></td>
                                                                                    <td>Insentive Amount</td>
                                                                                    <td><?php echo $row["s_insamount"]; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Total Paid Amount</td>
                                                                                    <td><?php echo $row["s_tpamount"]; ?></td>
                                                                                    <td>Payment Method</td>
                                                                                    <td><?php echo $row["s_paymethod"]; ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div style="text-align:right;margin-top: 50px;">
                                                                        <div class="d-flex flex-column mt-2"><span class="mt-4">Authorised Signatory</span> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                                        </td>
                                                        </tr>
                                                        <?php $count++; } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if(isset($_POST["btnremove"]))
                                    {
                                        $res=mysqli_query($conn,"DELETE FROM tbl_salary where s_id='".$_POST["hfdid"]."'");
                                        if($res) echo "<script>window.location='view-salary.php';</script>";
                                    }
                                ?>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Remove </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <form method="post">
                                            <div class="modal-body">
                                               Are you sure want to delete this record ?
                                               <input type="hidden" name="hfdid" id="hfdid">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" name="btnremove" class="btn btn-primary">Yes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->
                                <!-- [ inverse-table ] start -->
    
                                <!-- [ Background-Utilities ] end -->
                            </div>
                            <div class="container mt-5 mb-5">
    
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function removedata(val)
        {
            $("#hfdid").val(val);
        }

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            w=window.open();
            w.document.write(printContents);
            w.print();
            w.close();
        }
    </script>
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
