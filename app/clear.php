<?php
    session_start();
    $current_username = $_SESSION['username'];
    require '../db_connection.php';
        $sql = "DELETE FROM $current_username WHERE checked = 1";

    // use exec() because no results are returned
        $conn->exec($sql);

    $conn = null;
?>