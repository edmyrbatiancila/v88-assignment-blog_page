<?php
    require("new-connection.php");
    session_start();
    // var_dump($_POST);
    // die();

    //below condition is for login/sign-up/reset-password
    if(isset($_POST['action']) && $_POST['action'] == 'sign-up') {
        sign_up($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login') {
        login($_POST);
    }
    else if (isset($_POST['action']) && $_POST['action'] == 'reset_password') {
        reset_password($_POST);
    }
    else if($_SESSION['logged_in'] == TRUE && $_POST['action'] == 'review') {
        review_post($_POST);
        }
    else if ($_SESSION['logged_in'] == TRUE && $_POST['action'] == 'reply') {
        reply_comment($_POST);
    }
    else {
        $_SESSION['error_messages'] = '**Please login first so that you can post a reviews/comments.';
        header('Location: index.php');
        die();
    }


    //Sign-up
    function sign_up($post) {
        $_SESSION['error_messages'] = [];
        $first_namelength =strlen($_POST['first_name']);
        $last_namelength = strlen($_POST['last_name']);
        $password_length = strlen($_POST['password']);

        if(empty($_POST['first_name'])) {
            $_SESSION['error_messages'][] = '**First Name should not be empty';
        }
        if(empty($_POST['last_name'])) {
            $_SESSION['error_messages'][] = '**Last Name should not be empty';
        }
        else if($first_namelength < 2 || $last_namelength < 2) {
            $_SESSION['error_messages'][] = '**First or Last Name must contain less than 2 characters long';
        }
        if(empty($_POST['email'])) {
            $_SESSION['error_messages'][] = '**Email Address should not be empty!';
        }
        else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_messages'][] = '**Email is invalid!';
        }
        if(empty($_POST['password'])) {
            $_SESSION['error_messages'][] = '**Password should not be empty';
        }
        else if ($password_length < 8) {
            $_SESSION['error_messages'][] = '**Password must have at least 8 characters long';
        }
        if(empty($_POST['confirm_password'])) {
            $_SESSION['error_messages'][] = '**Confirm Password should not be empty';
        }
        if($_POST['password'] !== $_POST['confirm_password']) {
            $_SESSION['error_messages'][] = '**Password did not match!';
        }

        if(!empty($_SESSION['error_messages'])) {
            header('Location: register.php');
        }
        else {
            $password = md5($_POST['password']);
            $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
                        VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$password}', now(), now() )";
            run_mysql_query($query);
            $_SESSION['success'] = "User successfully created!";
            header('Location: login.php');
            die();
        }
        
        header ('Location: register.php');
    }

    function login($post) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error_messages'][] = "**Field is empty!";
            header('Location: login.php');
            var_dump($_POST);
            var_dump($_SESSION['error_messages']);
            die();
        }
        else {
            $password = md5($_POST['password']);
            $query = "SELECT * FROM users WHERE users.password = '{$password}'
                        AND users.email = '{$_POST['email']}'";
            $user = fetch_record($query);
        }
        if(count($user) > 0 || $user['password'] === "village88") {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['logged_in'] = TRUE;
            $_SESSION['display_name'] = 'Welcome ' . $_SESSION['first_name']. "!";
            header('Location: index.php');
        }
        else {
            $_SESSION['error_messages'][] = 'Sorry, Unable to found this user!';
            header('Location: login.php');
            die();
            
        }
    }

    function reset_password($post) {
        $query = "SELECT * FROM users WHERE users.email = '{$_POST['email']}'";
        $user = fetch_record($query);

            if(empty($_POST['email'])) {
                $_SESSION['error_messages'][] = "**Field is empty!";
                header('Location: reset-password.php');
                die();
                
            }

            else if($user['email'] == $_POST['email']) {
                $password = md5('village88');
                $reset_query = "UPDATE users 
                                    SET users.password = '{$password}'
                                        WHERE users.email = '{$_POST['email']}'";
                run_mysql_query($reset_query);
                $_SESSION['reset_success'] = 'Successfully reset your password. Please use temporary password: village88 to login.';
                header('Location: reset-password.php');
                die();
            }
            
            else {
                $_SESSION['error_messages'][] = "**Unable to proceed. Invalid email";
                header('Location: reset-password.php');
            }
        }

        function review_post($post) {
            if (empty($_POST['comment'])) {
                $_SESSION['error_messages'] = 'Unable to Proceed. Field is empty!';
                header('Location: index.php');
                die();
            }
            else {

                
                $user_review_id = $_SESSION['user_id'];
                $reviews_insert = "INSERT INTO reviews (user_id, content, created_at, updated_at)
                                    VALUES ('{$user_review_id}','{$_POST['comment']}', now(), now())";
                run_mysql_query($reviews_insert);
                header('Location: index.php');
                die();
            }

        }

        function reply_comment($post) {

            
            $reply_insert = "INSERT INTO blog.replies (review_id, user_id, content, created_at, updated_at)
                            VALUES ('{$_POST['review_id']}', '{$_SESSION['user_id']}', '{$_POST['reply']}', now(), now())";
            run_mysql_query($reply_insert);

            header('Location: index.php');
            die();
        }
?>