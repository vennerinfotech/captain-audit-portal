<!-- [ Session ] start -->
<?php include 'process/dbh.php'; ?>
<?php include 'process/dbh1.php'; ?>
<?php include("process/session.php");?>
<!-- [ Session ] end -->
<?php
    $data1 = array();
    $data = array();

    $resultping = mysqli_query($conn,"SELECT * FROM tbl_product_ingr") or die(mysqli_error($conn));
    while($rowping=mysqli_fetch_assoc($resultping)) {
        $data[] = $rowping['ingr_id'];
        $igrid = $rowping['ingr_id'];
        $data1[$igrid] = 0;
    }

    $sql = "SELECT sum(qty) as totalQty,food_menu_id,menu_name,code,sale_date
            FROM tbl_sales_details LEFT JOIN tbl_sales
            ON tbl_sales_details.sales_id = tbl_sales.id
            LEFT JOIN tbl_food_menus
            ON tbl_sales_details.food_menu_id = tbl_food_menus.id WHERE tbl_sales.del_status = 'Live' and tbl_sales.order_status = '3' and tbl_sales.sale_date = CURDATE() group by tbl_sales_details.food_menu_id";
    $result = mysqli_query($connpos, $sql) or die(mysqli_error($connpos));

    while($row=mysqli_fetch_assoc($result)) {

        $resultcntrl = mysqli_query($conn,"SELECT * FROM tbl_ingredient_control WHERE product_id = '".$row['food_menu_id']."'") or die(mysqli_error($conn));
        if (mysqli_num_rows($resultcntrl) == 0) {
            foreach ($data as $key => $value) {
                if (isset($data1[$key])) {
                   // Do bad things to the votes array
                    $data1[$key] += 0;
                }
            }
        } else {
            while($rowctrl=mysqli_fetch_row($resultcntrl)) {
                $jsondecode = json_decode($rowctrl[3], true);
                foreach ($data as $key => $value) {
                    if (array_key_exists($value, $jsondecode)){
                        $data1[$value] += $jsondecode[$value] * $row['totalQty'];
                    } else { 
                        $data1[$value] += 0;
                    }
                }
            }  
        }
    }
?>
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
                                                <li class="breadcrumb-item"><a href="add-product-ingridient.php">Closing</a></li>
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
                                            <h5>Add Closing</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="process/addDailyConsumption.php">

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <input type="date" min="<?= date('Y-m-d', strtotime("-1 days")); ?>" name="ingrDate" max="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                    <?php 

                                                    $data = array();

                                                    $result = mysqli_query($conn,"SELECT * from `tbl_dailyconsumption` WHERE `date`= subdate(CURDATE(), 1) and `outletid`='".$_SESSION['outlet_id']."' ") or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_row($result)) {
                                                        $data = json_decode($row[4], true);
                                                    }
                                                    $food_item_list = mysqli_query($conn,"SELECT * from `tbl_product_ingr`") or die(mysqli_error($conn));
                                                    while($row=mysqli_fetch_assoc($food_item_list)){
                                                            $iid = $row['ingr_id'];
                                                            $dataopen = 0;
                                                            if (array_key_exists($row['ingr_id'], $data)) {
                                                                $dataopen = $data[$iid];
                                                            }else{
                                                                $dataopen = 0;
                                                            }
                                                        ?>
                                                        <div class="form-group col-md-3">
                                                            <div class="form-inline">
                                                                <input type="checkbox" id="ingrCheckbox" name="ingredientId[]" data-id="<?= $row['ingr_id']; ?>" value="<?= $row['ingr_id']; ?>" onclick="getCheckboxId(this)"/>
                                                                <label>&nbsp;&nbsp;<?= $row['name'] ?> </label>
                                                            </div>
                                                            <hr>
                                                            <div class="form-inline">
                                                                <label>Opening</label>
                                                            </div>
                                                            <input type="number" name="ingredientopen[]" readonly id="inrclos<?= $row['ingr_id'] ?>" value="<?= $dataopen; ?>" placeholder="Enter consumption of <?= $row['name'] ?> here ..." readonly class="form-control"/>
                                                            <div class="form-inline">
                                                                <label>Closing</label>
                                                            </div>
                                                            <input type="number" name="ingredientclose[]" disabled="true" id="inrCons<?= $row['ingr_id'] ?>" placeholder="Enter ingridiant purchase here ..." 
                                                            value="0"
                                                            class="form-control"/>
                                                            <div class="form-inline">
                                                                <label>Purchase</label>
                                                            </div>
                                                            <input type="number" name="ingredientpurchase[]" disabled="true" id="inrPur<?= $row['ingr_id'] ?>" placeholder="Enter ingridiant purchase here ..." 
                                                            value="0"
                                                            class="form-control"/>

                                                            <div class="form-inline">
                                                                <label>Expected Consumption</label>
                                                            </div>
                                                            <input type="number" name="ingredientexpected[]" readonly id="inrExp<?= $row['ingr_id'] ?>" placeholder="Enter expected consumption here ..." 
                                                            value="<?= $data1[$iid] ?>"
                                                            class="form-control"/>
                                                            <br>

                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <?php 
                                                            $results = mysqli_query($conn,"SELECT * from `tbl_dailyconsumption` WHERE `date`= CURDATE() and `outletid`='".$_SESSION['outlet_id']."' ") or die(mysqli_error($conn));
                                                            if(mysqli_num_rows($results) == 0){
                                                            ?>
                                                                <input type="submit" name="btnadd" class="btn btn-primary" value="submit">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Js -->
    <?php include("process/script.php") ?>
    <script>
        function getCheckboxId(dataid)
        {
            var id = $(dataid).data("id");
            if($(dataid).prop("checked") == true){
                $( "#inrCons"+id).prop( "disabled", false );
                $( "#inrPur"+id).prop( "disabled", false );
            }
            else if($(dataid).prop("checked") == false){
                $( "#inrCons"+id).prop( "disabled", true );
                $( "#inrPur"+id).prop( "disabled", true );
                $( "#inrCons"+id).val("0");
                $( "#inrPur"+id).val("0");
            }
        }

        $('form').on('submit', function(){
            var allVals = [];
            $('input[type="checkbox"]:checked').each(function () {
              allVals.push($(this).val());
            });

            if (allVals.length === 0) {
              alert("Please select Ingridient");
              return $('#chkmaterial').is(':checked');
            }
            e.preventDefault();
        });

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