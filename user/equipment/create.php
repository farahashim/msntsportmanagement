<?php
// Include config file
require_once "config.php";
 
if(isset($_POST['tambah'])){
        $id = $_POST['equip_id'];
        $coach= $_POST['coach_id'];
        $qty = $_POST['booking_quantity'];
        $mula= $_POST['booking_start'];
        $tamat = $_POST['booking_end'];
        $status = "Pending";

        $bil_sql2 = "SELECT equip_quantity FROM sport_equipment WHERE equip_id = '$id'";
        $result = mysqli_query($link,$bil_sql2);
        $row=$result->fetch_assoc();
        $qty2 = intval($row['equip_quantity']);


        if($quantity >0){ 
            if($qty <= $qty2){

                $sql = "INSERT INTO booking_equipment (equip_id, coach_id, booking_start, booking_end, booking_quantity, booking_status)
                VALUES('$id','$coach','$mula','$tamat','$qty','$status')";
                mysqli_query($link, $sql);
            }else{
                $eror_msg = "Kuantiti melebihi stok sedia ada!";
            }
         }else{
            $eror_msg = "Kuantiti mestilah sekurangnya 1!";
         }
         header("Location: crud.php");


        
    }

?>