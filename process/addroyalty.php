 <?php require_once('dbh.php');
    require_once('session.php'); ?>


 <?php

    if (isset($_POST["btnadd"])) {
        $result = mysqli_query($conn, "insert into tbl_royalty (u_id,s_date,e_date,month,amount,stuts) values ('" . $_POST["txtselcat"] . "','" . $_POST["txtdat"] . "','" . $_POST["txtdate"] . "','" . $_POST["txtmonth"] . "','" . $_POST["txamount"] . "','" . $_POST["txpaid"] . "')") or die(mysqli_error($conn));

        if ($result == true) {

            $_SESSION['status'] = "Royalty Added Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../add-royalty.php");
        } else {
            $_SESSION['status'] = "Royalty Not Added!";
            $_SESSION['status_code'] = "error";
            header("Location:../add-royalty.php");
        }
    }
    ?>