<?php
session_start();
$current_username = $_SESSION['username'];
if (isset($_POST["title"])) {
    require '../db_connection.php';
    $title = $_POST['title'];
    if (empty($title)) {
        header("Location:../admin.php?mess=error");
    } else {
        $add = $conn->prepare("INSERT INTO $current_username(title) VALUE (?)");
        $res = $add->execute([$title]);
        if($res) {
            header("Location:../admin.php?mess=success");
        } else {
            header("Location:../admin.php");
        }
        $conn = null;
        exit();
    }
} else {
    header("Location:../admin.php?mess=error");
}

?>