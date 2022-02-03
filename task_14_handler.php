<?php
require('Database.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$row = $db->getRows('users', null, ['email', $email, '='])[0];

if($row == null || !password_verify($password, $row['password']))
    $_SESSION['error'] = 'Неверный логин или пароль';
else
    $_SESSION['user'] = $email;

header('location: task_14.php');
exit;
