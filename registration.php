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
    <title>Registration</title>
    <link rel="stylesheet" href="styles/console.log();style3.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#btn').click(function() {
                event.preventDefault();
                $.ajax('includes/reg.php', {
                    type: 'POST',
                    data: {
                        email: $("#email").val(),
                        login: $("#login").val(),
                        password: $("#password").val()
                    },
                    accepts: 'application/json; charset=utf-8',
                    success: function(data) {
                        alert(data.message);
                        if (data.message == 'success') {
                            alert('SUCCESS');
                            window.location.href = "login.php";
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(errorData, textStatus, errorMessage) {
                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        alert("Registration error: " + msg + ', ' + errorData.status);
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
              <p class="h1">REGISTRATION</p><br>
              <div class="first-row">
                  <input type="text" id="email" placeholder="Email" id='email'>
              </div>
              <input type="text" placeholder="Login" id='login'>
              <input type="password"  placeholder="Password" id='password'>
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