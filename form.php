<?php

session_start();
if (isset($_SESSION['login'])) {
    header('Location: admin.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>SocialForm</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbottom">
            <a class="navbar-brand" id="big" href="#">
                <img src="img/network.png" width="45" height="45" class="d-inline-block align-top logobord" alt="">
                SocialNet
            </a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7" id="rel">
                    <div class="receiver"></div>
                    <form id="log" method="POST" action="auth.php">
                        <div class="form-group">
                            <label for="Inputlogin">Логин:</label>
                            <input type="text" class="form-control" id="Inputlogin" name="user_login">
                        </div>
                        <div class="form-group">
                            <label for="Inputpassword">Пароль:</label>
                            <input type="password" class="form-control" id="Inputpassword" name="user_pass">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        <button class="btn btn-primary btn-block registr">Зарегистрироваться</button>
                    </form>
                    <form id="reg" method="POST" action="registr.php">
                        <div class="form-group">
                            <label for="login">Логин:</label>
                            <input type="text" class="form-control" id="login" name="login">
                        </div>
                        <div class="form-group">
                            <label for="pass_1">Пароль:</label>
                            <input type="password" class="form-control" id="pass_1" name="pass_1">
                        </div>
                        <div class="form-group">
                            <label for="pass_2">Подтвердите пароль:</label>
                            <input type="password" class="form-control" id="pass_2" name="pass_2">
                        </div>
                        <div class="form-group">
                            <label for="mail">E-mail:</label>
                            <input type="mail" class="form-control" id="mail" name="mail">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                    </form>

                </div>
            </div>
        </div>
    </main>

<script src="libs/jquery-3.3.1.min.js"></script>
<script src="libs/popper.min.js"></script>
<script src="libs/bootstrap.min.js"></script>
<script src="main.js"></script>
</body>
</html>


