<?php require_once ('../process/dbh.php');
require_once ('../session.php');?>

<?php
    if(isset($_POST["btnadd"]))
    {
        if($_SESSION['role']!="Store"){
            $result = mysqli_query($conn,"insert into tbl_staff (u_id,staffame,staff_address,email_id,password,contact,isActive) values ('".$_POST['storeid']."','".$_POST["username1"]."','".$_POST["txtadd"]."','".$_POST["mail"]."','".$_POST["password"]."','".$_POST["txtcon"]."','Active')") or die(mysqli_error($conn));
        }
        else{

            $result = mysqli_query($conn,"insert into tbl_staff (u_id,staffame,staff_address,email_id,password,contact,isActive) values ('".$_SESSION['id']."','".$_POST["username1"]."','".$_POST["txtadd"]."','".$_POST["mail"]."','".$_POST["password"]."','".$_POST["txtcon"]."','Active')") or die(mysqli_error($conn));
        }

        if($result==true)
        {
            $_SESSION['status'] = "Your Staff Added Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../add-staff.php");
        }
        else
        {
            $_SESSION['status'] = "Your Staff Not Added!";
            $_SESSION['status_code'] = "error";
            header("Location:../add-staff.php");
        }

    }
?>