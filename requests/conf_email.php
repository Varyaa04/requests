
<?php
if (isset($_POST['submitConf'])) {
    $email = $_SESSION['user']["login"];
    $surname = $_POST["Surname"];
    $name = $_POST["Name"];
    $patronymic = $_POST["Patronymic"];
    $work_place = $_POST["work_place"];
    $position = $_POST["position"];
    $birthdate = $_POST["birthdate"];
    $city = $_POST["city"];
    $topic = $_POST["topic"];
    $degree = $_POST["degree"];

    $to = "pizzeriavarya04@gmail.com"; // Замените на свой email
    $subject = "Заявка на мероприятие (Конференция)";
    $headers = "From: $email";

    $presentationTmp = $_FILES["presentation"]["tmp_name"];
    $thesisTmp = $_FILES["thesis"]["tmp_name"];
    $conclusionTmp = $_FILES["conclusion"]["tmp_name"];

    $presentationName = $_FILES["presentation"]["name"];
    $thesisName = $_FILES["thesis"]["name"];
    $conclusionName = $_FILES["conclusion"]["name"];

    $presentation = file_get_contents($presentationTmp);
    $thesis = file_get_contents($thesisTmp);
    $conclusion = file_get_contents($conclusionTmp);

    $attachment = array(
        array(
            'content' => $presentation,
            'name' => $presentationName,
            'type' => mime_content_type($presentationTmp)
        ),
        array(
            'content' => $thesis,
            'name' => $thesisName,
            'type' => mime_content_type($thesisTmp)
        ),
        array(
            'content' => $conclusion,
            'name' => $conclusionName,
            'type' => mime_content_type($conclusionTmp)
        )
    );

    $body = "От: $surname $name $patronymic   $email\n Место работы: $work_place\n
    Должность: $position\n Дата рождения: $birthdate\n Город проживания: $city\n Тема доклада: $topic\n
        Ученая степень: $degree";

    $success = mailWithAttachments($to, $subject, $body, $headers, $attachment);

    if ($success) {
        http_response_code(200);
        ?><script>alert("Заявка отправлена!")</script><?php
    } else {
        http_response_code(500);
        echo json_encode(array('message' => 'При отправке сообщения произошла ошибка'));
    }
} else {
    http_response_code(403);
}

function mailWithAttachments($to, $subject, $message, $headers, $attachment) {
    $boundary = md5(uniqid(time()));
    $headers .= "\r\nMIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=utf-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message)) . "\r\n";

    foreach ($attachment as $file) {
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: " . $file['type'] . "; name=\"" . $file['name'] . "\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"" . $file['name'] . "\"\r\n\r\n";
        $body .= chunk_split(base64_encode($file['content'])) . "\r\n";
    }

    $body .= "--$boundary--";

    return mail($to, $subject, $body, $headers);
}
?>