<?php
    session_start();
    include 'includes/link.php';
    $sql = 'SELECT * FROM articles WHERE user_id = '. $_SESSION['user']['id'];
    $res = mysqli_query($conn, $sql);
    if ($res === false) {
      echo mysqli_error($conn);
    } else {
      $articles = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400,700&display=swap" rel="stylesheet">
    <title>Profile</title>
    <script src="scripts/script1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script>
        function readArticle(id) {
            window.location.href = "article1.php?id=" + id;
        }
    </script>
</head>
<body onload="getData()" onscroll="sticking()">
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
        </header>
        <div class="header">
            <div class="inner">
                <div class="main-header">
                    <div class="welcome">Welcome <?php echo $_SESSION['user']['login'] ?></div>
                    <div class="welcome-text">Here is full collection of your articles.<br>We hope you will create more content for others.</div>
                    <form action="addArticle.php" method="POST">
                        <input type="submit" value="Create New Article">
                    </form>
                </div>
            </div>
        </div>
        <div class="articles">
            <div class="inner">
                <?php foreach ($articles as $article): ?>
                    <div class="article" style="background-image: url(<?=$article['main_img']?>);">
                        <div class="country"><?=$article['country'] ?></div>
                        <div class="title"><?=$article['title'] ?></div>
                        <div class="read" onclick="readArticle(<?=$article['article_id']?>)">View My Article</div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
            require 'includes/footer.php';
        ?>
    </div>
    
</body>
</html>
