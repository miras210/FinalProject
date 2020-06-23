<?php
header('Content-Type: application/json');
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
}
require "link.php";
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
    $stmt->bind_param('ss', $login, $password);
    $res = $stmt->execute();
    if ($res === false) {
        $echo = array('message'=>'Database query fail');
    }
    else {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row == null) {
            $echo = array('message'=>'Login or Password does not found');
        }
        else {
            $_SESSION['user'] = array(
                'login' => $row['login'],
                'password' => $row['password'],
                'id' => $row['id'],
                'status' => $row['status']
            );
            $echo = array('message'=>'success');
        }
    }
}
else {
    $echo = array('message'=>'Login or Password are not set');
}
echo json_encode($echo);
?>