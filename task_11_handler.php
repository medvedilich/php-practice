<?php
require 'Database.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$match = $db->getRows(
    'users', 
    'email', 
    ['email', $email, '=']);

if($match != null){
    session_start();
    $_SESSION['error'] = 'Этот эл адрес уже занят другим пользователем';
    header('location: task_11.php');
    exit;
}

$db->createRow('users', ['email'=>$email, 'password'=>$password]);
header('location: task_11.php');
exit;



