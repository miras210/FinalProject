<?php
    header('Content-Type: application/json');
    require_once 'link.php';
    session_start();
    if (isset($_SESSION['liked_post'.$_GET['id']])) {
        $isLiked = $_SESSION['liked_post'.$_GET['id']];
        $articleId = $_GET['id'];

        if ($isLiked == "true") {
            $stmt = $conn->prepare("DELETE FROM likes WHERE article_id = ? AND user_id = ?");
            $stmt->bind_param('ii', $articleId, $_SESSION['user']['id']);
            $res = $stmt->execute();
            if ($res === false) {
                $echo = array('message'=>'Database query fail');
            } else {
                $stmt = $conn->prepare("UPDATE articles SET likes = likes - 1 WHERE article_id = ?");
                $stmt->bind_param('i', $articleId);
                $res = $stmt->execute();
                if ($res === false) {
                    $echo = array('message'=>'Database query fail');
                }
                else {
                    $echo = array('message'=>'disliked');
                    $_SESSION['liked_post'.$_GET['id']] = false;
                }
            }
        } else {
            $stmt = $conn->prepare("INSERT INTO likes(article_id, user_id) VALUES(?, ?) ");
            $stmt->bind_param('ii', $articleId, $_SESSION['user']['id']);
            $res = $stmt->execute();
            if ($res === false) {
                $echo = array('message'=>'Database query fail');
            } else {
                $stmt = $conn->prepare("UPDATE articles SET likes = likes + 1 WHERE article_id = ?");
                $stmt->bind_param('i', $articleId);
                $res = $stmt->execute();
                if ($res === false) {
                    $echo = array('message'=>'Database query fail');
                }
                else {
                    $echo = array('message'=>'liked');
                    $_SESSION['liked_post'.$_GET['id']] = true;
                }
            }
        }
    }
echo json_encode($echo);
?>