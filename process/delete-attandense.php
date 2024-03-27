<!-- [ Session ] start -->
<?php require_once ('dbh.php');
require_once ('session.php');
//getting id of the data from url

$sql = "DELETE from `tbl_dayselfi` where day_id='".$_GET['edit']."'";

$result = mysqli_query($conn, $sql);

//redirecting to the display page (index.php in our case)
header("Location:../view-attandence.php");
?>