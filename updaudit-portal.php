<?php include 'process/dbh.php'; ?>
<?php include("process/session.php");
$uid=$_GET["id"];
$sql = "SELECT * from `tbl_staudit` where id='$uid'";
$result = mysqli_query($conn, $sql);
$item=mysqli_fetch_assoc($result);
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
                                                    echo "<option value='".$departid."'>".$depart_name."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <input type="text" style="display: none;" name="txtformid" id="txtformid" value="<?php echo $item["form_id"]; ?>" >
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
                                                            <input type="radio"name="radioengl" value="Excellent" id="txtexcellent" <?php if($item["radioengl"]=='Excellent') echo 'checked'?>>
                                                            <label for="txtexcellent" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioengl"]=='Good') echo 'checked'?> name="radioengl" value="Good" id="txtgood">
                                                            <label for="txtgood" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioengl"]=='Poor') echo 'checked'?> name="radioengl" value="Poor" id="txtpoor">
                                                            <label for="txtpoor" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioengl"]=='Very Poor') echo 'checked'?> name="radioengl" value="Very Poor" id="txtvgood">
                                                            <label for="txtvgood" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Area Flooring</h6>

                                                            <input type="radio" <?php if($item["radioarfl"]=='Excellent') echo 'checked'?> name="radioarfl" value="Excellent" id="txtp1">
                                                            <label for="txtp1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioarfl"]=='Good') echo 'checked'?> name="radioarfl" value="Good" id="txtp2">
                                                            <label for="txtp2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioarfl"]=='Poor') echo 'checked'?> name="radioarfl" value="Poor" id="txtp3">
                                                            <label for="txtp3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioarfl"]=='Very Poor') echo 'checked'?> name="radioarfl" value="Very Poor" id="txtp4">
                                                            <label for="txtp4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Sanitizer Bottle for Customer</h6>

                                                            <input type="radio" <?php if($item["radiosbfc"]=='Excellent') echo 'checked'?> name="radiosbfc" value="Excellent" id="txte1" >
                                                            <label for="txte1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosbfc"]=='Good') echo 'checked'?> name="radiosbfc" value="Good" id="txte2">
                                                            <label for="txte2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosbfc"]=='Poor') echo 'checked'?> name="radiosbfc" value="Poor" id="txte3">
                                                            <label for="txte3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosbfc"]=='Very Poor') echo 'checked'?> name="radiosbfc" value="Very Poor" id="txtee4">
                                                            <label for="txtee4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Body Temperature Check Machine </h6>

                                                            <input type="radio" <?php if($item["radiobtcm"]=='Excellent') echo 'checked'?> name="radiobtcm" value="Excellent" id="txtg1">
                                                            <label for="txtg1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobtcm"]=='Good') echo 'checked'?> name="radiobtcm" value="Good" id="txtg2">
                                                            <label for="txtg2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobtcm"]=='Poor') echo 'checked'?> name="radiobtcm" value="Poor" id="txtg3">
                                                            <label for="txtg3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobtcm"]=='Very Poor') echo 'checked'?> name="radiobtcm" value="Very Poor" id="txtg4">
                                                            <label for="txtg4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Ceiling Webs</h6>

                                                            <input type="radio" <?php if($item["radiocewb"]=='Excellent') echo 'checked'?> name="radiocewb" value="Excellent" id="txtg">
                                                            <label for="txtg" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocewb"]=='Good') echo 'checked'?> name="radiocewb" value="Good" id="txta1">
                                                            <label for="txta1" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocewb"]=='Poor') echo 'checked'?> name="radiocewb" value="Poor" id="txta2">
                                                            <label  for="txta2" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocewb"]=='Very Poor') echo 'checked'?> name="radiocewb" value="Very Poor" id="txta3">
                                                            <label for="txta3" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Table – Chairs</h6>

                                                            <input type="radio" <?php if($item["radiotach"]=='Excellent') echo 'checked'?> name="radiotach" value="Excellent" id="txtb1">
                                                            <label for="txtb1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotach"]=='Good') echo 'checked'?> name="radiotach" value="Good" id="txtb2">
                                                            <label for="txtb2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotach"]=='Poor') echo 'checked'?> name="radiotach" value="Poor" id="txtb3">
                                                            <label for="txtb3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotach"]=='Very Poor') echo 'checked'?> name="radiotach" value="Very Poor" id="txtb4">
                                                            <label for="txtb4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Tissue Stand </h6>

                                                            <input type="radio" <?php if($item["radiotist"]=='Excellent') echo 'checked'?> name="radiotist" value="Excellent" id="txtc1">
                                                            <label for="txtc1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotist"]=='Good') echo 'checked'?> name="radiotist" value="Good" id="txtc2">
                                                            <label for="txtc2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotist"]=='Poor') echo 'checked'?> name="radiotist" value="Poor" id="txtc3">
                                                            <label for="txtc3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotist"]=='Very Poor') echo 'checked'?> name="radiotist" value="Very Poor" id="txtc4">
                                                            <label for="txtc4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Cutlery Stand</h6>

                                                            <input type="radio" <?php if($item["radiocust"]=='Excellent') echo 'checked'?> name="radiocust" value="Excellent" id="txtd1">
                                                            <label for="txtd1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocust"]=='Good') echo 'checked'?> name="radiocust" value="Good" id="txtd2">
                                                            <label for="txtd2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocust"]=='Poor') echo 'checked'?> name="radiocust" value="Poor" id="txtd3">
                                                            <label for="txtd3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiocust"]=='Very Poor') echo 'checked'?> name="radiocust" value="Very Poor" id="txtd4">
                                                            <label for="txtd4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Fork – Spoons</h6>


                                                            <input type="radio" <?php if($item["radiofosp"]=='Excellent') echo 'checked'?> name="radiofosp" value="Excellent" id="txtv1">
                                                            <label for="txtv1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofosp"]=='Good') echo 'checked'?> name="radiofosp" value="Good" id="txtv2">
                                                            <label for="txtv2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofosp"]=='Poor') echo 'checked'?> name="radiofosp" value="Poor" id="txtv3">
                                                            <label for="txtv3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofosp"]=='Very Poor') echo 'checked'?> name="radiofosp" value="Very Poor" id="txtv4">
                                                            <label for="txtv4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Ketchup Bottles</h6>

                                                            <input type="radio" <?php if($item["radiokebo"]=='Excellent') echo 'checked'?> name="radiokebo" value="Excellent" id="txte1">
                                                            <label for="txte1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokebo"]=='Good') echo 'checked'?> name="radiokebo" value="Good" id="txte2">
                                                            <label for="txte2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokebo"]=='Poor') echo 'checked'?> name="radiokebo" value="Poor" id="txte3">
                                                            <label for="txte3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokebo"]=='Very Poor') echo 'checked'?> name="radiokebo" value="Very Poor" id="txte4">
                                                            <label for="txte4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Store Inside Area - Entrance Glass Updated With latest Branding Material</h6>

                                                            <input type="radio" <?php if($item["radiostia"]=='Excellent') echo 'checked'?> name="radiostia" value="Excellent" id="txtf1">
                                                            <label for="txtf1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiostia"]=='Good') echo 'checked'?> name="radiostia" value="Good" id="txtf2">
                                                            <label for="txtf2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiostia"]=='Poor') echo 'checked'?> name="radiostia" value="Poor" id="txtf3">
                                                            <label for="txtf3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiostia"]=='Very Poor') echo 'checked'?> name="radiostia" value="Very Poor" id="txtf4">
                                                            <label for="txtf4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Chilli - Oregano Bottles</h6>

                                                            <input type="radio" <?php if($item["radiochob"]=='Excellent') echo 'checked'?> name="radiochob" value="Excellent" id="txtq1">
                                                            <label for="txtq1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiochob"]=='Good') echo 'checked'?> name="radiochob" value="Good" id="txtq2">
                                                            <label for="txtq2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiochob"]=='Poor') echo 'checked'?> name="radiochob" value="Poor" id="txtq3">
                                                            <label for="txtq3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiochob"]=='Very Poor') echo 'checked'?> name="radiochob" value="Very Poor" id="txtq4">
                                                            <label for="txtq4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Table Menu</h6>
                                                            <input type="radio" <?php if($item["radiotbme"]=='Excellent') echo 'checked'?> name="radiotbme" value="Excellent" id="txtw1">
                                                            <label for="txtw1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotbme"]=='Good') echo 'checked'?> name="radiotbme" value="Good" id="txtw2">
                                                            <label for="txtw2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotbme"]=='Poor') echo 'checked'?> name="radiotbme" value="Poor" id="txtw3">
                                                            <label for="txtw3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiotbme"]=='Very Poor') echo 'checked'?> name="radiotbme" value="Very Poor" id="txtw4">
                                                            <label for="txtw4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Fan – Lights</h6>


                                                            <input type="radio" <?php if($item["radiofali"]=='Excellent') echo 'checked'?> name="radiofali" value="Excellent" id="txtr1">
                                                            <label for="txtr1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofali"]=='Good') echo 'checked'?> name="radiofali" value="Good" id="txtr2">
                                                            <label for="txtr2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofali"]=='Poor') echo 'checked'?> name="radiofali" value="Poor" id="txtr3">
                                                            <label for="txtr3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiofali"]=='Very Poor') echo 'checked'?> name="radiofali" value="Very Poor" id="txtr4">
                                                            <label for="txtr4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Wash Basin (IF AVAILABLE)</h6>

                                                            <input type="radio" <?php if($item["radiowbia"]=='Excellent') echo 'checked'?> name="radiowbia" value="Excellent" id="txtt1">
                                                            <label for="txtt1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiowbia"]=='Good') echo 'checked'?> name="radiowbia" value="Good" id="txtt2">
                                                            <label for="txtt2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiowbia"]=='Poor') echo 'checked'?> name="radiowbia" value="Poor" id="txtt3">
                                                            <label for="txtt3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiowbia"]=='Very Poor') echo 'checked'?> name="radiowbia" value="Very Poor" id="txtt4">
                                                            <label for="txtt4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Air Fragrance </h6>

                                                            <input type="radio" <?php if($item["radioaifr"]=='Excellent') echo 'checked'?> name="radioaifr" value="Excellent" id="txty1">
                                                            <label for="txty1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioaifr"]=='Good') echo 'checked'?> name="radioaifr" value="Good" id="txty2">
                                                            <label for="txty2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioaifr"]=='Poor') echo 'checked'?> name="radioaifr" value="Poor" id="txty3">
                                                            <label for="txty3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioaifr"]=='Very Poor') echo 'checked'?> name="radioaifr" value="Very Poor" id="txty4">
                                                            <label for="txty4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Music Live</h6>

                                                            <input type="radio" <?php if($item["radiomuli"]=='Yes') echo 'checked'?>  name="radiomuli" value="Yes" id="txtj1">
                                                            <label for="txtj1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiomuli"]=='No') echo 'checked'?> name="radiomuli" value="No" id="txtj2">
                                                            <label for="txtj2" class="form-radio-label">No
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6> Hygiene Maintaining sheet (Till Date Updated)</h6>
                                                            <input type="radio" <?php if($item["radiohmst"]=='Yes') echo 'checked'?> name="radiohmst" value="Yes" id="txtn1">
                                                            <label for="txtn1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiohmst"]=='No') echo 'checked'?> name="radiohmst" value="No" id="txtn2">
                                                            <label for="txtn2" class="form-radio-label">No
                                                            </label>&nbsp;


                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Inventory Sheet Updated regularly(at least twice in a week)</h6>

                                                            <input type="radio" <?php if($item["radioisur"]=='Yes') echo 'checked'?> name="radioisur" value="Yes" id="txtm1">
                                                            <label for="txtm1" class="form-radio-label">Yes
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radioisur"]=='No') echo 'checked'?> name="radioisur" value="No" id="txtm2">
                                                            <label for="txtm2" class="form-radio-label">No
                                                            </label>&nbsp;


                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Billing Area, Computer-Printer area Dust Less</h6>

                                                            <input type="radio" <?php if($item["radiobacp"]=='Excellent') echo 'checked'?> name="radiobacp" value="Excellent" id="txtl1">
                                                            <label for="txtl1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobacp"]=='Good') echo 'checked'?> name="radiobacp" value="Good" id="txtl2">
                                                            <label for="txtl2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobacp"]=='Poor') echo 'checked'?> name="radiobacp" value="Poor" id="txtl3">
                                                            <label for="txtl3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiobacp"]=='Very Poor') echo 'checked'?> name="radiobacp" value="Very Poor" id="txtl4">
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
                                                            <input type="radio" <?php if($item["radiokpcl"]=='Excellent') echo 'checked'?> name="radiokpcl" value="Excellent" id="txto1">
                                                            <label for="txto1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokpcl"]=='Good') echo 'checked'?> name="radiokpcl" value="Good" id="txto2">
                                                            <label for="txto2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokpcl"]=='Poor') echo 'checked'?> name="radiokpcl" value="Poor" id="txto3">
                                                            <label for="txto3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiokpcl"]=='Very Poor') echo 'checked'?> name="radiokpcl" value="Very Poor" id="txto4">
                                                            <label for="txto4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Souse Bottle's Lead Clean</h6>
                                                            <input type="radio" <?php if($item["radiosblc"]=='Excellent') echo 'checked'?> name="radiosblc" value="Excellent" id="txtk1">
                                                            <label for="txtk1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosblc"]=='Good') echo 'checked'?> name="radiosblc" value="Good" id="txtk2">
                                                            <label for="txtk2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosblc"]=='Poor') echo 'checked'?> name="radiosblc" value="Poor" id="txtk3">
                                                            <label for="txtk3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiosblc"]=='Very Poor') echo 'checked'?> name="radiosblc" value="Very Poor" id="txtk4">
                                                            <label for="txtk4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">

                                                            <h6>Pizza-Micro Oven Clean</h6>
                                                            <input type="radio" <?php if($item["radiopmoc"]=='Excellent') echo 'checked'?> name="radiopmoc" value="Excellent" id="txtu1">
                                                             <label for="txtu1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" name="radiopmoc" <?php if($item["radiopmoc"]=='Good') echo 'checked'?> value="Good" id="txtu2">
                                                            <label for="txtu2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiopmoc"]=='Poor') echo 'checked'?> name="radiopmoc" value="Poor" id="txtu3">
                                                            <label for="txtu3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiopmoc"]=='Very Poor') echo 'checked'?> name="radiopmoc" value="Very Poor" id="txtu4">
                                                            <label for="txtu4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                            <h6>Pizza Base Quality</h6>

                                                            <input type="radio" <?php if($item["radiopbqu"]=='Excellent') echo 'checked'?> name="radiopbqu" value="Excellent" id="txtm1">
                                                            <label for="txtm1" class="form-radio-label">Excellent
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiopbqu"]=='Good') echo 'checked'?> name="radiopbqu" value="Good" id="txtm2">
                                                            <label for="txtm2" class="form-radio-label">Good
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiopbqu"]=='Poor') echo 'checked'?> name="radiopbqu" value="Poor" id="txtm3">
                                                            <label for="txtm3" class="form-radio-label">Poor
                                                            </label>&nbsp;

                                                            <input type="radio" <?php if($item["radiopbqu"]=='Very Poor') echo 'checked'?> name="radiopbqu" value="Very Poor" id="txtm4">
                                                            <label for="txtm4" class="form-radio-label">Very Poor
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-check">
                                                              <h6>Green Chatni Quality(if making at store)</h6>
                                                                <input type="radio" <?php if($item["radiogcqm"]=='Excellent') echo 'checked'?> name="radiogcqm" value="Excellent" id="txtn2">
                                                                <label for="txtn2" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogcqm"]=='Good') echo 'checked'?> name="radiogcqm" value="Good" id="txtn1">
                                                                <label for="txtn1" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogcqm"]=='Poor') echo 'checked'?> name="radiogcqm" value="Poor" id="txtn3">
                                                                <label for="txtn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogcqm"]=='Very Poor') echo 'checked'?> name="radiogcqm" value="Very Poor" id="txtn4">
                                                                <label for="txtn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">

                                                                <h6>Garlic Butter Quality</h6>
                                                                <input type="radio" <?php if($item["radiogbqu"]=='Excellent') echo 'checked'?> name="radiogbqu" value="Excellent" id="txtas1">
                                                                <label for="txtas1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogbqu"]=='Good') echo 'checked'?> name="radiogbqu" value="Good" id="txtas2">
                                                                <label for="txtas2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogbqu"]=='Poor') echo 'checked'?> name="radiogbqu" value="Poor" id="txtas3">
                                                                <label for="txtas3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiogbqu"]=='Very Poor') echo 'checked'?> name="radiogbqu" value="Very Poor" id="txtas4">
                                                                <label for="txtas4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Kitchen Cutlery Cleaning </h6>

                                                                <input type="radio" <?php if($item["radiokccl"]=='Excellent') echo 'checked'?> name="radiokccl" value="Excellent" id="txtsd1">
                                                                <label for="txtsd1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokccl"]=='Good') echo 'checked'?> name="radiokccl" value="Good" id="txtsd2">
                                                                <label for="txtsd2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokccl"]=='Poor') echo 'checked'?> name="radiokccl" value="Poor" id="txtsd3">
                                                                <label for="txtsd3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokccl"]=='Very Poor') echo 'checked'?> name="radiokccl" value="Very Poor" id="txtsd4">
                                                                <label for="txtsd4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">

                                                                <h6>Veg Cutting, Wrapping, Storage </h6>
                                                                <input  type="radio" <?php if($item["radiovcws"]=='Excellent') echo 'checked'?> name="radiovcws" value="Excellent" id="txtcv1">
                                                                <label for="txtcv1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiovcws"]=='Good') echo 'checked'?> name="radiovcws" value="Good" id="txtcv2">
                                                                <label for="txtcv2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiovcws"]=='Poor') echo 'checked'?> name="radiovcws" value="Poor" id="txtcv3">
                                                                <label for="txtcv3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiovcws"]=='Very Poor') echo 'checked'?> name="radiovcws" value="Very Poor" id="txtcv4">
                                                                <label for="txtcv4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Kitchen Flooring Cleanness</h6>

                                                                <input type="radio" <?php if($item["radiokfcl"]=='Excellent') echo 'checked'?> name="radiokfcl" value="Excellent" id="txtvc1">
                                                                <label for="txtvc1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokfcl"]=='Good') echo 'checked'?> name="radiokfcl" value="Good" id="txtvc2">
                                                                <label for="txtvc2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokfcl"]=='Poor') echo 'checked'?> name="radiokfcl" value="Poor" id="txtvc3">
                                                                <label for="txtvc3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiokfcl"]=='Very Poor') echo 'checked'?> name="radiokfcl" value="Very Poor" id="txtvc4">
                                                                <label for="txtvc4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Pizza Topping Storage</h6>
                                                                <input type="radio" <?php if($item["radioptst"]=='Excellent') echo 'checked'?> name="radioptst" value="Excellent" id="txtbn1">
                                                                <label for="txtbn1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radioptst"]=='Good') echo 'checked'?> name="radioptst" value="Good" id="txtbn2">
                                                                <label for="txtbn2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radioptst"]=='Poor') echo 'checked'?> name="radioptst" value="Poor" id="txtbn3">
                                                                <label for="txtbn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radioptst"]=='Very Poor') echo 'checked'?> name="radioptst" value="Very Poor" id="txtbn4">
                                                                <label for="txtbn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Serving Crockery Clean</h6>
                                                                <input type="radio" <?php if($item["radiosccl"]=='Excellent') echo 'checked'?> name="radiosccl" value="Excellent" id="txtbn1">
                                                                <label for="txtbn1" class="form-radio-label">Excellent
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiosccl"]=='Good') echo 'checked'?> name="radiosccl" value="Good" id="txtbn2">
                                                                <label for="txtbn2" class="form-radio-label">Good
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiosccl"]=='Poor') echo 'checked'?> name="radiosccl" value="Poor" id="txtbn3">
                                                                <label for="txtbn3" class="form-radio-label">Poor
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["radiosccl"]=='Very Poor') echo 'checked'?> name="radiosccl" value="Very Poor" id="txtbn4">
                                                                <label for="txtbn4" class="form-radio-label">Very Poor
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6> Staff In Uniform </h6>
                                                                <input type="radio" <?php if($item["staffuni"]=='Yes') echo 'checked'?> name="staffuni" value="Yes" id="txtnm1">
                                                                <label for="txtnm1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["staffuni"]=='No') echo 'checked'?> name="staffuni" value="No" id="txtnm2">
                                                                <label for="txtnm2" class="form-radio-label">No
                                                                  </label>&nbsp;
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-4">
                                                             <div class="form-group form-check">

                                                                <h6> Hand gloves while cooking</h6>
                                                                <input type="radio" <?php if($item["handglv"]=='Yes') echo 'checked'?> name="handglv" value="Yes" id="txtnb1">
                                                                <label for="txtnb1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["handglv"]=='No') echo 'checked'?> name="handglv" value="No" id="txtnb2">
                                                                <label for="txtnb2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                                <h6>Head cap while cooking</h6>

                                                                <input type="radio" <?php if($item["headcap"]=='Yes') echo 'checked'?> name="headcap" value="Yes" id="txtkm1">
                                                                <label for="txtkm1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["headcap"]=='No') echo 'checked'?> name="headcap" value="No" id="txtkm2">
                                                                <label for="txtkm2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                               <h6> Face Mask while cooking</h6>


                                                                <input type="radio" <?php if($item["facemsk"]=='Yes') echo 'checked'?>  name="facemsk" value="Yes" id="txthj1">
                                                                <label for="txthj1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["facemsk"]=='No') echo 'checked'?> name="facemsk" value="No" id="txtui2" >
                                                                <label for="txtui2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-check">
                                                               <h6>Staff Shoes Wearing</h6>


                                                                <input type="radio" <?php if($item["staffsho"]=='Yes') echo 'checked'?> name="staffsho" value="Yes" id="txthj1">
                                                                <label for="txthj1" class="form-radio-label">Yes
                                                                </label>&nbsp;

                                                                <input type="radio" <?php if($item["staffsho"]=='No') echo 'checked'?> name="staffsho" value="No" id="txtui2" >
                                                                <label for="txtui2" class="form-radio-label">No
                                                                </label>&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">

                                                            <div class="form-group">
                                                                <h6>Any equipment operating/working query?</h6>
                                                                <input type="text" name="txtaeow" class="form-control" placeholder="Type here..." id="txtqa" value="<?php echo $item["txtaeow"] ?>" >
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
                                                            <div class="form-group">
                                                                <h6>Remarks regarding above if any : </h6>
                                                                <input  type="text" name="txtremark" class="form-control" placeholder="Type here..." id="txtremark" value="<?php echo $item["txtremark"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query about working hours : </h6>
                                                                <input type="text" name="txtany" class="form-control" placeholder="Type here..." id="txtany" value="<?php echo $item["txtany"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query at residential room  :</h6>
                                                                <input type="text" name="txtquery" class="form-control" placeholder="Type here..." id="txtquery" value="<?php echo $item["txtquery"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any accessories or equipment requirement needed?? :</h6>
                                                                <input type="text" name="txtneed" class="form-control" placeholder="Type here..." id="txtneed" value="<?php echo $item["txtneed"] ?>">
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
                                                                <input type="text" name="txtvend" class="form-control" placeholder="Type here..." id="txtvend" value="<?php echo $item["txtvend"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>regarding food quality (Must be within 7-10 days with logical remarks)…???</h6>
                                                                <input type="text" name="txttype" class="form-control" placeholder="Type here..." id="txttype" value="<?php echo $item["txttype"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query with available auditor person…???</h6>
                                                                <input type="text" name="txtperson" class="form-control" placeholder="Type here..." id="txtperson" value="<?php echo $item["txtperson"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Any query to understand technical’s of Software, Application or any menu product knowledge query…???</h6>
                                                                <input type="text" name="txtsoft" class="form-control" placeholder="Type here..." id="txtsoft" value="<?php echo $item["txtsoft"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Write if any specific query or suggestions (All logical & centralized applicable suggestions can be work out, No individual or separate acceptable ) :</h6>
                                                                <input type="text" name="txtwork" class="form-control" placeholder="Type here..." id="txtwork" value="<?php echo $item["txtwork"] ?>">
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
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Cheesy Jalapeno, Cremica/FoodCost'){echo 'checked';} }?>  name="checkbox[]" id="txtcremi" value="Cheesy Jalapeno, Cremica/FoodCost" >&nbsp;
                                                            <label  class="form-check-label">Cheesy Jalapeno, Cremica/FoodCost
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Process Cheese – GO/Lakhani'){echo 'checked';} }?> name="checkbox[]" id="txtprocc" value="Process Cheese – GO/Lakhani">&nbsp;
                                                            <label  class="form-check-label">Process Cheese – GO/Lakhani
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Mayonnaise, Cremica/Foodcost'){echo 'checked';} }?> name="checkbox[]" id="txtmayo" value="Mayonnaise, Cremica/Foodcost">&nbsp;
                                                            <label  class="form-check-label">Mayonnaise, Cremica/Foodcost
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Filler Cheese – GO'){echo 'checked';} }?> name="checkbox[]" id="txtfill" value="Filler Cheese – GO">&nbsp;
                                                            <label  class="form-check-label">Filler Cheese – GO
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Mexican Salsa, Cremica/Foodcost'){echo 'checked';} }?> name="checkbox[]" id="txtmexic" value="Mexican Salsa, Cremica/Foodcost">&nbsp;
                                                            <label  class="form-check-label">Mexican Salsa, Cremica/Foodcost
                                                            </label>&nbsp;
                                                         </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Mozzarella – GO / Lakhani'){echo 'checked';} }?> name="checkbox[]" id="txtmozz" value="Mozzarella – GO / Lakhani">&nbsp;
                                                            <label class="form-check-label">Mozzarella – GO / Lakhani
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Pizza - Pasta, Kagome'){echo 'checked';} }?> name="checkbox[]" value="Pizza - Pasta, Kagome" id="txtplzpas">&nbsp;
                                                            <label  class="form-check-label">Pizza - Pasta, Kagome
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Cheese Slice – GO'){echo 'checked';} }?> name="checkbox[]" id="txtchees" value="Cheese Slice – GO">&nbsp;
                                                            <label  class="form-check-label">Cheese Slice – GO
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Ketchup Sachets, Cremica/Foodcost'){echo 'checked';} }?> name="checkbox[]" value="Ketchup Sachets, Cremica/Foodcost" id="txtketxp">&nbsp;
                                                            <label class="form-check-label">Ketchup Sachets, Cremica/Foodcost
                                                            </label>&nbsp;
                                                         </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Pizza, Burger, Fries Box - Company Brand'){echo 'checked';} }?> name="checkbox[]" id="txtfries" value="Pizza, Burger, Fries Box - Company Brand">&nbsp;
                                                            <label  class="form-check-label">Pizza, Burger, Fries Box - Company Brand
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Schezwan, Cremica/Foodcost Brand'){echo 'checked';} }?> name="checkbox[]" id="txtbrnd" value="Schezwan, Cremica/Foodcost Brand">&nbsp;
                                                            <label  class="form-check-label">Schezwan, Cremica/Foodcost Brand
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Tissue Pape'){echo 'checked';} }?> name="checkbox[]" id="txttisspa" value="Tissue Pape">&nbsp;
                                                            <label  class="form-check-label">Tissue Pape
                                                            </label>&nbsp;&nbsp;

                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Serving Platter'){echo 'checked';} }?> name="checkbox[]" id="txtserving" value="Serving Platter">&nbsp;
                                                            <label  class="form-check-label">Serving Platter
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Burger Petty, Iscon Balaji/Hyfun'){echo 'checked';} }?> name="checkbox[]" id="txtpeety" value="Burger Petty, Iscon Balaji/Hyfun">&nbsp;
                                                            <label  class="form-check-label">Burger Petty, Iscon Balaji/Hyfun
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='CCTV Working'){echo 'checked';} }?> name="checkbox[]" id="txtcctv" value="CCTV Working">&nbsp;
                                                            <label  class="form-check-label">CCTV Working
                                                            </label>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                     <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Fries (9MM) - Iscon Balaji/Hyfun/Mccain'){echo 'checked';} }?> name="checkbox[]" id="txtfries" value="Fries (9MM) - Iscon Balaji/Hyfun/Mccain">&nbsp;
                                                            <label  class="form-check-label">Fries (9MM) - Iscon Balaji/Hyfun/Mccain
                                                            </label>&nbsp;
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" <?php
                                                            $cats = explode("|", $item['txtfmtaor']);
                                                            foreach($cats as $cat) {
                                                                $cat = trim($cat);
                                                            if($cat=='Fire safety (Validity should be positive)'){echo 'checked';} }?> name="checkbox[]" id="txtvalid" value="Fire safety (Validity should be positive)">&nbsp;
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
                                                                <input type="text" name="txtlast" class="form-control" placeholder="Type here..." id="txtlast" value="<?php echo $item["txtlast"] ?>">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Marketing status of the month : (Without follow marketing no any business can grow in world)</h6>
                                                                <input type="text" name="txtmonth" class="form-control" placeholder="Type here..." id="txtmonth" value="<?php echo $item["txtmonth"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>This Audit sheet must need to take seriously by owner side & will also take all immediate actions if require from company side.</h6>
                                                                <input type="text" name="txttypw" class="form-control" placeholder="Type here..." id="txttypw" value="<?php echo $item["txttypw"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>If systems & norms not followed by owner side then company have rights to take actions according to it, & all supports can remove immediate as POS, Manpower, Raw material vendor, ETC.</h6>
                                                                <input type="text" name="txttext" class="form-control" placeholder="Type here..." id="txttext" value="<?php echo $item["txttext"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>After signing this sheet, no any past query will consider for discussion or for solution.</h6>
                                                                <input type="text" name="txtwill" class="form-control" placeholder="Type here..." id="txtwill" value="<?php echo $item["txtwill"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Overall Remarks by Auditor</h6>
                                                                <input type="text" name="txtremarl" class="form-control" placeholder="Type here..."  id="txtremarl" value="<?php echo $item["txtremarl"] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <h6>Need Improvement in next Audit (IF ANY)</h6>
                                                                <input type="text" name="txtaudit" class="form-control" placeholder="Type here..." id="txtaudit" value="<?php echo $item["txtaudit"] ?>">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Amount Penalties in Audit (IF ANY)</h6>
                                                                <input type="text" name="txtamout" class="form-control" placeholder="Type here..." id="txtamout" value="<?php echo $item["txtamout"] ?>">
                                                            </div>

                                                             <div class="form-group">
                                                                <h6>Name of Auditor</h6>
                                                                <input type="text" readonly="true"  name="txtname" class="form-control" placeholder="Type here..." id="txtname" value="<?php echo $item["txtname"] ?>">
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
    <?php
    if(isset($_POST["btnadd"])){

        $checkbox = $_POST['checkbox'];
        $values="";
        foreach ($checkbox as $item) {
            $values = ($values.$item." | ");
        }
        date_default_timezone_set('Asia/Kolkata');
        $result = mysqli_query($conn,"UPDATE tbl_staudit SET radioengl = '".$_POST['radioengl']."', radioarfl = '".$_POST['radioarfl']."', radiosbfc = '".$_POST['radiosbfc']."', radiobtcm = '".$_POST['radiobtcm']."', radiocewb = '".$_POST['radiocewb']."', radiotach = '".$_POST['radiotach']."', radiotist = '".$_POST['radiotist']."', radiocust = '".$_POST['radiocust']."', radiofosp = '".$_POST['radiofosp']."', radiokebo = '".$_POST['radiokebo']."', radiostia = '".$_POST['radiostia']."', radiochob = '".$_POST['radiochob']."', radiotbme = '".$_POST['radiotbme']."', radiofali = '".$_POST['radiofali']."', radiowbia = '".$_POST['radiowbia']."', radioaifr = '".$_POST['radioaifr']."', radiomuli = '".$_POST['radiomuli']."', radiohmst = '".$_POST['radiohmst']."', radioisur = '".$_POST['radioisur']."', radiobacp = '".$_POST['radiobacp']."', radiokpcl = '".$_POST['radiokpcl']."', radiosblc = '".$_POST['radiosblc']."', radiopmoc = '".$_POST['radiopmoc']."', radiopbqu = '".$_POST['radiopbqu']."', radiogcqm = '".$_POST['radiogcqm']."', radiogbqu = '".$_POST['radiogbqu']."', radiokccl = '".$_POST['radiokccl']."', radiovcws = '".$_POST['radiovcws']."', radiokfcl = '".$_POST['radiokfcl']."', radioptst = '".$_POST['radioptst']."', radiosccl = '".$_POST['radiosccl']."', staffuni = '".$_POST['staffuni']."', handglv = '".$_POST['handglv']."', headcap = '".$_POST['headcap']."', facemsk = '".$_POST['facemsk']."', staffsho = '".$_POST['staffsho']."', txtaeow = '".$_POST['txtaeow']."', txtremark = '".$_POST['txtremark']."', txtany = '".$_POST['txtany']."', txtquery = '".$_POST['txtquery']."', txtneed = '".$_POST['txtneed']."', txtvend = '".$_POST['txtvend']."', txttype = '".$_POST['txttype']."', txtperson = '".$_POST['txtperson']."', txtsoft = '".$_POST['txtsoft']."', txtwork = '".$_POST['txtwork']."', txtfmtaor = '".$values."', txtlast = '".$_POST['txtlast']."', txtmonth = '".$_POST['txtmonth']."', txttypw = '".$_POST['txttypw']."', txttext = '".$_POST['txttext']."', txtwill = '".$_POST['txtwill']."', txtremarl = '".$_POST['txtremarl']."', txtaudit = '".$_POST['txtaudit']."', txtamout = '".$_POST['txtamout']."', txtname = '".$_POST['txtname']."', time = '".date( 'Y-m-d H:i:s')."' WHERE id = '".$_GET['id']."'") or die(mysqli_error($conn));

            if($result==true)
            {
                ?>
                    <script>
                        window.location.href='viewaudit.php';
                    </script>
                <?php 
            }
            else
            {
                echo "Not Updated";  
            }
    }
?>
<?php include("process/script.php") ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
<link href="css/jquery.signature.css" rel="stylesheet">
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

