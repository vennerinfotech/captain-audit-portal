<?php require_once ('dbh.php');
require_once ('session.php'); ?>
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
        $result = mysqli_multi_query($conn,"insert into tbl_staudit (store_id, form_id, emp_id, radioengl, radioarfl, radiosbfc, radiobtcm, radiocewb, radiotach, radiotist, radiocust, radiofosp, radiokebo, radiostia, radiochob, radiotbme, radiofali, radiowbia, radioaifr, radiomuli, radiohmst, radioisur, radiobacp, radiokpcl, radiosblc, radiopmoc, radiopbqu, radiogcqm, radiogbqu, radiokccl, radiovcws, radiokfcl, radioptst, radiosccl, staffuni, handglv, headcap, facemsk, staffsho, txtaeow, txtremark, txtany, txtquery, txtneed, txtvend, txttype, txtperson, txtsoft, txtwork, txtfmtaor, txtlast, txtmonth, txttypw, txttext, txtwill, txtremarl, txtaudit, txtamout, txtname, own_signature,time) Values('".$_POST['sel_depart']."','".$_POST['txtformid']."','".$_SESSION['id']."','".$_POST['radioengl']."', '".$_POST['radioarfl']."', '".$_POST['radiosbfc']."', '".$_POST['radiobtcm']."', '".$_POST['radiocewb']."', '".$_POST['radiotach']."', '".$_POST['radiotist']."', '".$_POST['radiocust']."', '".$_POST['radiofosp']."', '".$_POST['radiokebo']."', '".$_POST['radiostia']."', '".$_POST['radiochob']."', '".$_POST['radiotbme']."', '".$_POST['radiofali']."', '".$_POST['radiowbia']."', '".$_POST['radioaifr']."', '".$_POST['radiomuli']."', '".$_POST['radiohmst']."', '".$_POST['radioisur']."', '".$_POST['radiobacp']."', '".$_POST['radiokpcl']."', '".$_POST['radiosblc']."', '".$_POST['radiopmoc']."', '".$_POST['radiopbqu']."', '".$_POST['radiogcqm']."', '".$_POST['radiogbqu']."', '".$_POST['radiokccl']."', '".$_POST['radiovcws']."', '".$_POST['radiokfcl']."', '".$_POST['radioptst']."', '".$_POST['radiosccl']."', '".$_POST['staffuni']."', '".$_POST['handglv']."', '".$_POST['headcap']."', '".$_POST['facemsk']."', '".$_POST['staffsho']."', '".$_POST['txtaeow']."', '".$_POST['txtremark']."', '".$_POST['txtany']."', '".$_POST['txtquery']."', '".$_POST['txtneed']."', '".$_POST['txtvend']."', '".$_POST['txttype']."', '".$_POST['txtperson']."', '".$_POST['txtsoft']."', '".$_POST['txtwork']."', '".$values."', '".$_POST['txtlast']."', '".$_POST['txtmonth']."', '".$_POST['txttypw']."', '".$_POST['txttext']."', '".$_POST['txtwill']."', '".$_POST['txtremarl']."', '".$_POST['txtaudit']."', '".$_POST['txtamout']."', '".$_POST['txtname']."', '".$file."','".date( 'Y-m-d H:i:s')."');INSERT INTO tbl_fmstaff SELECT * FROM tbl_temp;DELETE from tbl_temp") or die(mysqli_error($conn));

        if($result){
            $_SESSION['status'] = "Your Audit Form Submitted Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: ../audit-portal.php");
        }
        else
        {
            $_SESSION['status'] = "Your Audit Form Not Submitted Successfully";
            $_SESSION['status_code'] = "error";
            header("Location: ../audit-portal.php");
        }
    }
?>
