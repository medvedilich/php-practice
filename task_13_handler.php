<?php
session_start();
$_SESSION['number'] += 1;
header('location: task_13.php');
exit;