<?php
// Include config file
require_once "config.php";
 
if(isset($_POST['tambah'])){
        $name = $_POST['equip_name'];
        $category= $_POST['equip_category'];
        $quantity = $_POST['equip_quantity'];
        if($quantity > 0){
            $status = "Available";
        }
        $sql = "INSERT INTO sport_equipment (equip_name, equip_category, equip_quantity, equip_status)
        VALUES('$name','$category','$quantity','$status')";
        mysqli_query($link, $sql);
        header("Location: crud.php");

    }

?>