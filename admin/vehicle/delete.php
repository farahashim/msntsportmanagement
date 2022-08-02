<?php

    // Include config file
    require_once "config.php";
    
    if (isset($_GET['vehicle_id'])) {
    $id = $_GET['vehicle_id'];
    $sql = "DELETE FROM vehicle WHERE vehicle_id='$id'";
    mysqli_query($link, $sql);
    header("Location: crud.php");
}

  ?>