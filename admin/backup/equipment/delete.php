<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['equip_id'])) {
    $id = $_GET['equip_id'];
    $sql = "DELETE FROM sport_equipment WHERE equip_id='$id'";
    mysqli_query($link, $sql);
    header("Location: crud.php");
}

  ?>