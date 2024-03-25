<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Brygada+1918:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="icon" href="/assets/pngwing.com.png">
</head>
<body <?php if ($title == "Электронное расписание | Авторизация" || $title == "Электронное расписание | Регистрация") echo 'class="specific_body"'?>>
    <header>
        <a href="/index.php"><img src="/assets/pngwing.com.png"></a>
        <div class="header_title">Электронное расписание<br>для студентов высшего учебного заведения</div>
        <div class="burger" id="burger_container">
            <svg width="41" height="30" viewBox="0 0 41 30" fill="none" xmlns="http://www.w3.org/2000/svg" id="burger">
                <rect width="41" height="8" rx="3" fill="#D9D9D9"/>
                <rect y="11" width="41" height="8" rx="3" fill="#D9D9D9"/>
                <rect y="22" width="41" height="8" rx="3" fill="#D9D9D9"/>
            </svg>
        </div>
        <div class="menu" id="menu_container">
            <?php
                if (!isset($_SESSION["login"])) {
                    echo '<a href="auth.php">Вход для администратора</a>';
                }
                else {
                    echo '<a href="personal_account.php">Личный кабинет</a>';
                    echo '<a href="edit_schedule.php">Изменить расписание</a>';

                    $mysql = new mysqli('localhost','root','','admin_users');
                    $username = $_SESSION["login"];

                    $stmt = $mysql->prepare("SELECT chief_admin FROM `user_data` WHERE login = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row["chief_admin"] == 1) {
                        echo '<a href="reg.php">Добавить админа</a>';
                    }

                    echo '<a href="logout.php">Выйти</a>';
                }
            ?>
        </div>
    </header>