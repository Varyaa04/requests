<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <h3>Регистрация на конференцию</h3>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="Surname">Фамилия:</label>
        <input type="text" id="Surname" name="Surname"required autocomplete="off"><br><br>

        <label for="Name">Имя:</label>
        <input type="text" id="Name" name="Name" required autocomplete="off"><br><br>

        <label for="Patronymic">Отчество:</label>
        <input type="text" id="Patronymic" name="Patronymic" autocomplete="off" ><br><br>

        <label for="work_place">Место работы:</label>
        <input type="text" id="work_place" name="work_place" ><br><br>

        <label for="position">Должность:</label>
        <input type="text" id="position" name="position"><br><br>

        <label for="birthdate">Дата рождения:</label>
        <input type="date" id="birthdate" name="birthdate" min="1930-01-01" max="2005-12-31" required><br><br>

        <label for="city">Город проживания:</label>
        <input type="text" id="city" name="city"><br><br>

        <label for="topic">Тема доклада:</label>
        <input type="text" id="topic" name="topic"><br><br>

        <label for="degree">Ученая степень:</label>
        <input type="text" id="degree" name="degree"><br><br>

        <label for="presentation">Презентация (PDF, PPTX):</label>
        <input type="file" id="presentation" name="presentation" accept=".pdf, .pptx" required><br><br>

        <label for="thesis">Тезисы доклада (DOCX, TXT):</label>
        <input type="file" id="thesis" name="thesis" accept=".docx, .txt" required><br><br>

        <label for="conclusion">Заключение (PDF, DOCX):</label>
        <input type="file" id="conclusion" name="conclusion" accept=".pdf, .docx" required><br><br>

        <input type="submit" name="submitConf" value="Отправить">
    </form></body>
</html>