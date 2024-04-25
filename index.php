<?php
require_once('db.php');

session_start();

if(isset($_POST['submitReg'])){
    $login = $_POST['uname'];
    $pass = $_POST['psw'];
    $pass_repeat = $_POST['psw_rep'];
    
    if($pass != $pass_repeat){
        echo ' <dialog open="open" id="closeMe" aria-labelledby="heading">
        <h2 id="heading">Введенные пароли не совпадают!</h2>
        <form method="dialog">
          <button> Продолжить </button>
        </form>
        </dialog>';    }else{
        $sql = "INSERT INTO `users` (login,password) VALUES ('$login', '$pass')";
        if($conn -> query($sql) === TRUE)
        {
            echo ' <dialog open="open" id="closeMe" aria-labelledby="heading">
            <h2 id="heading">Вы успешно зарегистрировались!</h2>
            <form method="dialog">
              <button> Продолжить </button>
            </form>
            </dialog>';
        }
        else
        {
            echo ' <dialog open="open" id="closeMe" aria-labelledby="heading">
            <h2 id="heading">Ошибка:</h2>' .$conn -> error .'
            <form method="dialog">
              <button> Продолжить </button>
            </form>
            </dialog>';
        }
    }
}

if(isset($_POST['submitL']))
{

    $login = $_POST['unameLogin'];
    $pass = $_POST['pswLogin'];

    $sql = "SELECT * FROM `users` WHERE login = '$login' and password = '$pass'";
    $result = $conn -> query($sql);

    $check_user = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($check_user);
    if ($result->num_rows > 0) {
        $_SESSION['user'] = [
            "login" => $user['login']
        ];
        header('Location: requests/requests_main.php');
    } else {
        echo '<dialog open="open" id="closeMe" aria-labelledby="heading">
            <h2 id="heading">Такого пользователя не существует!</h2>
            <form method="dialog">
                <button>Продолжить</button>
            </form>
        </dialog>';
    }
}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="auth.css">
    <title>Авторизация</title>
</head>
    <body>
        <div class="header">
            <div class="header_textLG" id="header_textLG" style="display: block;"><h1>Авторизация</h1></div> 
            <div class="header_textREG" id="header_textREG" style="display: none;"><h1>Регистрация</h1></div> 
        </div>
        <form id="loginForm" action="" method="post" >
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="email" placeholder="Введите Email" name="unameLogin" required autocomplete="off">
        
                <label for="psw"><b>Пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="pswLogin" required>
        
                <button type="submit" name="submitL">Войти</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                Нет аккаунта? <a href="#" onclick="showRegisterForm()"> Зарегистрируйтесь!</a>
            </div>
        </form>
        
        <form id="registerForm" action="" method="post" style="display:none;">
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="email" placeholder="Введите Email" name="uname" required autocomplete="off">
        
                <label for="psw"><b>Пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="psw" required>
        
                <label for="psw_rep"><b>Повторите пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="psw_rep" required>
        
                <button type="submit" name="submitReg">Зарегистрироваться</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                Уже зарегистрированы? <a href="#" onclick="showLoginForm()"> Войти в аккаунт!</a>
            </div>
        </form>
        
        <script>
            function showRegisterForm() {
                document.getElementById("loginForm").style.display = "none";
                document.getElementById("header_textLG").style.display = "none";

                document.getElementById("registerForm").style.display = "block";
                document.getElementById("header_textREG").style.display = "block";

            }
        
            function showLoginForm() {
                document.getElementById("loginForm").style.display = "block";
                document.getElementById("header_textLG").style.display = "block";

                document.getElementById("registerForm").style.display = "none";
                document.getElementById("header_textREG").style.display = "none";
            }
        </script>
        
        </body>
        </html>

