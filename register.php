<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog(Register Page)</title>
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
            <p class="register-error"><?= $error ?></p>
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
                        <a class="nav-link active" aria-current="true" href="register.php">Register</a>
                    </li>
                    </ul>
            </div>
        </div>
        <div class="container card w-75 mb-3">
            <section class="card-body">
                <p class="register card-title">Registration</p>
                <form action="process.php" method="POST">
                    <div class="mb-3 row">
                            <input type="hidden" name="action" value="sign-up">
                            <label class="col-sm-2 col-form-label" for="fname">First Name:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="first_name" id="fname">
                            </div>
                    </div>
                    <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="lname">Last Name:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="last_name" id="lname">
                            </div>
                    </div>
                    <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="email">Email Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" id="email">
                            </div>
                    </div>
                    <div class="mb-3 row">
                            <td><label class="col-sm-2 col-form-label" for="pass">Password:</label>
                            <div class="col-sm-10">
                                <td><input class="form-control" type="password" name="password" id="pass">
                            </div>
                    </div>
                    <div class="mb-3 row">
                            <td><label class="col-sm-2 col-form-label" for="confirm">Confirm Password:</label></td>
                            <div class="col-sm-10">
                            <td><input class="form-control" type="password" name="confirm_password" id="confirm"></td>
                            </div>
                        </tr>
                    </div>
                    <button class="btn btn-primary" type="submit" name="sign-up">Sign-up</button>
                </form>
            </section>
        </div>
    </body>
</html>