
<?php
require 'Files.php';

if(addFile('image', $_POST['id'], 'img\demo\gallery\\')){
    require('Database.php');
    $db->createRow('images', ['id'=>$_POST['id'], 'type'=>$type]);
    header('location: task_16.php');
    exit;
}
echo 'Ошибка загрузки';
