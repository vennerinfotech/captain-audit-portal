<?php require_once ('dbh.php');
require_once ('session.php'); ?>
 <?php

                                        if(isset($_POST["btnadd"]))
                                        {
                                           $result = mysqli_query($conn,"insert into  tbl_admintask (store_id,p_naem,s_date,e_date,t_priority,status) values ('".$_SESSION['id']."','".$_POST["projectname"]."','".$_POST["startdate"]."','".$_POST["enddate"]."','".$_POST["projetpriority"]."','Pending')") or die(mysqli_error($conn));

                                            if($result==true)
                                            {
                                               $_SESSION['status'] = " Your Task Assigned Successfully";
                                                $_SESSION['status_code'] = "success";
                                                header("Location:../admin-task.php");

                                               
                                            }
                                            else
                                            {
                                                $_SESSION['status'] = " Your Task Not Assigned!";
                                                $_SESSION['status_code'] = "error";
                                                header("Location:../admin-task.php");
                                            }

                                        }
                                    ?>