<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: form.php');
    die;
}

unset($_SESSION['login']);

header('Location: form.php');
die;