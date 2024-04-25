<?php
session_start();

if (isset($_POST['submitTable'])) {
        $email = $_SESSION['user']['login'];
        $surname = $_POST["Surname"];
        $name = $_POST["Name"];
        $patronymic = $_POST["Patronymic"];
        $work_place = $_POST["work_place"];
        $position = $_POST["position"];
        $abstract = $_POST["abstract"];

        $to = "pizzeriavarya04@gmail.com"; // Замените на свой email
        $subject = "Заявка на мероприятие (Круглый стол)";
        $headers = "From: $email";

        $body = "От: $surname $name $patronymic   $email\n Место работы: $work_place\n
        Должность: $position\n
        Аннотация: $abstract";
        
        if (mail($to, $subject, $body, $headers)) {
            http_response_code(200);
            echo '<script>alert("Заявка отправлена!")</script>';
        } else {
            http_response_code(500);
            echo json_encode(array('message' => 'При отправке сообщения произошла ошибка'));
        }
    } else {
        http_response_code(403);
    }
?>