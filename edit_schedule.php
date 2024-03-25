<?php
    session_start();
    $title = "Электронное расписание | Изменить расписание";

    require("header.php");
?>

<main>
    <?php
        if (!isset($_SESSION["login"])) {
            echo '<h1 style="text-align: center; margin-top: 30px;">Редактировать расписание</h1><p class="warning">У вас нет прав для доступа к этой странице. <a href="auth.php">Авторизуйтесь</a> как администратор, чтобы продолжить.</p>';
        }
        else {
            echo '
                <h1 style="text-align: center; margin-top: 13px;">Редактировать расписание</h1>
                <form action="databases/table_script.php" method="POST">
                    Выберите группу:&nbsp;
                    <select name="schedule_name">
                        <option value="schedule_23isps1" ';
            if (isset($_GET['group'])) {
                if ($_GET['group'] == '23isps1') {
                    echo 'selected';
                }
            }
            echo '
                >23ИСП-с1</option>
                        <option value="schedule_23isps2" ';
            if (isset($_GET['group'])) {
                if ($_GET['group'] == '23isps2') {
                    echo 'selected';
                }
            }
            echo '
                >23ИСП-с2</option>
                    </select><br>
                    <input type="submit" value="Показать">
                </form>
            ';
            if ($_GET['success'] == 1) {
                echo '<p class="success">Данные успешно сохранены!</p>';
            }
            if (isset($_GET['group'])) {
                echo '
                <br>

                <form action="databases/update_schedule_script.php" method="POST">
                    <input type="hidden" name="group_name" value="';
            if (isset($_GET['group'])) {
                if ($_GET['group'] == '23isps1') {
                    echo 'schedule_23isps1">';
                }
                elseif ($_GET['group'] == '23isps2') {
                    echo 'schedule_23isps2">';
                }
            }
                echo '
                    <div id="table_container">
                ';

                if (isset($_GET['group'])) {
                    if ($_GET['group'] == '23isps1') {
                    // Получить выбранное расписание
                    $schedule_name = 'schedule_23isps1';

                    // Подключиться к базе данных
                    $mysql = new PDO('mysql:host=localhost;dbname=schedules','root','');

                        // Вывести заголовок таблицы
                        echo '<table class="beautiful_table">';
                        echo "<tr><td></td><td>Понедельник</td><td>Вторник</td><td>Среда</td><td>Четверг</td><td>Пятница</td></tr>";

                        // Массив со временем уроков
                        $timearr = ["8.30 – 9.15", "9.25 – 10.10", "10.20 – 11.05", "11.25 – 12.10", "12.30 – 13.15", "13.35 – 14.20", "14.40 – 15.25", "15.35 – 16.20"];

                        // Вывести строки таблицы
                        $i = 1;
                        while ($i <= 8) {
                            echo "<tr>";
                            echo "<td>" . $i . " урок<br>(" . $timearr[$i - 1] . ")</td>";
                            for ($j = 1; $j <= 5; $j++) {
                                $day = ["mon", "tue", "wed", "thu", "fri"];
                                $name = "schedule_" . $i . "_" . $day[$j - 1];

                                $query = "SELECT lesson_name FROM $schedule_name WHERE number_of_lesson = ? AND day_of_week = ?";
                                $stmt = $mysql->prepare($query);
                                $stmt->execute([$i, $day[$j - 1]]);
                                $row = $stmt->fetch();

                                echo "<td><textarea class='editable_lesson' name='" . $name . "' rows='2'>" . $row['lesson_name'] . "</textarea></td>";
                            }
                            $i++;
                        }

                        echo "</table>";
                    }

                    elseif ($_GET['group'] == '23isps2') {
                        // Получить выбранное расписание
                        $schedule_name = 'schedule_23isps2';

                        // Подключиться к базе данных
                        $mysql = new PDO('mysql:host=localhost;dbname=schedules','root','');

                            // Вывести заголовок таблицы
                            echo '<table class="beautiful_table">';
                            echo "<tr><td></td><td>Понедельник</td><td>Вторник</td><td>Среда</td><td>Четверг</td><td>Пятница</td></tr>";

                            // Массив со временем уроков
                            $timearr = ["8.30 – 9.15", "9.25 – 10.10", "10.20 – 11.05", "11.25 – 12.10", "12.30 – 13.15", "13.35 – 14.20", "14.40 – 15.25", "15.35 – 16.20"];

                            // Вывести строки таблицы
                            $i = 1;
                            while ($i <= 8) {
                                echo "<tr>";
                                echo "<td>" . $i . " урок<br>(" . $timearr[$i - 1] . ")</td>";
                                for ($j = 1; $j <= 5; $j++) {
                                    $day = ["mon", "tue", "wed", "thu", "fri"];
                                    $name = "schedule_" . $i . "_" . $day[$j - 1];

                                    $query = "SELECT lesson_name FROM $schedule_name WHERE number_of_lesson = ? AND day_of_week = ?";
                                    $stmt = $mysql->prepare($query);
                                    $stmt->execute([$i, $day[$j - 1]]);
                                    $row = $stmt->fetch();

                                    echo "<td><textarea class='editable_lesson' name='" . $name . "' rows='2'>" . $row['lesson_name'] . "</textarea></td>";
                                }
                                $i++;
                            }

                            echo "</table>";
                    }

                    else {
                        echo 'Потом сделаю';
                    }
                }
                echo '
                    </div>
                    <input type="submit" name="submit" value="Изменить">
                </form>
            ';
        }
    }
    ?>
</main>
<footer style="position: fixed; width: 100%; bottom: 0;">&copy; Venomous Snake 2024</footer>
<script src="script/script.js"></script>
</body>
</html>