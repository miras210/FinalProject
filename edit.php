<?php
    require 'includes/link.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['btn'])) {
            $id = $_GET['id'];
            $new_theme = $_POST['theme'];
            $new_text = $_POST['text'];
            $new_name = $_POST['full_name'];
            $sql = "UPDATE comment SET full_name='$new_name', theme='$new_theme', text='$new_text' WHERE comment_id='$id'";
            $res = mysqli_query($conn, $sql);
            if ($res === false) {
                echo mysqli_error($conn);
            } else {
                header('Location: http://127.0.0.1/Final%20Project/feedback.php' );
                exit();
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT ARTICLE</title>
    <link rel="stylesheet" href="styles/style4.css">
</head>
<body>
    <div class="wrapper">
        <div class="main">
            <div class="feedback">
                <form class="feedback-form" method="POST">
                <input id="title" name="theme" type="text" placeholder="Title of message">
                <textarea id="message" name="text" rows="7" cols="80" style="resize: none;" placeholder="Message"></textarea>
                <div class="last-row">
                    <input id="name" type="text" name="full_name" placeholder="Your full name">
                    <input id="myBtn" class="myBtn" type="submit" name="btn" value="Edit">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>