
<?php
include_once "process/dbh.php";
include_once "session.php";
$db=$conn;
// fetch query
function fetch_data(){
    global $db;
  $query="SELECT * FROM `tbl_temp`, `tbl_users` where `tbl_temp`.store_id  = `tbl_users`.u_id ";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
 echo '<table class="table">
        <tr>
            <th>#</th>
            <th>Staff Name</th>
            <th>Product Names</th>
            <th>Image</th>
            <th>Delete</th>
        </tr>';
 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$sn."</td>
          <td>".$data["u_name"]."</td>
          <td>".$data["p_name"]."</td>
          <td><img src=".$data["image1"]." style='height: 50px; width: 50px;'/></td>
          
          <td><button type='button' class='btn btn-danger' onclick='delete_data(".$data["temp_id"].")'>Delete</button></td>
   </tr>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>
