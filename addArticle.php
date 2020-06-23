<?php
    require 'includes/link.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['btn'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $country = $_POST['country'];

            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileExt = explode('.', $fileName); 
            $fileActualEXt = strtolower(end($fileExt)); 

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualEXt, $allowed)){
                if ($fileError === 0){
                    if($fileSize < 10000000)
                    {
                        $id = 1;
                        $sql = "SELECT * FROM articles";
                        $result = mysqli_query($conn, $sql);
                        if ($result == false) {
                            echo "Database error";
                        } else {
                            while($row = $result->fetch_assoc()){
                                $id = $id + 1;
                            }
                        }
                        $fileNameNew = "article".$id.".".$fileActualEXt; 
                        $fileDestination = 'imgs/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination); 

                        $stmt = $conn->prepare("INSERT INTO articles (title, country, text, main_img, user_id, admin_id)
                            VALUES (?, ?, ?, ?, ?, 1)");
                        
                        $stmt->bind_param('ssssi',$title, $country, $text, $fileDestination, $_SESSION['user']['id']);
                        $result = $stmt->execute();
                        if ($result === false) {
                            echo "Database error";
                        } else {
                            header("Location: profile.php");
                        }

                    } else {
                        echo "Your file is too big";
                    }
                } else {
                    echo "Error ocured on uploading your file";
                }
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
    <link rel="stylesheet" href="styles/style4.css">
</head>
<body>
    <div class="wrapper">
        <div class="main">
            <div class="feedback">
                <form class="feedback-form" method="POST" enctype="multipart/form-data">
                <input id="title" name="title" type="text" placeholder="Title of the Article">
                <input type="text" placeholder="Country" name="country" id='country'>
                <textarea id="message" name="text" rows="100" cols="80" style="resize: none;" placeholder="Body Text"></textarea>
                <div class="last-row">
                    <input type="file" name="file" id="file">
                    <input id="myBtn" class="myBtn" type="submit" name="btn" value="Create">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>