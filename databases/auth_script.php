<?php

session_start();

if (!isset($_POST['login']) || !isset($_POST['password'])) {
    exit("Отсутствуют обязательные параметры");
}

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$pass = md5($password);
$mysql = new mysqli('localhost','root','','admin_users');

if ($mysql -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysql -> connect_error;
  exit();
}

$stmt = $mysql->prepare("SELECT * FROM `user_data` WHERE login=?");
$stmt->bind_param("s", $login);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if(!$user) {
    header("Location: ../auth.php?error_code=1");
    exit();
}

if (!($pass == $user['password'])) {
    header("Location: ../auth.php?error_code=2");
    exit();
}

if ($pass == $user['password']) {
    $authed = true;
    $_SESSION["login"] = $login;
    header('Location: /');
    exit();
}

$stmt->close();
$mysql->close();
?>