<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <!-- My style CSS -->
        <link rel="stylesheet" href="style.css.php">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="card text-center">
<?php
    if(isset($_SESSION['error_messages'])) {
        foreach ($_SESSION['error_messages'] as $error) {
?>
            <p class="login-error"><?= $error ?></p>
<?php
        }
    unset($_SESSION['error_messages']);
    }
?>
<?php
    if(isset($_SESSION['success'])) {
?>
            <p class="success"><?= $_SESSION['success'] ?></p>
<?php
    unset($_SESSION['success']);
    }
?>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    </ul>
            </div>
        </div>
        <div class="container card w-75 mb-3">
            <section class="card-body">
                <p class="login">Login your Account</p>
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <label class="form-label" for="email-login" class="form-label">Email Address:</label>
                    <input class="form-control" type="text" name="email" id="email-login">
                    <label class="form-label" for="password-login" class="form-label">Password:</label>
                    <input class="form-control" type="password" name="password" id="password-login">
                    <div class="login-button">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p>Forgot your Password? Please click <a href="reset-password.php" target="_blank">here</a>.</p>
            </section>
        </div>
    </body>
</html>