<?php
    require_once 'includes/link.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id'];
        $sql = "DELETE FROM comment WHERE comment_id='$id'";
        $res = mysqli_query($conn, $sql);

        if ($res === false) {
            echo mysqli_error($conn);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

?>