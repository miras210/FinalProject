<?php
header('Content-Type: application/json');
require "link.php";
if (!empty($_POST['email']) && !empty($_POST['login'])
&& !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $_POST['login'];
    $stmt = $conn->prepare("SELECT login, email FROM users WHERE email = ? OR login = ?");
    $stmt->bind_param('ss', $email, $login);
    $res = $stmt->execute();

    if ($res === false) {
        $res = array('message'=>'Database query fail');
    }
    else {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row == null) {
                $stmt = $conn->prepare("INSERT INTO users (email, login, password)
                VALUES (?, ?, ?)");
                
                $stmt->bind_param('sss',$email, $login, $password);
                $result = $stmt->execute();
                if ($result === false) {
                    $res = array('message'=>'FALSE', 'error'=>"ERROR DURING EXECUTION");
                }
                else {
                    $res = array('message'=>'success');
                }
        }
        else {
            $res = array('message'=>'This login or email is already in the system. Try other values');
        }
    }
}
else {
    $res = array('message'=>'FALSE', 'error'=>'Empty Argument');
}
echo json_encode($res);
?>