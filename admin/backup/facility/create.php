<?php
// Include config file
require_once "config.php";
 
if(isset($_POST['tambah'])){
        $name = $_POST['facility_name'];
        $address= $_POST['facility_address'];
        $phone = $_POST['facility_phonenum'];
        $status = "Available";
        
        $sql = "INSERT INTO facility (facility_name, facility_address, facility_phonenum, facility_status)
        VALUES('$name','$address','$phone','$status')";
        mysqli_query($link, $sql);
        header("Location: crud.php");

    }

?>