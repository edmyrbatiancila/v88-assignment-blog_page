<?php
    header('content-type: text/css');
?>

body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    background-color: #191919;
    color: white;
}
.register, .login, .welcome, .forgot {
    font-weight: bold;
    font-size: 2.5rem;
}

.review-error, .register-error, .login-error, .reset-error {
    color: red;
}
.success, .reset_success {
    color: green;
}
.welcome {
    text-align: center;
}

form {
    margin: 0;
    padding: 50px;
}

section {
    display: inline-block;
    margin: 50px 90px 50px;
    text-align: center;
    vertical-align: top;
    border-radius: 20px;
    background-color: #C499F3;
    border: 1px groove;
}

.registration input {
    margin: 0 0 0 30px;
    border-radius: 5px;
}
td {
    height: 10px;
}
.sign-up {
    position: relative;
    top: 30px;
    left: 50px;
}

.sign-up, .sign, .reset_password {
    height: 50px;
    width: 100px;
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 20px;
    color: #0D9276;
    background-color: #BBE2EC;
}
.sign-up:hover, .sign:hover, .reset_password:hover {
    cursor: pointer;
    color: #FFF6E9;
    background-color: #40A2E3;
}

.sign-on, .password_reset {
    height: 400px;
}
.sign-on form, .password_reset form {
    height: 175px;
    margin: 60px 0 0 0;
}
.sign {
    position: relative;
    top: 155px;
    right: 150px;
}

main {
    margin: 0 0 20px 0;
    border-radius: 20px;
    border: 1px groove;
}
.password_reset {
    margin: 0 500px 30px;
    width: 700px;
}
.password_reset label, .password_reset input {
    margin: 0 10px 0;
}
.reset_password {
    margin: 0 40px 0 0;
}
.card {
    padding: 20px;
}
.card form {
    margin: 0;
    padding: 0 0 20px 0;
}
.card textarea {
    width: 1000px;
}
a {
    text-decoration: none;
}
.blog-image {
    height:520px;
    padding: 10px 0 10px 0;
}
.magellan_cross {
    height: 200px;
}
.footer form {
    margin: 0;
    padding: 0;
}
.login-button, .reset-button {
    display: block;
    margin: 50px 250px 0;
    padding: 0;
    border-radius: 1px 
}

.password_reset {
    margin: 30px 0 0 0;
}
.post_review {
    margin: 20px 0 0 0;
    display: block;
}
.review {
    margin: 20px 0 0 0;
}
.review p {
    margin: 0;
}
.user_review {
    font-weight: bold;
}
.reply-btn {
    display: block;
    position: relative;
    left: 970px;
    margin: 20px 0 0 0;
}
.reply-box, .replies{
    margin: 20px 0 0 30px;
}
.reply-box {
    width: 40px;
}
.review-box {
    height: 100px;
}
/* .form-control {
    text-align: center;
} */