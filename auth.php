<?php
    session_start();
    $title = "Электронное расписание | Авторизация";

    require("header.php");
?>

    <main>
        <div class="big_div">
            <div class="auth_page_image">
                <img src="assets/orig.jpeg" id="auth_image">
            </div>
            <div class="auth">
                <p>Введите данные для входа на панель администратора:</p>
                <form action="databases/auth_script.php" method="POST">
                    <input type="text" placeholder="Логин" id="login" name="login" required><br>
                    <input type="password" placeholder="Пароль" id="pass" name="password" required><br>
                    <input type="submit" value="Авторизоваться" id="auth_button">
                </form>
                <?php
                    if (isset($_GET["error_code"])) {
                        echo '<p class="error-message">';
                        if ($_GET["error_code"] == "1") {
                            echo 'Такого пользователя не существует, проверьте введённые данные.';
                        }
                        else {
                            echo 'Вы ввели неверный пароль, проверьте введённые данные.';
                        }
                        echo '</p>';
                    }
                ?>
            </div>
        </div>
    </main>
    <footer style="position: fixed; bottom: 0; width: 100%;">&copy; Venomous Snake 2024</footer>
    <script src="script/script.js"></script>
</body>
</html>