<?php
// Include config file
require_once "config.php";
 
if(isset($_POST['tambah'])){
        $noplate = $_POST['vehicle_noplate'];
        $type= $_POST['vehicle_type'];
        $sql = "INSERT INTO vehicle (vehicle_noplate, vehicle_type, vehicle_status)
        VALUES('$noplate','$type','$status')";
        mysqli_query($link, $sql);
        header("Location: crud.php");

    }

?>