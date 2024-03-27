<?php include("process/dbh.php"); ?>
<?php
if(isset($_POST['c_id'])) {
  $sql = "select * from `tbl_users` where `u_id`='".$_POST['c_id']."'";
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    /*while($row = mysqli_fetch_assoc($res)) {
      echo "<option value='".$row['u_id']."'>".$row['u_name']."</option>";*/
    }
  }
} else {
  header('location: ./');
}
?>