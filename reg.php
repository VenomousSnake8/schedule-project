<?php
    session_start();
    $title = "Электронное расписание | Регистрация";

    require("header.php");
?>

<main class="reg_main">
    <?php
        if (!isset($_SESSION["login"])) {
            echo '
                <div class="reg_page_image">
                    <img src="assets/main.jpg" id="reg_image">
                </div>
                <div class="reg">
                    <h1 style="text-align: center;">Регистрация новых администраторов</h1><p class="warning">У вас нет прав для доступа к этой странице. <a href="auth.php">Авторизуйтесь</a> как главный администратор, чтобы продолжить.</p>
                </div>';
        }
        else {
            $mysql = new mysqli('localhost','root','','admin_users');
            $username = $_SESSION["login"];

            $stmt = $mysql->prepare("SELECT chief_admin FROM `user_data` WHERE login = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row["chief_admin"] != 1) {
                echo '
                    <div class="reg_page_image">
                        <img src="assets/main.jpg" id="reg_image">
                    </div>
                    <div class="reg">
                        <h1 style="text-align: center;">Регистрация новых администраторов</h1><p class="warning">У вас нет прав для доступа к этой странице. <a href="auth.php">Авторизуйтесь</a> как главный администратор, чтобы продолжить.</p>
                    </div>';
            }
            else {
                echo '
                    <div class="reg_page_image">
                        <img src="assets/main.jpg" id="reg_image">
                    </div>
                    <div class="reg">
                        <h1>Регистрация новых администраторов</h1>
                        <form action="databases/reg_script.php" method="POST">
                            <input type="text" placeholder="Логин" name="login" required><br>
                            <input type="password" placeholder="Пароль" name="password" required><br>
                            <input type="email" placeholder="E-mail" name="email" required><br>
                            <input type="text" placeholder="Фамилия" name="last_name" required><br>
                            <input type="text" placeholder="Имя" name="first_name" required><br>
                            <input type="text" placeholder="Отчество" name="middle_name" required><br>
                            <input type="text" placeholder="Номер телефона" name="phone_number" style="margin-bottom: 20px;" data-phone-pattern required><br>
                            <input type="checkbox" name="chief_admin" id="chief_admin">
                            <label for="chief_admin">Сделать пользователя главным администратором (дать возможность создавать новых администраторов)</label><br>
                            <input type="submit" value="Зарегистрировать" id="reg_button">
                        </form>
                ';
                if ($_GET["successful_reg"] == 1) {
                    echo '<p class="success">Пользователь успешно зарегистрирован!</p>';
                }
                echo '</div>';
            }
        }
    ?>
</main>
<footer style="position: fixed; width: 100%; bottom: 0;">&copy; Venomous Snake 2024</footer>
<script src="script/script.js"></script>
<script src="script/phone_shape.js"></script>
</body>
</html>