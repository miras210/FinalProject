<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700&display=swap" rel="stylesheet">
    <title>Articles</title>
    <script src="scripts/script1.js"></script>
</head>
<body onload="getData()" onscroll="sticking()">
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
        </header>
        <div class="main">
          <div class="contact_us">
            <form action="" method="POST" class="contact_us-form">
              <p class="h1">Talk to us</p>
              <p class="h3">sektor.miras@gmail.com</p>
              <div class="first-row">
                <input type="text" name="name" value="" placeholder="Name">
                <input type="text" name="email" value="" placeholder="Email">
              </div>
              <textarea name="text" rows="6" cols="80" placeholder="Message"></textarea>
              <input type="submit" name="btn" value="Submit">
            </form>
          </div>
          <div class="map">
            <p class="h1">We are located here</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2289.8332102481913!2d69.13483931589225!3d54.871114180326735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43b23a464ffb785f%3A0xbeee15d270d82468!2z0YPQuy4g0JDQvNCw0L3Qs9C10LvRjNC00YsgMTU5LCDQn9C10YLRgNC-0L_QsNCy0LvQvtCy0YHQuiAxNTAwMDA!5e1!3m2!1skk!2skz!4v1584973357182!5m2!1skk!2skz" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
        <?php
            require 'includes/footer.php';
        ?>
    </div>
</body>
</html>

<?php
    require 'includes/link.php';

    if (isset($_POST['btn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];

        $sql = "INSERT INTO contact(name, email, message) VALUES ('$name', '$email', '$text')";

        $res = mysqli_query($conn, $sql);
        if ($res === false) {
            echo mysqli_error($conn);
        }
    }
?>