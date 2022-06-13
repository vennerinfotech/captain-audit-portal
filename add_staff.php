<?php

    // Include database connection

    include_once "process/dbh.php";
    include_once "session.php";

    // Insert multiple checkbox value in databse

      if ($_POST['name']|$_POST['store']|$_POST['extension']|$_POST['course']|$_POST['form']) {

        $foldrPath = "Upload/StaffSign/";
        $image_parts = explode(";base64,", $_POST['extension']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file1 = $foldrPath.uniqid().'.'.$image_type;
        file_put_contents($file1,$image_base64);

        /*$result1 = mysqli_query($conn,"insert into tbl_fmstaff (u_id,p_name,image1) values('".$_SESSION['id']."','".$values1."','".$file1."')") or die(mysqli_error($conn));*/

          $query = "INSERT INTO tbl_temp (form_id, store_id, staff_id, p_name, image1) VALUES('".$_POST['form']."','".$_POST['store']."', '".$_POST['name']."', '".$_POST['course']."', '".$file1."')";

          $result = $conn->query($query);

          if ($result) {
              echo 1;
          }else{
              echo 0;
          }

  }

?>
