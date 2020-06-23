<?php
    if(session_status() == 1){
        session_start();
    }
    if (isset($_SESSION['user'])) {
        $url = "includes/logout.php";
        $text = "LOGOUT";
    } else {
        $url = "login.php";
        $text = "LOGIN";
    }
?>

<div class="navigation_bar" id="navbar">
                <div class="inner">
                    <nav class="navigation">
                        <img src="imgs/Logo.svg" id="logo" alt="logo" onclick="home()">
                        <a href="articles.php">ARTICLES</a>
                        <a href="about.php">ABOUT</a>
                        <a href="contact.php">CONTACT</a>
                        <a href="feedback.php">FEEDBACK</a>
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="profile.php">PROFILE</a>
                        <?php endif; ?>
                        <a href=<?= $url ?>><?= $text?></a>
                    </nav>
                </div>
            </div>