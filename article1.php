i<?php
    require_once 'includes/link.php';
    session_start();
    if (isset($_GET['id'])) {
        $sql = 'SELECT * FROM articles WHERE article_id = ' . $_GET['id'];
        $res = mysqli_query($conn, $sql);
        if ($res === false) {
            echo mysqli_error($conn);
        } else {
            $article = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }

        $sql = 'SELECT login FROM users WHERE id = ' . $article[0]['user_id'];
        $res = mysqli_query($conn, $sql);
        if ($res === false) {
            echo mysqli_error($conn);
        } else {
            $login = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    
        if (isset($_SESSION['user']['id'])) {
            $sql = 'SELECT * FROM likes WHERE user_id = ' . $_SESSION['user']['id'] . ' AND article_id = ' . $_GET['id'];
            $res = mysqli_query($conn, $sql);
            if ($res === false) {
                echo mysqli_error($conn);
            } else {
                $_SESSION['liked_post'.$_GET['id']] = mysqli_num_rows($res) > 0 ? true : false;
            }
        }
    } else {
        echo 'There is no such article';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Articles</title>
    <script src="scripts/script1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#like').click(function() {
                event.preventDefault();
                var liked = <?php echo json_encode($_SESSION['liked_post'.$_GET['id']]); ?>;
                $.ajax('includes/likes.php?id=<?=$_GET['id']?>', {
                    type: 'POST',
                    data: {
                        isLiked: liked
                    },
                    accepts: 'application/json; charset=utf-8',
                    success: function(data) {
                        if (data.message == "liked") {
                            $('#like').css("color", "red");
                            $('#like_num').html(parseInt($('#like_num').html(), 10)+1);
                        } else if (data.message == "disliked") {
                            $('#like').css("color", "grey");
                            $('#like_num').html(parseInt($('#like_num').html(), 10)-1);
                        }
                    },
                    error: function(errorData, textStatus, errorMessage) {
                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        alert("Like error: " + msg + ', ' + errorData.status + ", " + textStatus + ", " + errorMessage);
                    }
                });
            }); 
        });
    </script>
</head>
<body onload="getData()" onscroll="sticking()">
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
        </header>
        <div class="articles">
            <div class="inner">
                <h2 style="text-align:center;"><?=$article[0]['title'];?></h2>
                <h3 style="text-align: center; color: #4a4a4a;"><?=$article[0]['country']?></h3>
                <p style="color: grey"><?=$article[0]['publish_date']?> by <?= $login[0]['login']?></p>
                <p><img src="<?=$article[0]['main_img']?>" style="width: 100%"></p>
                <p align='justify'><?=$article[0]['text'];?></p>
                <span style="line-height: 50px;">
                    <i class="material-icons" 
                    <?php if (isset($_SESSION['user']['id'])): ?>
                        id='like'
                    <?php endif; ?> 
                    style="font-size: 2em; vertical-align: text-bottom; cursor:pointer; color: 
                    <?php if ($_SESSION['liked_post'.$_GET['id']] == true): ?>
                        red;">favorite</i>
                    <?php else: ?>
                        grey;">favorite</i>
                    <?php endif; ?>
                    <span id='like_num'><?=$article[0]['likes']?></span>
                </span>
            </div>
        </div>
        <?php
            require 'includes/footer.php';
        ?>
    </div>
    
</body>
</html>
