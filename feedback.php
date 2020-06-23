<?php
  require 'includes/link.php';
  session_start();
  $sql = 'SELECT * FROM comment';
  $res = mysqli_query($conn, $sql);
  if ($res === false) {
    echo mysqli_error($conn);
  } else {
    $comments = mysqli_fetch_all($res, MYSQLI_ASSOC);
  }

  if (isset($_POST['btn'])) {
    $theme = $_POST['theme'];
    $full_name = isset($_SESSION['user']) ? $_SESSION['user']['login'] : 'guest';
    $text = $_POST['text'];
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;

    $sql = "INSERT INTO comment(full_name, theme, text, user_id) VALUES ('$full_name', '$theme', '$text', '$user_id')";
    $res = mysqli_query($conn, $sql);

    if ($res === false) {
      echo mysqli_error($conn);
    }
    header("Refresh:0");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style4.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700&display=swap" rel="stylesheet">
    <title>Feedback</title>
    <script src="scripts/script4.js"></script>
</head>
<body>
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
        </header>
        <div class="main">
          <div class="red-panel">
            <div class="back">
              com- <br>
              ments
            </div>
            <div class="front">
              <div class="red-panel-logo">
                <p >C&L</p>
                <p class="with-border">cltr</p>
                <p>logs</p>
              </div>
              <div class="red-panel-text">Leave your comments below</div>
            </div>
          </div>
          <div class="comments" id="comments">
            <?php foreach ($comments as $comment): ?>
            <div class="comment">
              <div class="left">
                <span class="gray-block"></span>
                <p class="name"><?=$comment['full_name']?></p>
              </div>
              <div class="right">
                <p class="date"><?=$comment['date']?></p>
                <h3 class="tittle"><?=$comment['theme']?></h3>
                <p class="comment-text">
                    <?=$comment['text']?>
                </p>
                <?php if( isset($_SESSION['user']) && ($comment['user_id'] == $_SESSION['user']['id'] || $_SESSION['user']['status'] == 2)): ?>
                  <form action="delete.php?id=<?=$comment['comment_id'];?>" method="POST" class="change">
                    <input type="submit" value="DELETE">
                  </form>
                  <?php if ($_SESSION['user']['status'] == 1 || $_SESSION['user']['id'] == $comment['user_id']): ?>
                    <form action="edit.php?id=<?=$comment['comment_id'];?>" method="POST" class="change">
                      <input type="submit" value="EDIT">
                    </form>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
            <?php endforeach; ?>
            <div id="last"></div>
          </div>
          <div class="feedback">
            <form class="feedback-form" action="feedback.php" method="POST">
              <input id="title" name="theme" type="text" placeholder="Title of message">
              <textarea id="message" name="text" rows="7" cols="80" style="resize: none;" placeholder="Message"></textarea>
              <div class="last-row">
                <input id="myBtn" class="myBtn" type="submit" name="btn" value="Submit">
              </div>
            </form>
          </div>
        </div>
        <?php
            require 'includes/footer.php';
        ?>
    </div>
</body>
</html>