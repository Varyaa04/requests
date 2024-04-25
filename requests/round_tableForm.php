<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <h3>Регистрация на круглый стол</h3>
    <form action="" method="post">

        <label for="Surname">Фамилия:</label>
        <input type="text" id="Surname" name="Surname" required autocomplete="off"><br><br>

        <label for="Name">Имя:</label>
        <input type="text" id="Name" name="Name" required autocomplete="off"><br><br>

        <label for="Patronymic">Отчество:</label>
        <input type="text" id="Patronymic" name="Patronymic" autocomplete="off"><br><br>

        <label for="work_place">Место работы:</label>
        <input type="text" id="work_place" name="work_place"required><br><br>

        <label for="position">Должность:</label>
        <input type="text" id="position" name="position"required><br><br>

        <label for="abstract">Аннотация доклада (краткое мнение по указанной тематике):</label>
        <textarea id="abstract" name="abstract" rows="4" required></textarea><br><br>

        <input type="submit" name="submitTable" value="Отправить">
    </form>
</body>
</html>