<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
</head>
<body>
    <h3>Регистрация команды для квиза</h3>
    <form action="" method="post">
        <label for="team_name">Название команды:</label>
        <input type="text" id="team_name" name="team_name" required><br><br>

        <h3 style="text-align: left;">Участники команды:</h3>

        <ol>
            <li>
                <label for="member1_name">ФИО участника 1:</label>
                <input type="text" id="member1_name" name="member1_name" required ><br>
                <label for="member1_work">Место работы участника 1:</label>
                <input type="text" id="member1_work" name="member1_work" required ><br>
                <label for="member1_position">Должность участника 1:</label>
                <input type="text" id="member1_position" name="member1_position" required><br><br>
            </li>
            <li>
                <label for="member2_name">ФИО участника 2:</label>
                <input type="text" id="member2_name" name="member2_name" required><br>
                <label for="member2_work">Место работы участника 2:</label>
                <input type="text" id="member2_work" name="member2_work" required><br>
                <label for="member2_position">Должность участника 2:</label>
                <input type="text" id="member2_position" name="member2_position" required><br><br>
            </li>
            <li>
                <label for="member3_name">ФИО участника 3:</label>
                <input type="text" id="member3_name" name="member3_name" required><br>
                <label for="member3_work">Место работы участника 3:</label>
                <input type="text" id="member3_work" name="member3_work" required><br>
                <label for="member3_position">Должность участника 3:</label>
                <input type="text" id="member3_position" name="member3_position" required><br><br>
            </li>
            <li>
                <label for="member4_name">ФИО участника 4:</label>
                <input type="text" id="member4_name" name="member4_name" required><br>
                <label for="member4_work">Место работы участника 4:</label>
                <input type="text" id="member4_work" name="member4_work" required><br>
                <label for="member4_position">Должность участника 4:</label>
                <input type="text" id="member4_position" name="member4_position" required><br><br>
            </li>
            <li>
                <label for="member5_name">ФИО участника 5:</label>
                <input type="text" id="member5_name" name="member5_name" required><br>
                <label for="member5_work">Место работы участника 5:</label>
                <input type="text" id="member5_work" name="member5_work" required><br>
                <label for="member5_position">Должность участника 5:</label>
                <input type="text" id="member5_position" name="member5_position" required><br><br>
            </li>
        </ol>

        <input type="submit" name="submitQuiz" value="Отправить">
    </form>
</body>
</html>