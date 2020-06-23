<?php
    session_start();
    $_SESSION['satus'] = 0;

    require_once 'includes/link.php';
    $sql = 'SELECT * FROM articles ORDER BY likes DESC LIMIT 6';
    $res = mysqli_query($conn, $sql);
    if ($res === false) {
        echo mysqli_error($conn);
    } else {
        $articles = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
?>
<!DOCTYPE ntml>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700&display=swap" rel="stylesheet">
    <title>Culture & Logos</title>
    <script src="scripts/script.js"></script>
</head>
<body onload="carousel()" onscroll="sticking()">
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
            <div class="outer-box">
                <div class="inner">
                    <div class="box">
                        <div class="text">CULTURE & LOGOS.<br>LEARN CULTURES LIKE<br><span id="underline">CHINEESE</span></div>
                        <div class="scroll" onclick="scrollDown()">Find out what you can learn <img src="imgs/Arrow.svg" alt="Arrow"></div>
                    </div>
                    <div class="scrollers">
                        <div class="scroller" id="first" onclick="showDivs(1, 'first')"></div>
                        <div class="scroller" id="second" onclick="showDivs(2, 'second')"></div>
                        <div class="scroller" id="third" onclick="showDivs(3, 'third')"></div>
                    </div>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="inner">
                <div class="line"></div>
                <div class="content1">
                    <div class="left">
                        <div class="text">TOP RATED<br>ARTICLES <img src="imgs/TopRated.svg" alt="Top Rated"></div>
                        <div class="mini-text">Select one you want to read</div>
                    </div>
                    <div class="right">
                        <?php foreach ($articles as $article):?>
                            <div class="article">
                                <a href="article1.php?id=<?=$article['article_id']?>"><div class="img" style="background-image: url(<?=$article['main_img']?>)"><?=$article['title']?></div></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="line"></div>
                <div class="content1">
                    <div class="left">
                        <div class="text">MOST POPULAR<br>ARTICLES <img src="imgs/Popular.svg" alt="popular"></div>
                        <div class="mini-text">Select one you want to read</div>
                    </div>
                    <div class="right">
                        <div class="article">
                            <a href="article1.php"><div class="not">Not Published Yet</div></a>
                        </div>
                        <div class="article">
                            <a href="article2.php"><div class="not">Not Published Yet</div></a>
                        </div>
                        <div class="article">
                            <div class="not">Not Published Yet</div>
                        </div>
                        <div class="article">
                            <div class="not">Not Published Yet</div>
                        </div>
                        <div class="article">
                            <div class="not">Not Published Yet</div>
                        </div>
                        <div class="article">
                            <div class="not">Not Published Yet</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            require 'includes/footer.php';
        ?>
    </div>
</body>
</html>