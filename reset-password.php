<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog(Reset Password Page)</title>
        <!-- My style CSS -->
        <link rel="stylesheet" href="style.css.php">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="card text-center">
<?php
    if(isset($_SESSION['error_messages'])) {
        foreach ($_SESSION['error_messages'] as $error) {
?>
            <p class="reset-error"><?= $error ?></p>
<?php
        }
    unset($_SESSION['error_messages']);
    }
    if(isset($_SESSION['reset_success'])) {
?>
            <p class="reset_success"><?= $_SESSION['reset_success'] ?></p>
<?php
    unset($_SESSION['reset_success']);
    }
?>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    </ul>
            </div>
        </div>
        <div class="container card w-75 mb-3">
            <section class="card-body">
                <p class="forgot card-title">Forgot your Password?</p>
                <p>You can reset your password using your Email Address.</p>
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="reset_password">
                    <div class="mb-5">
                        <label class="form-label" for="reset">Email Address</label>
                        <input class="form-control" type="text" name="email" id="reset">
                    </div>
                    <button name="reset_password" class="reset-button btn btn-primary" type="submit">Submit</button>
                </form>
            </section>
        </div>
    </body>
</html>