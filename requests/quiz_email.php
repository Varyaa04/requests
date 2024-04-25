<?php
session_start();

if (isset($_POST['submitQuiz']) && isset($_SESSION['user']['login'])) {
    $email = $_SESSION['user']["login"];
    
    $name_team = $_POST['team_name'];
    $team_members = "";

    // Собираем информацию о каждом участнике
    for ($i = 1; $i <= 5; $i++) {
        $name = $_POST["member${i}_name"];
        $work_place = $_POST["member${i}_work"];
        $position = $_POST["member${i}_position"];
        
        $team_members .= "Участник $i: ФИО - $name, Место работы - $work_place, Должность - $position\n\n\n";
    }

    $to = "pizzeriavarya04@gmail.com"; // Замените на свой email
    $subject = "Заявка на мероприятие (Квиз)";
    $headers = "From: $email";

    $body = "Команда: $name_team  $email\n\n" . $team_members;

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