<?php

unlink("img/demo/gallery/$_GET[id].$_GET[type]");

require('Database.php');
$db = new Database('localhost', 'root', '', 'practice');
$db->deleteRows('images', ['id'=>$_GET['id']]);
header('location: task_17.php');
exit;