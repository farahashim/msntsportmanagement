<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['facility_id'])) {
    $id = $_GET['facility_id'];
    $sql = "DELETE FROM facility WHERE facility_id='$id'";
    mysqli_query($link, $sql);
    header("Location: crud.php");
}

  ?>