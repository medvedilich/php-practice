<?php
session_start();
$_SESSION['user'] = null;
header('location: task_15.php');
exit;