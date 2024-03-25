<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
$first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
$middle_name = filter_var(trim($_POST['middle_name']), FILTER_SANITIZE_STRING);
$phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
$chief_admin = isset($_POST['chief_admin']) ? 1 : 0;

$pass = md5($password);

$mysql = new mysqli('localhost','root','','admin_users');

$mysql->query("INSERT INTO `user_data` (`login`, `password`, `email`, `last_name`, `first_name`, `middle_name`, `phone_number`, `chief_admin`) VALUES ('$login', '$pass', '$email', '$last_name', '$first_name', '$middle_name', '$phone_number', '$chief_admin')");    

$mysql->close();

header('Location: /reg.php?successful_reg=1');
exit;

?>