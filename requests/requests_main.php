<?php 
session_start();
require 'conf_email.php';
require 'rt_email.php';
require 'quiz_email.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="requests_style.css">
    <title>Прием заявок</title>
</head>
<body>
<h4>Здравствуйте, <?= $_SESSION['user']['login']?></h4>
    <div class="header">
        <button class="account" onclick="document.location='../logout.php'">Выход</button>
        <h2>Пожалуйста, выберите тип мероприятия</h2>
    </div>
        
    <div class="rb">
        <div class="form_radio_btn">
            <input id="radioConfeernce" type="radio" name="radio" value="conferenceForm">
            <label for="radioConfeernce">Конференция</label>
        </div>
        
        <div class="form_radio_btn">
            <input id="radioRound_table" type="radio" name="radio" value="round_tableForm">
            <label for="radioRound_table">Круглый стол</label>
        </div>
        
        <div class="form_radio_btn">
            <input id="radioQuiz" type="radio" name="radio" value="quizForm">
            <label for="radioQuiz">Квиз</label>
        </div>
    </div>

<div id="formContainer"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('input[type="radio"]').change(function() {
        var selectedValue = $(this).val();
        $('#formContainer').load(selectedValue + '.php');
    });

</script>
<script src="plugins/jquery.maskedinput.js"></script>
</body>
</html>