
<?php require_once ('dbh.php');
require_once ('../session.php'); ?>
<?php

                                        if(isset($_POST["btnupdate"]))
                                        {

                                             $result = mysqli_query($conn,"update tbl_staff set staffame='".$_POST["username1"]."',staff_address='".$_POST["txtadd"]."',email_id='".$_POST["email"]."',contact='".$_POST["txtcon"]."' where ustaff_id='".$_GET['edit']."'") or die(mysqli_error($conn));


                                            if($result==true)
                                            {
                                                $_SESSION['status'] = "Your Data Updated Successfully";
                                                  $_SESSION['status_code'] = "success";
                                                header("Location:../view-staff.php");
                                            }
                                            else
                                            {
                                                  $_SESSION['status'] = "Your Data Not Updated!";
                                                  $_SESSION['status_code'] = "error";
                                                header("Location:../view-staff.php");
                                            }

                                        }
                                        ?>