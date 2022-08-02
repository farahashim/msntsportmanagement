<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'sport');

$sql = "SELECT * FROM coach";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);



if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM coach WHERE coach_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../admin/schedule/' . $file['coach_schedule'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('.../../admin/schedule/' . $file['coach_schedule']));
        readfile('.../../admin/schedule/' . $file['coach_schedule']);

        // Now update downloads count
        
        exit;
    }

}

?>