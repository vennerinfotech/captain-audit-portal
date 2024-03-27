<!-- [ Session ] start -->
<?php include 'process/dbh1.php'; ?>
<?php include("process/session.php");?>
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
                                                <li class="breadcrumb-item"><a href="add-product-ingridient.php">Product Recipe</a></li>
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
                                            <h5>Add Product Recipe</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" action="process/addProductIngredient.php">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Product</label>
                                                            <select class="form-control" name="product_id" id="product_id" onChange="getSelectedOption(this)";>
                                                                <option value="">--- Select Product ---</option>
                                                                <?php
                                                                    $food_item_list = mysqli_query($connpos,"SELECT `id`,`name` FROM `tbl_food_menus`") or die(mysqli_error($connpos));
                                                                    while($row=mysqli_fetch_assoc($food_item_list)){ ?>
                                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                    <?php }
                                                                ?>
                                                            </select>
                                                            <input type="hidden" class="form-control" id="product_name" name="product_name">
                                                        </div>
                                                    </div>
                                                    <div id="fillIngridiant"></div>
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
        function getSelectedOption(sel) {
            // alert(sel.options[sel.selectedIndex].text);
            var product_name = sel.options[sel.selectedIndex].text;
            $("#product_name").val(product_name);
        }

        function getCheckboxId(dataid)
        {
            var id = $(dataid).data("id");
            if($(dataid).prop("checked") == true){
                $( "#inrCons"+id).prop( "disabled", false );
            }
            else if($(dataid).prop("checked") == false){
                $( "#inrCons"+id).prop( "disabled", true );
                // $( "#inrCons"+id).val("");
            }
        }   
        $("#product_id").on("change", function(e){
            var product_name = $("#product_id").val();
            $.ajax({
                url: "process/getProductIngr.php", 
                type:"POST",
                data:{
                  item_id: product_name,
                },
                success:function(response) {
                    // alert(response);
                    $("#fillIngridiant").html(response);
                },
                error:function(){
                    alert("error");
                } 
            });    
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