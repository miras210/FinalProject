<?php
    require_once 'includes/link.php';
    $sql = 'SELECT * FROM articles ORDER BY title ASC';
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
    <title>Articles</title>
    <script src="scripts/script1.js"></script>
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
            <div class="header">
                <div class="inner">
                    <div class="main-header">
                        <div class="welcome">Archive of Articles</div>
                        <div class="welcome-text">Here full collection of articles related to Cultures of dozens of countries.<br>We hope you will enjoy reading all of them.</div>
                        <input id="myInp" type="text" placeholder="Search the article by its name or country" onkeyup="search()">
                    </div>
                </div>
            </div>
        </header>

        <div class="articles">
            <div class="inner">
                <?php foreach ($articles as $article):?>
                    <div class="article" style="background-image: url(<?=$article['main_img']?>);">
                        <div class="country"><?=$article['country'] ?></div>
                        <div class="title"><?=$article['title'] ?></div>
                        <div class="read" onclick="readArticle(<?=$article['article_id']?>)">Read Article</div>
                    </div>
                <?php endforeach; ?>
                <div class="article" id="Unknown">
                    <div class="country">UNKNOWN</div>
                    <div class="title">Not Published Yet</div>
                    <div class="read">Oooops :(</div>
                </div>
            </div>
        </div>

        <?php
            require 'includes/footer.php';
        ?>
    </div>
</body>
</html>