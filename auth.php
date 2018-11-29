<?php

session_start();
if (isset($_SESSION['login'])) {
    header('Location: admin.php');
    die;
}

?>

<?php 

include 'db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$login = $data['login'];
$pass = $data['pass'];
$role = $data['role'];


if ($login != '' && $pass != '') {

    $query = "SELECT role FROM users WHERE login='$login' AND pass='$pass'";
    $result = mysqli_query($link, $query);
    $error = mysqli_error($link);

    if ($error) {
        echo json_encode('dberror');
    } else 
        if (mysqli_num_rows($result) != 0) {
            // session_start();
            $user = mysqli_fetch_assoc($result);
            $_SESSION['login'] = $login;
            $_SESSION['role'] = $user['role'];
            echo json_encode($_SESSION['login']);
            } else {
            echo json_encode('401');
            die;
        }       
} else {
    echo json_encode('');
} 

?>