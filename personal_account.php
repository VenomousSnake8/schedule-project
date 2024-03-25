<?php
    session_start();
    $title = "Электронное расписание | Личный кабинет";

    require("header.php");
?>

<main style="text-align: center; font-family: 'Brygada 1918', serif;">
    <?php
        if (!isset($_SESSION['login'])) {
            echo '<h1 style="text-align: center; margin-top: 30px;">Личный кабинет</h1><p class="warning">Вы не авторизованы. <a href="auth.php">Авторизуйтесь</a>, чтобы продолжить.</p>';
        }
        else {
            echo '<h1 style="text-align: center; margin-top: 30px;">Личный кабинет</h1>';

            $mysql = new PDO('mysql:host=localhost;dbname=admin_users','root','');

            $login = $_SESSION['login'];

            $query = "SELECT * FROM user_data WHERE login = :login";
            $stmt = $mysql->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            $user = $stmt->fetch();

            echo '<table class="pa">
                    <tr>
                        <td>Логин:</td>
                        <td><input type="text" class="pers" value="' . $user['login'] . '" readonly></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" class="pers" value="' . $user['email'] . '" readonly></td>
                    </tr>
                    <tr>
                        <td>ФИО:</td>
                        <td><input type="text" class="pers" value="' . $user['last_name'] . ' ' . $user['first_name'] . ' ' . $user['middle_name'] . '" readonly></td>
                    </tr>
                    <tr>
                        <td>Номер телефона:</td>
                        <td><input type="text" class="pers" value="' . $user['phone_number'] . '" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="2">';
                
                if ($user['chief_admin'] == 1) {
                    echo 'Вы являетесь главным администратором.';
                }
                else {
                    echo 'Вы не являетесь главным администратором.';
                }

                echo '</td></tr></table>';
        }
    ?>
</main>
<footer style="position: fixed; width: 100%; bottom: 0;">&copy; Venomous Snake 2024</footer>
<script src="script/script.js"></script>
</body>
</html>