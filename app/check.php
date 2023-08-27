<?php
session_start();
$current_username = $_SESSION['username'];
if (isset($_POST["id"])) {
    require '../db_connection.php';
    $id = $_POST['id'];
    if (empty($id)) {
        echo 'error';
    } else {
        $todos = $conn-> prepare("SELECT id, checked FROM $current_username WHERE id = (?)");
        $todos->execute([$id]);
        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];
        $uChecked = $checked ? 0 : 1;
        $res = $conn->query("UPDATE $current_username SET checked=$uChecked WHERE id=$uId");
        if($res) {
            echo $checked;
        } else {
            echo 'error';
        }
        $conn = null;
        exit();
    }
} else {
    header("Location:../admin.php?mess=error");
}

?>