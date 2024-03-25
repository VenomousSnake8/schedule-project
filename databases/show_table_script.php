<?php

// Получить выбранное расписание
$schedule_name = $_POST['schedule_name'];

if ($schedule_name == 'schedule_23isps1') {
    header('Location: /index.php?group=23isps1');
    exit;
}
elseif ($schedule_name == 'schedule_23isps2') {
    header('Location: /index.php?group=23isps2');
}

?>