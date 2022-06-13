<!-- [ Session ] start -->
<?php include 'process/dbh.php'; ?>
<?php include("session.php");?>

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
    <link rel="stylesheet" href="assets/css/style.css">

    <style type="text/css">
        .kbw-signature { width: 200px; height: 60px; }
        #signature{
                width: 250px; height: 60px;
                border: 1px solid black;
                margin-bottom: 5px;
            }
    </style>
    <!-- vendor css -->

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
                                                <h5 class="m-b-10">Audit Form</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="audit-portal.php">Audit Form</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="POST">

                            <!-- [ breadcrumb ] end -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <select class="form-control" id="sel_depart" name="sel_depart">
                                            <option value="0">- Select -</option>
                                            <?php
                                                $sql_department = "SELECT * FROM tbl_users where u_role='Store'";
                                                $department_data = mysqli_query($conn,$sql_department);
                                                while($row = mysqli_fetch_assoc($department_data) ){
                                                    $departid = $row['u_id'];
                                                    $depart_name = $row['u_name'];
                                                    echo "<option value='".$departid."' >".$depart_name."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row" id="storeselect" style="display: none;">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <?php
                                                
                                                    date_default_timezone_set('Asia/Kolkata');
                                                    $vale = "AUD".date( 'YmdHis');
                                                ?>
                                                <input type="text" style="display:none" name="txtformid" id="txtformid" value="<?php echo $vale;?>">
                                            </div>
                                            <div class="card-body">
                                                <h5>Cleaning Parameters (Customer Area)</h5>
                                                <h6> (Manager/Owner/Owner Person's Responsible)</h6>
                                                <div class="text-right m-3"></div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Entrance Glass</h6>
                                                            <input type="radio"name="radioengl" value="Excellent" id="txtexcellent">
                                                            <label for="txtexcellent" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radioengl" value="Good" id="txtgood">
                                                            <label for="txtgood" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio"  name="radioengl" value="Poor" id="txtpoor">
                                                            <label for="txtpoor" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radioengl" value="Very Poor" id="txtvgood">
                                                            <label for="txtvgood" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Area Flooring</h6>

                                                            <input type="radio"  name="radioarfl" value="Excellent" id="txtp1">
                                                            <label for="txtp1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radioarfl" value="Good" id="txtp2">
                                                            <label for="txtp2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radioarfl" value="Poor" id="txtp3">
                                                            <label for="txtp3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio"name="radioarfl" value="Very Poor" id="txtp4">
                                                            <label for="txtp4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Sanitizer Bottle for Customer</h6>

                                                            <input type="radio"  name="radiosbfc" value="Excellent" id="txte1" >
                                                            <label for="txte1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiosbfc" value="Good" id="txte2">
                                                            <label for="txte2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiosbfc" value="Poor" id="txte3">
                                                            <label for="txte3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiosbfc" value="Very Poor" id="txtee4">
                                                            <label for="txtee4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Body Temperature Check Machine </h6>

                                                            <input type="radio"  name="radiobtcm" value="Excellent" id="txtg1">
                                                            <label for="txtg1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiobtcm" value="Good" id="txtg2">
                                                            <label for="txtg2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiobtcm" value="Poor" id="txtg3">
                                                            <label for="txtg3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiobtcm" value="Very Poor" id="txtg4">
                                                            <label for="txtg4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Ceiling Webs</h6>

                                                            <input type="radio"  name="radiocewb" value="Excellent" id="txtg">
                                                            <label for="txtg" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiocewb" value="Good" id="txta1">
                                                            <label for="txta1" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiocewb" value="Poor" id="txta2">
                                                            <label  for="txta2" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiocewb" value="Very Poor" id="txta3">
                                                            <label for="txta3" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Table – Chairs</h6>

                                                            <input type="radio"  name="radiotach" value="Excellent" id="txtb1">
                                                            <label for="txtb1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiotach" value="Good" id="txtb2">
                                                            <label for="txtb2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotach" value="Poor" id="txtb3">
                                                            <label for="txtb3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotach" value="Very Poor" id="txtb4">
                                                            <label for="txtb4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Tissue Stand </h6>

                                                            <input type="radio"  name="radiotist" value="Excellent" id="txtc1">
                                                            <label for="txtc1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiotist" value="Good" id="txtc2">
                                                            <label for="txtc2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotist" value="Poor" id="txtc3">
                                                            <label for="txtc3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotist" value="Very Poor" id="txtc4">
                                                            <label for="txtc4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Cutlery Stand</h6>

                                                            <input type="radio"  name="radiocust" value="Excellent" id="txtd1">
                                                            <label for="txtd1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiocust" value="Good" id="txtd2">
                                                            <label for="txtd2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiocust" value="Poor" id="txtd3">
                                                            <label for="txtd3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiocust" value="Very Poor" id="txtd4">
                                                            <label for="txtd4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Fork – Spoons</h6>


                                                            <input type="radio"  name="radiofosp" value="Excellent" id="txtv1">
                                                            <label for="txtv1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiofosp" value="Good" id="txtv2">
                                                            <label for="txtv2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiofosp" value="Poor" id="txtv3">
                                                            <label for="txtv3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiofosp" value="Very Poor" id="txtv4">
                                                            <label for="txtv4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Ketchup Bottles</h6>

                                                            <input type="radio"  name="radiokebo" value="Excellent" id="txte1">
                                                            <label for="txte1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiokebo" value="Good" id="txte2">
                                                            <label for="txte2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiokebo" value="Poor" id="txte3">
                                                            <label for="txte3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio"name="radiokebo" value="Very Poor" id="txte4">
                                                            <label for="txte4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Store Inside Area - Entrance Glass Updated With latest Branding Material</h6>

                                                            <input type="radio"  name="radiostia" value="Excellent" id="txtf1">
                                                            <label for="txtf1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiostia" value="Good" id="txtf2">
                                                            <label for="txtf2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiostia" value="Poor" id="txtf3">
                                                            <label for="txtf3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiostia" value="Very Poor" id="txtf4">
                                                            <label for="txtf4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Chilli - Oregano Bottles</h6>

                                                            <input type="radio"  name="radiochob" value="Excellent" id="txtq1">
                                                            <label for="txtq1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiochob" value="Good" id="txtq2">
                                                            <label for="txtq2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiochob" value="Poor" id="txtq3">
                                                            <label for="txtq3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiochob" value="Very Poor" id="txtq4">
                                                            <label for="txtq4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Table Menu</h6>
                                                            <input type="radio"  name="radiotbme" value="Excellent" id="txtw1">
                                                            <label for="txtw1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiotbme" value="Good" id="txtw2">
                                                            <label for="txtw2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotbme" value="Poor" id="txtw3">
                                                            <label for="txtw3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiotbme" value="Very Poor" id="txtw4">
                                                            <label for="txtw4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Fan – Lights</h6>


                                                            <input type="radio"  name="radiofali" value="Excellent" id="txtr1">
                                                            <label for="txtr1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiofali" value="Good" id="txtr2">
                                                            <label for="txtr2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiofali" value="Poor" id="txtr3">
                                                            <label for="txtr3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio"name="radiofali" value="Very Poor" id="txtr4">
                                                            <label for="txtr4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Wash Basin (IF AVAILABLE)</h6>

                                                            <input type="radio"  name="radiowbia" value="Excellent" id="txtt1">
                                                            <label for="txtt1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiowbia" value="Good" id="txtt2">
                                                            <label for="txtt2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiowbia" value="Poor" id="txtt3">
                                                            <label for="txtt3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiowbia" value="Very Poor" id="txtt4">
                                                            <label for="txtt4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Air Fragrance </h6>

                                                            <input type="radio"  name="radioaifr" value="Excellent" id="txty1">
                                                            <label for="txty1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radioaifr" value="Good" id="txty2">
                                                            <label for="txty2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radioaifr" value="Poor" id="txty3">
                                                            <label for="txty3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radioaifr" value="Very Poor" id="txty4">
                                                            <label for="txty4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Music Live</h6>

                                                            <input type="radio"  name="radiomuli" value="Yes" id="txtj1">
                                                            <label for="txtj1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiomuli" value="No" id="txtj2">
                                                            <label for="txtj2" class="form-radio-label">No
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Hygiene Maintaining sheet (Till Date Updated)</h6>
                                                            <input type="radio"  name="radiohmst" value="Yes" id="txtn1">
                                                            <label for="txtn1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiohmst" value="No" id="txtn2">
                                                            <label for="txtn2" class="form-radio-label">No
                                                            </label>&nbsp;


                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Inventory Sheet Updated regularly(at least twice in a week)</h6>

                                                            <input type="radio"  name="radioisur" value="Yes" id="txtm1">
                                                            <label for="txtm1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radioisur" value="No" id="txtm2">
                                                            <label for="txtm2" class="form-radio-label">No
                                                            </label>&nbsp;


                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Billing Area, Computer-Printer area Dust Less</h6>

                                                            <input type="radio"  name="radiobacp" value="Excellent" id="txtl1">
                                                            <label for="txtl1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiobacp" value="Good" id="txtl2">
                                                            <label for="txtl2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiobacp" value="Poor" id="txtl3">
                                                            <label for="txtl3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiobacp" value="Very Poor" id="txtl4">
                                                            <label for="txtl4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <!-- <h5>Complain / Suggestion / Query</h5> -->
                                            </div>
                                            <div class="card-body">
                                                <h5>Cleaning Parameters (Kitchen Area)</h5>
                                                <h6>Kitchen Staff Responsible</h6>
                                                <div class="text-right m-3"></div>
                                                <hr>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Kitchen Platform Cleaning</h6>
                                                            <input type="radio"  name="radiokpcl" value="Excellent" id="txto1">
                                                            <label for="txto1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiokpcl" value="Good" id="txto2">
                                                            <label for="txto2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiokpcl" value="Poor" id="txto3">
                                                            <label for="txto3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiokpcl" value="Very Poor" id="txto4">
                                                            <label for="txto4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Souse Bottle's Lead Clean</h6>
                                                            <input type="radio"  name="radiosblc" value="Excellent" id="txtk1">
                                                            <label for="txtk1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiosblc" value="Good" id="txtk2">
                                                            <label for="txtk2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiosblc" value="Poor" id="txtk3">
                                                            <label for="txtk3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio"name="radiosblc" value="Very Poor" id="txtk4">
                                                            <label for="txtk4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">

                                                            <h6>Pizza-Micro Oven Clean</h6>
                                                            <input type="radio" name="radiopmoc" value="Excellent" id="txtu1">
                                                             <label for="txtu1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopmoc" checked value="Good" id="txtu2">
                                                            <label for="txtu2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopmoc" value="Poor" id="txtu3">
                                                            <label for="txtu3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopmoc" value="Very Poor" id="txtu4">
                                                            <label for="txtu4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Pizza Base Quality</h6>

                                                            <input type="radio"  name="radiopbqu" value="Excellent" id="txtm1">
                                                            <label for="txtm1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" checked name="radiopbqu" value="Good" id="txtm2">
                                                            <label for="txtm2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopbqu" value="Poor" id="txtm3">
                                                            <label for="txtm3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopbqu" value="Very Poor" id="txtm4">
                                                            <label for="txtm4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                              <h6>Green Chatni Quality(if making at store)</h6>
                                                                <input type="radio"  name="radiogcqm" value="Excellent" id="txtn2">
                                                                <label for="txtn2" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiogcqm" value="Good" id="txtn1">
                                                                <label for="txtn1" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiogcqm" value="Poor" id="txtn3">
                                                                <label for="txtn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiogcqm" value="Very Poor" id="txtn4">
                                                                <label for="txtn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">

                                                                <h6>Garlic Butter Quality</h6>
                                                                <input type="radio"  name="radiogbqu" value="Excellent" id="txtas1">
                                                                <label for="txtas1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiogbqu" value="Good" id="txtas2">
                                                                <label for="txtas2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiogbqu" value="Poor" id="txtas3">
                                                                <label for="txtas3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio"name="radiogbqu" value="Very Poor" id="txtas4">
                                                                <label for="txtas4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Kitchen Cutlery Cleaning </h6>

                                                                <input type="radio"  name="radiokccl" value="Excellent" id="txtsd1">
                                                                <label for="txtsd1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiokccl" value="Good" id="txtsd2">
                                                                <label for="txtsd2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiokccl" value="Poor" id="txtsd3">
                                                                <label for="txtsd3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiokccl" value="Very Poor" id="txtsd4">
                                                                <label for="txtsd4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">

                                                                <h6>Veg Cutting, Wrapping, Storage </h6>
                                                                <input  type="radio"  name="radiovcws" value="Excellent" id="txtcv1">
                                                                <label for="txtcv1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiovcws" value="Good" id="txtcv2">
                                                                <label for="txtcv2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiovcws" value="Poor" id="txtcv3">
                                                                <label for="txtcv3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiovcws" value="Very Poor" id="txtcv4">
                                                                <label for="txtcv4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Kitchen Flooring Cleanness</h6>

                                                                <input type="radio"  name="radiokfcl" value="Excellent" id="txtvc1">
                                                                <label for="txtvc1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiokfcl" value="Good" id="txtvc2">
                                                                <label for="txtvc2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiokfcl" value="Poor" id="txtvc3">
                                                                <label for="txtvc3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio"name="radiokfcl" value="Very Poor" id="txtvc4">
                                                                <label for="txtvc4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Pizza Topping Storage</h6>
                                                                <input type="radio"  name="radioptst" value="Excellent" id="txtbn1">
                                                                <label for="txtbn1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radioptst" value="Good" id="txtbn2">
                                                                <label for="txtbn2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radioptst" value="Poor" id="txtbn3">
                                                                <label for="txtbn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" name="radioptst" value="Very Poor" id="txtbn4">
                                                                <label for="txtbn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Serving Crockery Clean</h6>
                                                                <input type="radio"  name="radiosccl" value="Excellent" id="txtbn1">
                                                                <label for="txtbn1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="radiosccl" value="Good" id="txtbn2">
                                                                <label for="txtbn2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" name="radiosccl" value="Poor" id="txtbn3">
                                                                <label for="txtbn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio"name="radiosccl" value="Very Poor" id="txtbn4">
                                                                <label for="txtbn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6> Staff In Uniform </h6>
                                                                <input type="radio"  name="staffuni" value="Yes" id="txtnm1">
                                                                <label for="txtnm1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="staffuni" value="No" id="txtnm2">
                                                                <label for="txtnm2" class="form-radio-label">No
                                                                  </label>&nbsp;
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                             <div class="form-group form-check">

                                                                <h6> Hand gloves while cooking</h6>
                                                                <input type="radio"  name="handglv" value="Yes" id="txtnb1">
                                                                <label for="txtnb1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="handglv" value="No" id="txtnb2">
                                                                <label for="txtnb2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Head cap while cooking</h6>

                                                                <input type="radio" name="headcap" value="Yes" id="txtkm1">
                                                                <label for="txtkm1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="headcap" value="No" id="txtkm2">
                                                                <label for="txtkm2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                               <h6> Face Mask while cooking</h6>


                                                                <input type="radio"   name="facemsk" value="Yes" id="txthj1">
                                                                <label for="txthj1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="facemsk" value="No" id="txtui2" >
                                                                <label for="txtui2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                               <h6>Staff Shoes Wearing</h6>


                                                                <input type="radio" name="staffsho" value="Yes" id="txthj1">
                                                                <label for="txthj1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" checked name="staffsho" value="No" id="txtui2" >
                                                                <label for="txtui2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">

                                                            <div class="form-group">
                                                                <h6>Any equipment operating/working query?</h6>
                                                                <input type="text" name="txtaeow" class="form-control" placeholder="Type here..." id="txtqa" >
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header">
                                               <!-- <h5>Basic Componant</h5> -->
                                            </div>
                                            <div class="card-body">
                                                <h5>FooDMohalla (India’s Most Cheesy Pizza Burger Brand)</h5>
                                                <h6>(Staff Favoring audits & feedback )</h6>
                                                <hr>
                                                <div class="row" >
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">
                                                            <h6> Staff Name</h6>
                                                            <select id="sel_user" class="form-control">
                                                                <option value="0">- Select -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">
                                                            <h6> FooD Product making confirmation : Surety Level (Yes, No, Not completely)</h6>

                                                            <input type="checkbox" checked value="PizzaBurgers" class="cd" id="form-check-input" name="selector[]">
                                                            <label id="txtpizza" class="form-check-label">Pizza Burgers
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="Waffles" class="cd" name="selector[]"id="form-check-input" value="Waffles">
                                                            <label for="txtwaffles" class="form-radio-la">Waffles
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" name="selector[]" class="cd" value="SandwichesFries" id="form-check-input">
                                                            <label for="txtand" class="form-check-label">Sandwiches Fries

                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" name="selector[]" class="cd" value="GarlicBreads" id="form-check-input" >
                                                            <label for="txtgarlic" class="form-check-label">Garlic Breads

                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" name="selector[]" class="cd" value="BurgerPizza" id="form-check-input">
                                                            <label for="txtburger" class="form-check-label">Burger Pizza

                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="PastaMaggi" class="cd" name="selector[]" id="form-check-input">
                                                            <label for="txtpasrta" class="form-check-label">Pasta Maggi
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="Mocktails & Others" class="cd" name="selector[]" id="form-check-input">
                                                            <label for="txtmoc" class="form-check-label">Mocktails & Others
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="MilkyDrinks" class="cd" name="selector[]" id="form-check-input">
                                                            <label for="txtmillk" class="form-check-label">Milky Drinks
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="CoffeeFlavors" class="cd" id="form-check-input">
                                                            <label for="txtciffe" class="form-check-label">Coffee Flavors
                                                            </label>&nbsp;&nbsp;&nbsp;

                                                            <input type="checkbox" value="FDMSpecial" class="cd" name="selector[]" id="form-check-input">
                                                            <label for="txtfdm" class="form-check-label">FDM Special
                                                            </label>&nbsp;&nbsp;&nbsp;
                                                            <br><br>
                                                            <div class="row">
                                                                    <div class="col-md-3">
                                                                        <h6>Signature of Staff</h6>
                                                                        <div id="signature" style=''>
                                                                            <canvas id="signature-pad1" class="signature-pad1" width="200px" height="60px"></canvas>
                                                                            <textarea style="display:none;" id="signature641" name="signed1" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6>Preview of Signature</h6>
                                                                        <div id="signature" style=''>
                                                                            <img src='' id='sign_prev1' style='display: none;vertical-align: top;'/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p style="clear: both;">
                                                                    <button id="click1"  class="btn btn-sm btn-primary">Preview</button>
                                                                    <button id="clear1"  class="btn btn-sm btn-danger">Clear</button>
                                                                    <button id="btnadd1" type="submit" name="btnadd1" class="btn btn-sm btn-success">Submit</button>
                                                                </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">
                                                            <div class="table-responsive">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">
                                                            <div class="form-group">
                                                                <h6>Remarks regarding above if any : </h6>
                                                                <input  type="text" name="txtremark" class="form-control" placeholder="Type here..." id="txtremark">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query about working hours : </h6>
                                                                <input type="text" name="txtany" class="form-control" placeholder="Type here..." id="txtany">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query at residential room  :</h6>
                                                                <input type="text" name="txtquery" class="form-control" placeholder="Type here..." id="txtquery">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any accessories or equipment requirement needed?? :</h6>
                                                                <input type="text" name="txtneed" class="form-control" placeholder="Type here..." id="txtneed">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                               <!-- <h5>Basic Componant</h5> -->
                                            </div>
                                            <div class="card-body">
                                                <h5>Owner/Manager Favoring Feedback</h5>
                                                <h6>(Must written by Owner/Manager)</h6>
                                                <hr>
                                                <div class="row" >
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">

                                                            <h6> (Instructions to writing person : Feel free to write genuine feedback without any Hesitate, It helps to improve both side & store can grow with sales & service.</h6>&nbsp;

                                                            <div class="form-group">
                                                                <h6>Any query with Raw material delivery vendors (Must be within 7-10 days)…???</h6>
                                                                <input type="text" name="txtvend" class="form-control" placeholder="Type here..." id="txtvend">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>regarding food quality (Must be within 7-10 days with logical remarks)…???</h6>
                                                                <input type="text" name="txttype" class="form-control" placeholder="Type here..." id="txttype">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query with available auditor person…???</h6>
                                                                <input type="text" name="txtperson" class="form-control" placeholder="Type here..." id="txtperson">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query to understand technical’s of Software, Application or any menu product knowledge query…???</h6>
                                                                <input type="text" name="txtsoft" class="form-control" placeholder="Type here..." id="txtsoft">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Write if any specific query or suggestions (All logical & centralized applicable suggestions can be work out, No individual or separate acceptable ) :</h6>
                                                                <input type="text" name="txtwork" class="form-control" placeholder="Type here..." id="txtwork">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                               <!-- <h5>Basic Componant</h5> -->
                                            </div>
                                            <div class="card-body">
                                                <h5>FooD/Dry Material & Tech Audit (Owner's Responsibility)</h5>
                                                <h6> (500 Rs Penalty per negative audit, Paid to company with Latest Royalty )</h6>
                                                <hr>
                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" checked  name="checkbox[]" id="txtcremi" value="Cheesy Jalapeno, Cremica/FoodCost" >&nbsp;
                                                            <label  class="form-check-label">Cheesy Jalapeno, Cremica/FoodCost
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtprocc" value="Process Cheese – GO/Lakhani">&nbsp;
                                                            <label  class="form-check-label">Process Cheese – GO/Lakhani
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtmayo" value="Mayonnaise, Cremica/Foodcost">&nbsp;
                                                            <label  class="form-check-label">Mayonnaise, Cremica/Foodcost
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtfill" value="Filler Cheese – GO">&nbsp;
                                                            <label  class="form-check-label">Filler Cheese – GO
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtmexic" value="Mexican Salsa, Cremica/Foodcost">&nbsp;
                                                            <label  class="form-check-label">Mexican Salsa, Cremica/Foodcost
                                                            </label>&nbsp;
                                                         </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtmozz" value="Mozzarella – GO / Lakhani">&nbsp;
                                                            <label class="form-check-label">Mozzarella – GO / Lakhani
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" value="Pizza - Pasta, Kagome" id="txtplzpas">&nbsp;
                                                            <label  class="form-check-label">Pizza - Pasta, Kagome
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtchees" value="Cheese Slice – GO">&nbsp;
                                                            <label  class="form-check-label">Cheese Slice – GO
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" value="Ketchup Sachets, Cremica/Foodcost" id="txtketxp">&nbsp;
                                                            <label class="form-check-label">Ketchup Sachets, Cremica/Foodcost
                                                            </label>&nbsp;
                                                         </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtfries" value="Pizza, Burger, Fries Box - Company Brand">&nbsp;
                                                            <label  class="form-check-label">Pizza, Burger, Fries Box - Company Brand
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtbrnd" value="Schezwan, Cremica/Foodcost Brand">&nbsp;
                                                            <label  class="form-check-label">Schezwan, Cremica/Foodcost Brand
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txttisspa" value="Tissue Pape">&nbsp;
                                                            <label  class="form-check-label">Tissue Pape
                                                            </label>&nbsp;&nbsp;

                                                            <input type="checkbox"  name="checkbox[]" id="txtserving" value="Serving Platter">&nbsp;
                                                            <label  class="form-check-label">Serving Platter
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtpeety" value="Burger Petty, Iscon Balaji/Hyfun">&nbsp;
                                                            <label  class="form-check-label">Burger Petty, Iscon Balaji/Hyfun
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtcctv" value="CCTV Working">&nbsp;
                                                            <label  class="form-check-label">CCTV Working
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                     <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtfries" value="Fries (9MM) - Iscon Balaji/Hyfun/Mccain">&nbsp;
                                                            <label  class="form-check-label">Fries (9MM) - Iscon Balaji/Hyfun/Mccain
                                                            </label>&nbsp;
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox"  name="checkbox[]" id="txtvalid" value="Fire safety (Validity should be positive)">&nbsp;
                                                            <label for="txtvalid" class="form-check-label">Fire safety (Validity should be positive)
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-12">
                                                        <div class="form-group form-check">

                                                            <div class="form-group">&nbsp;
                                                                <h6>Last month royalty credited within 3 days or not? 100 Rs will penalty per day’s of delayed, will add  in next demanding royalty letter. Penalty amount of royalty if any :</h6>
                                                                <input type="text" name="txtlast" class="form-control" placeholder="Type here..." id="txtlast">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Marketing status of the month : (Without follow marketing no any business can grow in world)</h6>
                                                                <input type="text" name="txtmonth" class="form-control" placeholder="Type here..." id="txtmonth">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>This Audit sheet must need to take seriously by owner side & will also take all immediate actions if require from company side.</h6>
                                                                <input type="text" name="txttypw" class="form-control" placeholder="Type here..." id="txttypw">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>If systems & norms not followed by owner side then company have rights to take actions according to it, & all supports can remove immediate as POS, Manpower, Raw material vendor, ETC.</h6>
                                                                <input type="text" name="txttext" class="form-control" placeholder="Type here..." id="txttext">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>After signing this sheet, no any past query will consider for discussion or for solution.</h6>
                                                                <input type="text" name="txtwill" class="form-control" placeholder="Type here..." id="txtwill">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Overall Remarks by Auditor</h6>
                                                                <input type="text" name="txtremarl" class="form-control" placeholder="Type here..."  id="txtremarl">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Need Improvement in next Audit (IF ANY)</h6>
                                                                <input type="text" name="txtaudit" class="form-control" placeholder="Type here..." id="txtaudit">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Amount Penalties in Audit (IF ANY)</h6>
                                                                <input type="text" name="txtamout" class="form-control" placeholder="Type here..." id="txtamout">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Name of Auditor</h6>
                                                                <input type="text" readonly="true"  name="txtname" class="form-control" placeholder="Type here..." id="txtname" value="<?php echo  $_SESSION['name'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <h6>Signature of Store Owner</h6>
                                                                        <div id="signature" style=''>
                                                                            <canvas id="signature-pad" class="signature-pad" width="200px" height="60px"></canvas>
                                                                            <textarea style="display: none;" id="signature64" name="signed" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h6>Preview of Signature</h6>
                                                                        <div id="signature" style=''>
                                                                            <img src='' id='sign_prev' style='display: none;vertical-align: top;' />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p style="clear: both;">
                                                                    <button id="click"  class="btn btn-sm btn-primary">Preview</button>
                                                                    <button id="clear"  class="btn btn-sm btn-danger">Clear</button>
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <button id="btnadd" type="submit" name="btnadd" class="btn btn-success">Submit Audit</button>
                                                            </div>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <?php
    if(isset($_POST["btnadd"])){

        $checkbox = $_POST['checkbox'];
        $values="";
        foreach ($checkbox as $item) {
            $values = ($values.$item." | ");
        }
        $foldrPath = "Upload/OwnSign/";
        $image_parts = explode(";base64,", $_POST['signed']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $foldrPath.uniqid().'.'.$image_type;
        file_put_contents($file,$image_base64);
        date_default_timezone_set('Asia/Kolkata');
        $result = mysqli_multi_query($conn,"insert into tbl_staudit (store_id, form_id, emp_id, radioengl, radioarfl, radiosbfc, radiobtcm, radiocewb, radiotach, radiotist, radiocust, radiofosp, radiokebo, radiostia, radiochob, radiotbme, radiofali, radiowbia, radioaifr, radiomuli, radiohmst, radioisur, radiobacp, radiokpcl, radiosblc, radiopmoc, radiopbqu, radiogcqm, radiogbqu, radiokccl, radiovcws, radiokfcl, radioptst, radiosccl, staffuni, handglv, headcap, facemsk, staffsho, txtaeow, txtremark, txtany, txtquery, txtneed, txtvend, txttype, txtperson, txtsoft, txtwork, txtfmtaor, txtlast, txtmonth, txttypw, txttext, txtwill, txtremarl, txtaudit, txtamout, txtname, own_signature, time) Values ('".$_POST['sel_depart']."', '".$_POST['txtformid']."', '".$_SESSION['id']."','".$_POST['radioengl']."', '".$_POST['radioarfl']."', '".$_POST['radiosbfc']."', '".$_POST['radiobtcm']."', '".$_POST['radiocewb']."', '".$_POST['radiotach']."', '".$_POST['radiotist']."', '".$_POST['radiocust']."', '".$_POST['radiofosp']."', '".$_POST['radiokebo']."', '".$_POST['radiostia']."', '".$_POST['radiochob']."', '".$_POST['radiotbme']."', '".$_POST['radiofali']."', '".$_POST['radiowbia']."', '".$_POST['radioaifr']."', '".$_POST['radiomuli']."', '".$_POST['radiohmst']."', '".$_POST['radioisur']."', '".$_POST['radiobacp']."', '".$_POST['radiokpcl']."', '".$_POST['radiosblc']."', '".$_POST['radiopmoc']."', '".$_POST['radiopbqu']."', '".$_POST['radiogcqm']."', '".$_POST['radiogbqu']."', '".$_POST['radiokccl']."', '".$_POST['radiovcws']."', '".$_POST['radiokfcl']."', '".$_POST['radioptst']."', '".$_POST['radiosccl']."', '".$_POST['staffuni']."', '".$_POST['handglv']."', '".$_POST['headcap']."', '".$_POST['facemsk']."', '".$_POST['staffsho']."', '".$_POST['txtaeow']."', '".$_POST['txtremark']."', '".$_POST['txtany']."', '".$_POST['txtquery']."', '".$_POST['txtneed']."', '".$_POST['txtvend']."', '".$_POST['txttype']."', '".$_POST['txtperson']."', '".$_POST['txtsoft']."', '".$_POST['txtwork']."', '".$values."', '".$_POST['txtlast']."', '".$_POST['txtmonth']."', '".$_POST['txttypw']."', '".$_POST['txttext']."', '".$_POST['txtwill']."', '".$_POST['txtremarl']."', '".$_POST['txtaudit']."', '".$_POST['txtamout']."', '".$_POST['txtname']."', '".$file."', '".date( 'Y-m-d H:i:s')."');INSERT INTO tbl_fmstaff SELECT * FROM tbl_temp;DELETE from tbl_temp") or die(mysqli_error($conn));

            if($result==true){
                /*swal("Insert!", "Your Audit Added Successfully.", "success");*/
            }
            else
            {
                /*swal("Insert!", "Your Audit Not Inserted.", "error");*/
            }
    }
?>
<?php include("process/script.php") ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
<link href="css/jquery.signature.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

        $('#click').click(function(e){
            e.preventDefault();
            var data = signaturePad.toDataURL('image/png');
            $('#signature64').val(data);
            $("#sign_prev").show();
        $("#sign_prev").attr("src",data);
        });

        $('#clear').click(function(){
            $('#signature64').val('');
             signaturePad.clear();
             $("#sign_prev").attr("src",'');
            });

    })

    $(document).ready(function() {
        var signaturePad = new SignaturePad(document.getElementById('signature-pad1'));

        $('#click1').click(function(e){
            e.preventDefault();
            var data = signaturePad.toDataURL('image/png');
            $('#signature641').val(data);
            $("#sign_prev1").show();
        $("#sign_prev1").attr("src",data);
        });

        $('#clear1').click(function(){
            $('#signature641').val('');
             signaturePad.clear();
             $("#sign_prev1").attr("src",'');
            });
        })
</script>
<script type="text/javascript">
     $(document).ready(function(){
        $("#sel_depart").change(function(){
            var deptid = $(this).val();
            $.ajax({
                url: 'process/get-staff.php',
                type: 'post',
                data: {depart:deptid},
                dataType: 'json',
                success:function(response){

                var len = response.length;

                $("#sel_user").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");
                    }
                }
            });
        });
    });

     $(document).ready(function(){
        $('#sel_depart').on('change', function() {
          if ( this.value == '0')
          {
            $("#storeselect").hide();
          }
          else
          {
            $("#storeselect").show();
          }
        });
    });
</script>

<script type="text/javascript">
        $(document).ready(function(){
            $("#btnadd1").click(function(event){
              event.preventDefault();
                var form = $("#txtformid").val();
                var name = $("#sel_user").val();
                var store = $("#sel_depart").val();
                var extension = $("#signature641").val();
                var val = [];
                $('.cd:checked').each(function(i){
                  val[i] = $(this).val();
                });

                course = val.toString(); // toString function convert array to string

                if (name !=="" && course.length > 0) {
                    $.ajax({
                      url : "add_staff.php",
                      type: "POST",
                      cache: false,
                      data : {name:name,course:course,store:store,extension:extension,form:form},
                      success:function(result){
                        if (result==1) {
                            $("#formSubmit").trigger("reset");
                        }
                      }
                    });
                }

                $.ajax({    
                    type: "GET",
                    url: "display_staff.php",             
                    dataType: "html",                  
                    success: function(data){   
                        $(".table-responsive").html(data);
                    }
                });
            });
        });
</script>
<script type="text/javascript">
    function delete_data(d){
    var id=d;
    $.ajax({
      type: "post",
      url: "staffrecord-delete.php",
      data: {id:id},
      success: function(value){
        $(".table-responsive").html(value);
      }
    });
  }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include("footer.php") ?>
</body>

</html>
