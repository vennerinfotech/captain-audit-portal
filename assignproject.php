<?php
include('process/dbh.php');
include("process/session.php");
$assignedoutlets = ($_SESSION['assignedoutlets'] != "") ? $_SESSION['assignedoutlets'] : "";

date_default_timezone_set('Asia/Kolkata');
$id = $_SESSION['id'];
if ($_SESSION['role'] == "Admin") {
    $sql1 = "SELECT * FROM `tbl_users`";
} else {
    $sql1 = "SELECT * FROM `tbl_users` where u_role='Store' or u_role='Employee' or u_role='Sub Employee'";
}
$result1 = mysqli_query($conn, $sql1);
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
                                                <li class="breadcrumb-item"><a href="assignproject.php">Add Task</a></li>
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
                                            <h5>Assign Tasks</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="process/assignnewproject.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Employee/Store Name</label>
                                                                <select class="select form-control" multiple id="Username" name="username[]">
                                                                    <?php
                                                                    while ($users = mysqli_fetch_assoc($result1)) {
                                                                        $tvalue = $users['u_id'] . ' ' . $users['u_token'] . ' ' . $users['u_mtoken'] . ' +/+ ';
                                                                        echo "<option value='$tvalue'>" . $users['u_name'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="button" name="addmore" id="addmore" class="btn btn-success" data-id="0">Add More</button>
                                                        <button type="button" name="removeTask" id="removeTask" class="btn btn-danger">Remove</button>
                                                        <div class="row newtask_1" for="1">
                                                            <div class="form-group col-md-12">
                                                                <label>Task 1 Details</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="checkbox" class="taskRemove" name="taskRemove" id="taskRemove" value="1">
                                                                        </div>
                                                                    </div>
                                                                    <textarea class="form-control" id="Projectname" name="projectname[0]" placeholder="Enter Task Details" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Outlet Name</label>
                                                                <select class="form-control" multiple="multiple" id="outlets0" name="outlets[Task0][]">
                                                                    <option selected="selected" value="0_Reguler">Default...</option>
                                                                    <?php
                                                                    $resultoutlet = mysqli_query($conn, "SELECT `u_id`, `u_name` FROM `tbl_users` WHERE `u_role` = 'Store'") or die(mysqli_error($conn));
                                                                    while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) {
                                                                        $outlets = json_decode($assignedoutlets, true);
                                                                        if ($outlets != null) {
                                                                            if (in_array($rowoutlet['u_id'], $outlets)) {
                                                                    ?>
                                                                                <option value="<?= $rowoutlet['u_id']."_".$rowoutlet['u_name']; ?>"><?= $rowoutlet['u_name']; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Start Date</label>
                                                                <input type="datetime-local" class="form-control" id="Startdate" name="startdate[]" value="<?php echo date('Y-m-d\TH:i'); ?>" placeholder="Start Date">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Due Date</label>
                                                                <input type="datetime-local" class="form-control" id="Enddate" name="enddate[]" value="<?php echo date('Y-m-d\TH:i', (strtotime('now +1 day'))); ?>" placeholder="Due Date">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Priority</label>
                                                                <select class="form-control" id="Projectpririty" name="projetpriority[]" required>
                                                                    <option selected="selected" value="Normal">Default...</option>
                                                                    <option value="High">High</option>
                                                                    <option value="Medium">Medium</option>
                                                                    <option value="Low">Low</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="" class="btn btn-primary">Submit</button>
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
    <?php include_once('process/script.php'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
    <script>
        $("#Username").chosen();
        $("#outlets0").chosen();
    </script>

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
        <script>
            swal({
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>
    <?php
        unset($_SESSION['status'], $_SESSION['status_code']);
    } ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var allUsers = [];
            var count = 2;
            jQuery("#addmore").on("click", function() {
                $(".newtask_" + (count - 1)).before('<div class="row newtask_' + count + '" for="'+count+'"><div class="form-group col-md-12"><label>Task '+count+' Details</label><div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><input type="checkbox" class="taskRemove" name="taskRemove" id="taskRemove" value="'+count+'"></div></div><textarea class="form-control" id="Projectname" name="projectname['+ (count - 1) +']" placeholder="Enter Task Details" required></textarea></div></div><div class="form-group col-md-12"><label>Outlet Name</label><select class="form-control" id="outlets' + count + '" multiple="multiple" name="outlets[Task' + (count-1) + '][]"><option selected="selected" value="0_Reguler">Default...</option> <?php $resultoutlet = mysqli_query($conn, "SELECT `u_id`, `u_name` FROM `tbl_users` WHERE `u_role` = 'Store'") or die(mysqli_error($conn)); while ($rowoutlet = mysqli_fetch_assoc($resultoutlet)) { $outlets = json_decode($assignedoutlets, true); if ($outlets != null) { if (in_array($rowoutlet['u_id'], $outlets)) { ?> <option value="<?= $rowoutlet['u_id']."_".$rowoutlet['u_name']; ?>"><?= $rowoutlet['u_name']; ?></option> <?php } } } ?> </select></div><div class="form-group col-md-4"><label>Start Date</label><input type="datetime-local" class="form-control" id="Startdate" name="startdate[]" placeholder="Start Date" value ="<?php echo date('Y-m-d\TH:i'); ?>"></div><div class="form-group col-md-4"><label>Due Date</label><input type="datetime-local" class="form-control" id="Enddate" name="enddate[]" placeholder="Due Date" value ="<?php echo date('Y-m-d\TH:i', (strtotime('now +1 day'))); ?>"></div><div class="form-group col-md-4"><label>Priority</label><select class="form-control" id="Projectpririty" name="projetpriority[]" required><option  selected="selected" value="Normal">Default...</option><option value="High">High</option><option value="Medium">Medium</option><option value="Low">Low</option></select></div></div>');
                $("#outlets" + count).chosen();
                count++; 
                swal({
                    text: "One more task field added",
                    button: "Ok",
                });
            });

            $('#Username').on('change', function() {
                var $selectedOptions = $(this).find('option:selected');
                $selectedOptions.each(function() {
                    allUsers.push($(this).text());
                });

                console.log(allUsers);
            });

            $('form').on('submit', check);

            function check() {

                if (allUsers.length == 0) {
                    alert("Please select any Employee or Store");
                    return $('#Username').is(':selected');
                }
                e.preventDefault();
            }

            jQuery("#removeTask").on("click", function() {
                var markedCheckbox = document.getElementsByName('taskRemove');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked)  
                    jQuery(".newtask_"+checkbox.value).remove();
                    // console.log(checkbox.value);  
                }
                count = $('form div.row').eq(1).attr("for");
                count++;
                console.log(count);
            });

        });
    </script>
    <?php include("footer.php") ?>
</body>

</html>