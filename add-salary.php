<!-- [ Session ] start -->
<?php 
    include("session.php"); 
    include("process/dbh.php");
    
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
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
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
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="add-salary.php">Pay Salary</a></li>
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
                                            <h5>Pay Salary</h5>
                                            <div class="text-right m-3">
                                            <!-- <button onclick="window.location='Addcategory.php';" type="button" class="btn btn-sm btn-primary">View Category</button> -->
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <!--  <form action="process/assignnewproject.php" method="POST" enctype="multipart/form-data"> -->
                                                      
                                                <form method="POST" action="process/addsalary.php" enctype="multipart/form-data">
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Employees Name</label>
                                                                    <select class="form-control" id="sel_depart" name="sel_depart">
                                                                        <option default value="0">- Select -</option>
                                                                        <?php
                                                                            $sql_department = "SELECT * FROM tbl_users where u_role !='Store'";
                                                                            $department_data = mysqli_query($conn,$sql_department);
                                                                            while($row = mysqli_fetch_assoc($department_data) ){
                                                                                $departid = $row['u_id'];
                                                                                $depart_name = $row['u_name'];
                                                                                echo "<option value='".$departid."' >".$depart_name."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Salary Month</label>
                                                                    <input type="month" class="form-control" id="salarymonth" name="salarymonth" placeholder="Salary Month" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Salary Date</label>
                                                                    <input type="date" class="form-control" id="salarydate" name="salarydate" placeholder="Salary Date" max="<?= date('Y-m-d'); ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="display">
                                                                <div class="form-group col-md-3">
                                                                    <label>Basic Salary</label>
                                                                    <input type="text" class="form-control" id="basicsalary" name="basicsalary" placeholder="Basic Salary" readonly="true" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Advance</label>
                                                                    <input type="text" class="form-control" id="advance" name="advance" placeholder="Advance" readonly="true" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Total Days Worked</label>
                                                                    <input type="text" class="form-control" id="totalworkdays" name="totalworkdays" placeholder="Total Worked Days" readonly="true" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Gross Salary Amount</label>
                                                                    <input type="text" class="form-control" id="grosssalary" name="grosssalary" placeholder="Total Amount" readonly="true" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Adjustment Amount</label>
                                                                    <input type="text" class="form-control" id="adjustment" name="adjustment" oninput="adjamount()" placeholder="Adjustment Amount" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Insentive</label>
                                                                    <input type="text" class="form-control" id="insentive" name="insentive" oninput="insamount()" placeholder="Insentive" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Total Payable Amount</label>
                                                                    <input type="text" class="form-control" id="totalamount" name="totalamount" placeholder="Total Payable Amount" required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Payment Method</label>
                                                                    <input type="text" class="form-control" id="pmethod" name="pmethod" placeholder="Cash/NEFT/Chaque No." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                             <button id="btnadd" type="submit" name="btnadd" class="btn btn-primary">PAID</button>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#display").hide();
            $("#adjustment").val('0');
            $("#insentive").val('0');

            //For hide show Fields based on month select
            $("#sel_depart").change(function(){
                $('#salarymonth').val('');
                if($('#salarymonth').val()!="" && $(this).val() > 0){
                    $("#display").show();
                }
                else{
                    $("#display").hide();
                }
            });

            //For getting the salary amount, basic salary and worked hours
            $('#salarymonth').on('change', function() {
                if($(this).val()!="" && $('#sel_depart').val() > 0){
                    $("#display").show();
                }
                else{
                    $("#display").hide();
                }
                var deptid = $("#sel_depart").val();
                var monthvalue = $(this).val();
                $.ajax({
                    url: "process/salaryamount.php",
                    type: "POST",
                    data: {month:monthvalue,depart:deptid},
                    dataType: 'json',
                    success: function(value){
                        $("#basicsalary").val(value[0]);
                        $("#advance").val(value[1]);
                        $("#grosssalary").val(value[2]);
                        $("#totalamount").val(parseInt(value[2])-parseInt(value[1]));
                        $("#totalworkdays").val(value[3]);
                    }
                });
            });
        });

        function adjamount()
        {
            var val1 = document.getElementById("grosssalary").value;
            var val2 = document.getElementById("adjustment").value;
            var val3 = document.getElementById("insentive").value;
            var val4 = document.getElementById("advance").value;
            if(val2 != "" && val3 != "" || val2 != ""){
                document.getElementById("totalamount").value = (parseInt(val1)+parseInt(val2)+parseInt(val3))-parseInt(val4);
            }
            else{
                document.getElementById("totalamount").value = (parseInt(val1)+parseInt(val3))-parseInt(val4);
            }
        }

        function insamount()
        {
            var val1 = document.getElementById("grosssalary").value;
            var val2 = document.getElementById("adjustment").value;
            var val3 = document.getElementById("insentive").value;
            var val4 = document.getElementById("advance").value;
            if(val2 != "" && val3 != "" || val3 != ""){
                document.getElementById("totalamount").value = (parseInt(val1)+parseInt(val2)+parseInt(val3))-parseInt(val4);
            }
            else{
                document.getElementById("totalamount").value = (parseInt(val1)+parseInt(val2))-parseInt(val4);
            }
        }

    </script>
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
