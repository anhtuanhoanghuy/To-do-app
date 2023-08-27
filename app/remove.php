<?php
session_start();
$current_username = $_SESSION['username'];
if (isset($_POST["id"])) {
    require '../db_connection.php';
    $id = $_POST['id'];
    if (empty($id)) {
        echo 0;
    } else {
        $remove = $conn->prepare("DELETE FROM $current_username WHERE id=(?)");
        $res = $remove->execute([$id]);
        if($res) {
            echo 1;
        } else {
            echo 0;
        }
        $conn = null;
        exit();
    }
} else {
    header("Location:../admin.php?mess=error");
}

?>