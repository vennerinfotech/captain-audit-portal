<?php
	include "dbh1.php";
    include "dbh.php";
	$html = "";
	if(isset($_POST['item_id']) && !empty($_POST['item_id'])){
        // echo $_POST['item_id'];
        $food_item_list = mysqli_query($connpos,"SELECT `tbl_food_menus_ingredients`.`ingredient_id` as `ingredientId`, `tbl_ingredients`.`name` as `ingredientName` FROM `tbl_food_menus_ingredients` 
        LEFT JOIN `tbl_ingredients`
		ON `tbl_food_menus_ingredients`.`ingredient_id` = `tbl_ingredients`.`id` WHERE `tbl_food_menus_ingredients`.`food_menu_id` = '".$_POST['item_id']."'") or die(mysqli_error($connpos));
        $html .='<div class="row">';
        while($row=mysqli_fetch_assoc($food_item_list)){
            $checkFood = mysqli_query($conn,"SELECT  * from tbl_ingredient_control WHERE product_id = '".$_POST['item_id']."'") or die(mysqli_error($conn));
            if(mysqli_num_rows($checkFood) == 0){
                $html .='<div class="form-group col-md-3">
                    <div class="form-inline">
                        <input type="checkbox" id="ingrCheckbox" name="ingredientId[]" data-id="'.$row['ingredientId'].'" value="'.$row['ingredientId'].'" onclick="getCheckboxId(this)"/>
                        <label>&nbsp;&nbsp;'.$row['ingredientName'].' </label>
                    </div>
                    <input type="text" name="ingredientconsumption[]" disabled="true" id="inrCons'.$row['ingredientId'].'" placeholder="Enter consumption of '.$row['ingredientName'].' here ..." class="form-control"/>
                </div>';
            } else {
                $vvid = $row['ingredientId'];

                while($resFood = mysqli_fetch_row($checkFood)){
                    $Data = json_decode($resFood[3], true);
                }

                if (array_key_exists($vvid, $Data)) {
                    // $dataopen = $data[$iid];
                    $html .='<div class="form-group col-md-3">
                        <div class="form-inline">
                            <input type="checkbox" id="ingrCheckbox" name="ingredientId[]" checked data-id="'.$row['ingredientId'].'" value="'.$row['ingredientId'].'" onclick="getCheckboxId(this)"/>
                            <label>&nbsp;&nbsp;'.$row['ingredientName'].' </label>
                        </div>
                        <input type="text" name="ingredientconsumption[]" value="'.$Data[$vvid].'" id="inrCons'.$row['ingredientId'].'" placeholder="Enter consumption of '.$row['ingredientName'].' here ..." class="form-control"/>
                    </div>';
                }else{
                    $html .='<div class="form-group col-md-3">
                        <div class="form-inline">
                            <input type="checkbox" id="ingrCheckbox" name="ingredientId[]" data-id="'.$row['ingredientId'].'" value="'.$row['ingredientId'].'" onclick="getCheckboxId(this)"/>
                            <label>&nbsp;&nbsp;'.$row['ingredientName'].' </label>
                        </div>
                        <input type="text" name="ingredientconsumption[]" disabled="true" id="inrCons'.$row['ingredientId'].'" placeholder="Enter consumption of '.$row['ingredientName'].' here ..." class="form-control"/>
                    </div>';
                }
                
            }
        }
        $html .='</div>';
        $checkFood = mysqli_query($conn,"SELECT  * from tbl_ingredient_control WHERE product_id = '".$_POST['item_id']."'") or die(mysqli_error($conn));
        if(mysqli_num_rows($checkFood) == 0){
            $html .='<div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" name="btnadd" class="btn btn-primary" value="submit">
                </div>
            </div>';
        } else {
            $html .='<div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
                </div>
            </div>'; 
        }      
        echo $html;
    }
?>