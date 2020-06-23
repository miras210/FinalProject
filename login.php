<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#btn').click(function() {
                event.preventDefault();
                $.ajax('includes/auth.php', {
                    type: 'POST',
                    data: {
                        login: $('#login').val(),
                        password: $('#password').val()
                    },
                    accepts: 'application/json; charset=utf-8',
                    success: function(data) {
                        if (data.message == 'success') {
                            alert("I have entered");
                            window.location.href = "index.php";
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(errorData, textStatus, errorMessage) {
                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        alert("Login error: " + msg + ', ' + errorData.status);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <header id="slider">
            <?php
                require 'includes/navbar.php';
            ?>
        </header>
    </div>
    <div class="main">
        <div class="contact_us">
            <form class="contact_us-form">
              <p class="h1">LOGIN</p><br>
              <div class="first-row">
                <input type="text" placeholder="Login" id='login'>
              </div>
              <input type="password"  placeholder="Password" id='password'>
              <a class='h3' href="registration.php">Don't have an account yet? Let's create your new account</a>
              <br>
              <input type="submit" value="Submit" id='btn'>
              <br>
              <br>
            </form>
        </div>
    </div>
    <?php
            require 'includes/footer.php';
    ?>
</body>
</html>