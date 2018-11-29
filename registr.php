<?php

include 'db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$login = $data['login'];
$pass_1 = $data['pass_1'];
$pass_2 = $data['pass_2'];
$role = $data['role'];
$mail = $data['mail'];
$phone = $data['phone'];

if ($login != '' && $pass_1 != '' && $pass_2 != '' && $mail != '' && $phone != '') {

    if ($pass_1 == $pass_2) {
        $query = "SELECT user_id FROM users WHERE login = '$login'";
        $result = mysqli_query($link,$query);
        mysqli_num_rows($result);
        
        if (mysqli_num_rows($result) === 0) {

            $query = "INSERT INTO users (login, pass, role, mail, phone, created_date)
                    VALUES ('$login', '$pass_1', '$role', '$mail', '$phone', NOW())";
            mysqli_query($link, $query);
            $error = mysqli_error($link);

            if ($error) {
                echo $error;
            } else {
                echo json_encode($data);
            }

        }   else {
            echo json_encode('Пользователь с таким логином существует!');
            die;
        }
    
    } else {
        echo json_encode('Пароли не совпадают!');
        die; 
    }

} else {
    echo json_encode('Заполните все поля!');
}

?>
