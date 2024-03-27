<?php 
require_once ('dbh.php');
require_once ('session.php');

if(isset($_POST["btnadd"]))
{
    $ingrideiantId = array();
    $ingrideiantOpen = array();
    $ingrideiantClose = array();
    $ingrideiantPurchase = array();
    $ingrideiantExpected = array();

    $ingrideiantId = $_POST["ingredientId"];
    $ingrideiantOpen = $_POST["ingredientopen"];
    $ingrideiantClose = $_POST["ingredientclose"];
    $ingrideiantPurchase = $_POST["ingredientpurchase"];
    $ingrideiantExpected = $_POST["ingredientexpected"];
    $ingrideiantDate = $_POST["ingrDate"];

    echo "Normal Data <pre>";
    print_r($ingrideiantOpen);
    print_r($ingrideiantClose);
    print_r($ingrideiantPurchase);
    print_r($ingrideiantExpected);

    foreach ($ingrideiantId as $key => $value) {
        $arrayOpen[$value] = $ingrideiantOpen[$key];
        $arrayClose[$value] = $ingrideiantClose[$key] ;
        $arrayPurchase[$value] = $ingrideiantPurchase[$key] ;
        $arrayExpected[$value] = $ingrideiantExpected[$key] ;
    }

    $json_Open = json_encode($arrayOpen);
    $json_Close = json_encode($arrayClose);
    $json_Purchase = json_encode($arrayPurchase);
    $json_Expected = json_encode($arrayExpected);
    
    echo "js Data <pre>";
    print_r($json_Open);
    print_r($json_Close);
    print_r($json_Purchase);
    print_r($json_Expected);
    $result = mysqli_query($conn,"insert into tbl_dailyconsumption (outletid, date, ingredient_open, ingredient_close, purchase_igr, expected_cons) values ('".$_SESSION['outlet_id']."', '".$ingrideiantDate."', '".$json_Open."', '".$json_Close."', '".$json_Purchase."', '".$json_Expected."')") or die(mysqli_error($conn));

    if($result == true) {
        $_SESSION['status'] = "Ingredient Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../add-daily-consumption.php");
    } else {
        $_SESSION['status'] = "Ingredient Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../add-daily-consumption.php");
    }
}

?>