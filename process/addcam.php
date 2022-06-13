
<?php require_once ('../process/dbh.php');
require_once ('../session.php'); ?>
<?php

                                                            if(isset($_POST["btnadd"]))
                                                            {
                                                               $result = mysqli_query($conn,"insert into tbl_complain (selectpur,note,u_id,status) values ('".$_POST["txtpur"]."','".$_POST["txtqa"]."','".$_SESSION['id']."','Pending')") or die(mysqli_error($conn));

                                                                if($result>0)
                                                                {
                                                                    $_SESSION['status'] = "Your Complain Submitted Successfully";
                                                                    $_SESSION['status_code'] = "success";
                                                                    header("Location:../add-complain.php");
                                                                }
                                                                else
                                                                {
                                                                    $_SESSION['status'] = "Your Complain Not Submitted!";
                                                                    $_SESSION['status_code'] = "error";
                                                                    header("Location:../add-complain.php");
                                                                }

                                                            }
                                                        ?>