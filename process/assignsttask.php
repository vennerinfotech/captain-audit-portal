<?php require_once ('../process/dbh.php');
require_once ('../session.php'); ?>
<?php

                                        if(isset($_POST["btnadd"]))
                                        {
                                           $result2 = mysqli_query($conn,"insert into project (u_id, pname, startdate, duedate, priority, status) values('".$_POST['username']."', '".$_POST['projectname']."', '".$_POST['startdate']."', '".$_POST['enddate']."', '".$_POST['projetpriority']."','Due')") or die(mysqli_error($conn));

                                            if($result2==true)
                                            {
                                                mysqli_query($conn,"update tbl_admintask set status='Assigned' where task_id='".$_GET['edit']."'") or die(mysqli_error($conn));

                                                $_SESSION['status'] = "Your Task Assigned Successfully";
                                                                    $_SESSION['status_code'] = "success";
                                                                    header("Location:../taskby-store.php");
                                            }
                                            else
                                            {
                                                
                                                $_SESSION['status'] = "Your Task Not Assigned Successfully";
                                                                    $_SESSION['status_code'] = "error";
                                                                    header("Location:../taskby-store.php");
                                            }

                                        }
                                        ?>  