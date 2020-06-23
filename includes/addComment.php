<?php
require_once 'link.php';
session_start();
header('Content-Type: application/json');
    if (!empty($_POST['title']) && !empty($_POST['message'])) {
        $theme = $_POST['title'];
        $full_name = isset($_SESSION['user']) ? $_SESSION['user']['login'] : 'guest';
        $text = $_POST['message'];
        $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;

        $sql = "INSERT INTO comment(full_name, theme, text, user_id) VALUES ('$full_name', '$theme', '$text', '$user_id')";
        $res = mysqli_query($conn, $sql);
        
        if ($res === false) {
            $ans = array('message' => 'INSERT error');
        } else {
            $last_id = $conn->insert_id;
            $stmt = $conn->prepare("SELECT * FROM comment WHERE comment_id = ?");
            $stmt->bind_param('i', $last_id);
            $res = $stmt->execute();
            if ($res === false) {
                $ans = array('message' => 'SELECT error');
            } else {
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if ($row == null) {
                    $ans = array('message' => 'NULL row');
                } else {
                    $ans = array(
                        'message' => 'success',
                        'fullName' => $row['full_name'],
                        'date' => $row['date'],
                        'theme' => $row['theme'],
                        'text' => $row['text'],
                        'commID' => $row['comment_id']
                    );
                }
            }
        }
        echo json_encode($ans);
    }
?>