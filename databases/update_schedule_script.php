<?php
    $mysql = new PDO('mysql:host=localhost;dbname=schedules','root','');

    if (isset($_POST)) {
        for ($i = 1; $i <= 8; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $day = ['mon', 'tue', 'wed', 'thu', 'fri'];
                $name = "schedule_" . $i . "_" . $day[$j - 1];
                $lessonName = $_POST[$name];
                $scheduleName = $_POST['group_name'];

                $query = "SELECT id FROM $scheduleName WHERE number_of_lesson = ? AND day_of_week = ?";
                $stmt = $mysql->prepare($query);
                $stmt->execute([$i, $day[$j - 1]]);
                $row = $stmt->fetch();

                if ($row) {
                    $query = "UPDATE $scheduleName SET lesson_name = ? WHERE id = ?";
                    $stmt = $mysql->prepare($query);
                    $stmt->execute([$lessonName, $row['id']]);
                }
            }
        }

        $groupName = $_POST['group_name'];
        $parts = explode("_", $groupName);

        header('Location: /edit_schedule.php?success=1&group=' . $parts[1]);
        exit;
    }
?>