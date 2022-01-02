
<?php

function get_type($file_name){
    $index = strripos($file_name, '.');
    return substr($file_name, $index + 1);
}

$file = $_FILES['image'];
$type = get_type($file['name']);
$file_name = 'img\demo\gallery\\' . $_POST['id'].'.'.$type;

require('Database.php');
$db = new Database('localhost', 'root', '', 'practice');
$db->createRow('images', ['id'=>$_POST['id'], 'type'=>$type]);

if(move_uploaded_file($file['tmp_name'], $file_name)){
    header('location: task_16.php');
    exit;
}
echo 'Ошибка загрузки';