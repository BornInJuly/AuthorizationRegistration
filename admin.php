<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: form.php');
    die;
}

if ($_SESSION['role'] != 1) {
    header('Location: index.php');
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
    <title>SocialAdmin</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbottom">
            <a class="navbar-brand" id="big" href="#">
                <img src="img/network.png" width="45" height="45" class="d-inline-block align-top logobord" alt="">
                SocialNet
            </a>
            <a class="navbar-brand" id="small" href="unauth.php">
                Выйти
            </a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 hello">
                    <div class="admin-logo"></div>
                    <?php     
                        echo '<h1>Привет, ' . $_SESSION['login'] . '!</h1>';
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <?php     
                        echo '<h2>Ниже представлен список зарегистрированных на сайте пользователей:</h2>';

                        include 'db.php';

                        $query = "SELECT * FROM users WHERE role = '2'";
                        $result = mysqli_query($link, $query);

                        $users = [];

                        while ($user = mysqli_fetch_assoc($result)) {
                            $users[] = $user;
                        }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">user_id</th>
                                <th scope="col">login</th>
                                <th scope="col">mail</th>
                                <th scope="col">created_date</th>
                            </tr>
                        </thead>
                    <?php
                        foreach ($users as $user) {
                            echo'<tbody>
                                    <tr>
                                        <th scope="row">'.$user['user_id'].'</th>
                                        <td>'.$user['login'].'</td>
                                        <td>'.$user['mail'].'</td>
                                        <td>'.$user['created_date'].'</td>
                                    </tr>
                                </tbody>';
                        }
                    ?>
                    </table>;
                </div>
            </div>
        </div>
    </main>

<script src="libs/jquery-3.3.1.slim.min.js"></script>
<script src="libs/popper.min.js"></script>
<script src="libs/bootstrap.min.js"></script>
<script src="main.js"></script>
</body>
</html>