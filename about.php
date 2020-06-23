<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400,700&display=swap" rel="stylesheet">
    <title>About</title>
    <script src="scripts/script2.js"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php
                require 'includes/navbar.php';
            ?>
            <div class="main-header">
                <div class="inner">
                    <div class="text">All About<br>Me and This Project</div>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="inner">
                <div class="intro">
                    This project was created due to lack of adolescents' knowledge about cultures.<br>
                    Culture is one of the most important things in our life which also maintains our<br>
                    identity. "Culture and Logos" are going to help fill visitors mind with miraculous<br>
                    world of culture. Here you will find lots of articles, videos, images and other<br>
                    people's comments. Join Us and be part of Our Community.
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/L5r1X3_pCJ0?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="about-me">
                    <div class="title">
                        ABOUT ME
                    </div>
                    <div class="photo"></div>
                    <div class="name">MIRAS ALIMOV</div>
                    <div class="info">Founder of Project, UI and<br> UX Designer, Front-End Developer</div>
                </div>
            </div>
        </div>

        <?php
            require 'includes/footer.php';
        ?>
    </div>
</body>
</html>