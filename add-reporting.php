<?php
include('process/dbh.php');
include("process/session.php");

$assignedoutlets = ($_SESSION['assignedoutlets'] != "") ? $_SESSION['assignedoutlets'] : "";
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
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
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
                                                <li class="breadcrumb-item"><a href="add-reporting.php">Mohalla Reporting</a></li>
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
                                            <h5>Mohalla Reporting</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <form action="process/add-reporting.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Select Date</label>
                                                                <input type="Date" class="form-control" id="tdate" name="tdate" value="<?= date('Y-m-d') ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="addmore">
                                                            <label>Daily Routine Tasks</label>
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <?php
                                                                    $jsondecode = array();
                                                                    $jsondecode = json_decode($_SESSION['routinetask'], true);
                                                                    if (!empty($jsondecode)) {
                                                                        foreach ($jsondecode as $key => $value) {
                                                                    ?>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="<?= $value; ?>" name="routinetask[]" id="routinetask">
                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                    <?= $value; ?>
                                                                                </label>
                                                                            </div>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <button type="button" name="addmore" id="addmore" class="btn btn-success">Add More</button>
                                                            <button type="button" name="removeTask" id="removeTask" class="btn btn-danger">Remove</button>
                                                            <div class="row newtask_1" for="1">
                                                                <div class="form-group col-md-1">
                                                                    <label>Remove</label>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input taskRemove" name="taskRemove" id="taskRemove" value="1">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Task 1 attended today</label>
                                                                    <textarea class="form-control" id="attendtask" name="attendtask[]" placeholder="Enter task attended today" rows="2" required></textarea>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label>Outlet Name</label>
                                                                    <select class="form-control" id="outlets" name="outlets[]" required>
                                                                        <option disabled selected value="">Default...</option>
                                                                        <?php
                                                                        $resultoutlet = mysqli_query($conn, "SELECT `u_id`, `u_name` FROM `tbl_users` WHERE `u_role` = 'Branchowner'") or die(mysqli_error($conn));
                                                                        while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) {
                                                                            $outlets = json_decode($assignedoutlets, true);
                                                                            if ($outlets != null) {
                                                                                if (in_array($rowoutlet['u_id'], $outlets)) {
                                                                        ?>
                                                                                    <option value="<?= $rowoutlet['u_id']; ?>"><?= $rowoutlet['u_name']; ?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label>Image</label>
                                                                    <input type="file" class="form-control" id="File" name="file[]" placeholder="Upload Attachment (If Any)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                <label>Task Pending/Postpone</label>
                                                                <textarea class="form-control" id="pendingtask" name="pendingtask" placeholder="Enter Pending/Postpone task" rows="3" required></textarea>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Challenges (If Any)</label>
                                                                <textarea class="form-control" id="challenges" name="challenges" placeholder="Enter Challenges (If Any)" rows="3" required></textarea>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Waiting from (If Any)</label>
                                                                <textarea class="form-control" id="waiting" name="waiting" placeholder="Enter Waiting from (If Any)" rows="3" required></textarea>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Alarming task (If Any)</label>
                                                                <textarea class="form-control" id="alarmingtask" name="alarmingtask" placeholder="Enter Alarming task (If Any)" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok"
            });
        </script>
    <?php
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <script type="text/javascript">
        $(document).ready(function() {
            
            var count = 2;
            
            jQuery("#addmore").on("click", function() {
                $(".newtask_" + (count - 1)).before('<div class="row newtask_' + count + '" for="' + count + '"><div class="form-group col-md-1"><label>Remove</label><div class="form-check"><input type="checkbox" class="form-check-input taskRemove" name="taskRemove" id="taskRemove" value="'+ count +'"></div></div><div class="form-group col-md-3"><label>Task ' + count + ' attended today</label><textarea class="form-control" id="attendtask" name="attendtask[]" placeholder="Enter task attended today" rows="2" required></textarea></div><div class="form-group col-md-3"><label>Outlet Name</label><select class="form-control" id="outlets" name="outlets[]" required><option selected value="0">Default...</option> <?php $resultoutlet = mysqli_query($conn, "SELECT `u_id`, `u_name` FROM `tbl_users` WHERE `u_role` = 'Store'") or die(mysqli_error($conn)); while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) { $outlets = json_decode($assignedoutlets, true); if ($outlets != null) { if (in_array($rowoutlet['u_id'], $outlets)) { ?> < option value = "<?= $rowoutlet['u_id']; ?>" > <?= $rowoutlet['u_name']; ?> < /option> <?php } } } ?> </select></div> <div class = "form-group col-md-5" > <label> Image </label><input type="file" class="form-control" id="File" name="file[]" placeholder="Upload Attachment (If Any)"></div ></div>');
                swal({
                    text: "One more attended task field added",
                    button: "Ok",
                });
                count++; 
            });
            
            jQuery("#removeTask").on("click", function() {
                var markedCheckbox = document.getElementsByName('taskRemove');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked)  
                    jQuery(".newtask_"+checkbox.value).remove();
                    // console.log(checkbox.value);  
                }
                count = $('.addmore div.row').eq(1).attr("for");
                count++;
                console.log(count);
            });
            
            $('form').on('submit', check);
            
            function check() {
                var allVals = [];
                $('input[id="routinetask"]:checked').each(function () {
                    allVals.push($(this).val());
                });
                if (allVals.length == 0) {
                    alert("Please select routine task");
                    return $('#chkmaterial').is(':checked');
                }
                e.preventDefault();
            }


        });
    </script>
    <?php include("footer.php") ?>
</body>

</html>