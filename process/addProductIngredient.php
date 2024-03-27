<?php require_once ('dbh.php');
require_once ('session.php');

    if(isset($_POST["btnadd"]))
    {
        $ingrideiantId = array();
        $ingrideiantConsumption = array();
        $ingrideiantId = $_POST["ingredientId"];
        $ingrideiantConsumption = $_POST["ingredientconsumption"];
        foreach ($ingrideiantId as $key => $value) {
            $arrayName[$value] = $ingrideiantConsumption[$key] ;
        }
        $json_obj = json_encode($arrayName);
        echo $json_obj;
            
        // $json_obj = json_encode($ingredient_data);
        
        $result = mysqli_query($conn,"insert into tbl_ingredient_control (product_id,product_name,ingredient) values (".$_POST["product_id"].",'".$_POST["product_name"]."','".$json_obj."')") or die(mysqli_error($conn));

        if($result==true)
        {
            $_SESSION['status'] = "Ingredient Added Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../add-product-ingridient.php");
        }
        else
        {
            $_SESSION['status'] = "Ingredient Not Added!";
            $_SESSION['status_code'] = "error";
            header("Location:../add-product-ingridient.php");
        }

    } else if(isset($_POST["btnUpdate"])) {
        $ingrideiantId = array();
        $ingrideiantConsumption = array();
        $ingrideiantId = $_POST["ingredientId"];
        $ingrideiantConsumption = $_POST["ingredientconsumption"];
        foreach ($ingrideiantId as $key => $value) {
            $arrayName[$value] = $ingrideiantConsumption[$key] ;
        }
        $json_obj = json_encode($arrayName);
        echo $json_obj;
            
        // $json_obj = json_encode($ingredient_data);
        
        $result = mysqli_query($conn,"UPDATE tbl_ingredient_control SET product_name = '".$_POST["product_name"]."', ingredient = '".$json_obj."' WHERE product_id = '".$_POST["product_id"]."'") or die(mysqli_error($conn));

        if($result==true)
        {
            $_SESSION['status'] = "Ingredient Added Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../add-product-ingridient.php");
        }
        else
        {
            $_SESSION['status'] = "Ingredient Not Added!";
            $_SESSION['status_code'] = "error";
            header("Location:../add-product-ingridient.php");
        }

    }
?>