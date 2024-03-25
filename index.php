<?php
    session_start();
    $title = "Электронное расписание | Главная";

    require("header.php");
?>

<main>
    <div class="main_image">
        <img src="assets/Group 1 (3).png" id="main_svg">
        <div class="welcome_text_container">
            <p class="welcome_text">Добро пожаловать в электронное расписание студентов!</p><br>
            <p>Мы создали эту информационную систему, чтобы сделать вашу учебную жизнь более удобной и организованной. Здесь вы найдёте актуальное расписание всех занятий, мероприятий и экзаменов, а также сможете легко планировать своё учебное время. Мы стремимся обеспечить вас всей необходимой информацией в удобном и доступном формате. Приятного использования нашей системы, и пусть каждый ваш день будет запланирован и продуктивен!</p>
        </div>
    </div>
    <form action="databases/show_table_script.php" method="post">
        Выберите группу:&nbsp;
        <select name="schedule_name">
            <option value="schedule_23isps1" <?php if (isset($_GET['group'])) {if ($_GET['group'] == '23isps1') echo 'selected';} ?>>23ИСПс-1</option>
            <option value="schedule_23isps2" <?php if (isset($_GET['group'])) {if ($_GET['group'] == '23isps2') echo 'selected';} ?>>23ИСПс-2</option>
        </select><br>
        <input type="submit" value="Выбрать">
    </form>
    <?php
    if (isset($_GET['group'])) {
                    if ($_GET['group'] == '23isps1') {
                    // Получить выбранное расписание
                    $schedule_name = 'schedule_23isps1';

                    // Подключиться к базе данных
                    $mysql = new PDO('mysql:host=localhost;dbname=schedules','root','');

                        // Вывести заголовок таблицы
                        echo '<table class="beautiful_table" style="margin-bottom: 35px;">';
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

                                echo "<td><textarea class='editable_lesson' name='" . $name . "' rows='2' readonly>" . $row['lesson_name'] . "</textarea></td>";
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
                            echo '<table class="beautiful_table" style="margin-bottom: 35px;">';
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

                                    echo "<td><textarea class='editable_lesson' name='" . $name . "' rows='2' readonly>" . $row['lesson_name'] . "</textarea></td>";
                                }
                                $i++;
                            }

                            echo "</table>";
                    }

                    else {
                        echo 'Потом сделаю';
                    }
                }
            ?>
</main>
<footer style="position: fixed; width: 100%; bottom: 0;">&copy; Venomous Snake 2024</footer>
<script src="script/script.js"></script>
</body>
</html>