<?php

function get_type($file_name){
    $index = strripos($file_name, '.');
    return substr($file_name, $index + 1);
}

require('Database.php');
$db = new Database('localhost', 'root', '', 'practice');

$file = $_FILES['images'];

$error = false;
for($i = 0; isset($file['name'][$i]);$i++){

    $type = get_type($file['name'][$i]);
    $id = $_POST['id'] + $i;
    $name = 'img\demo\gallery\\' . $id.'.'.$type;

    $db->createRow('images', ['id'=>$id, 'type'=>$type]);
    if(!move_uploaded_file($file['tmp_name'][$i], $name))
        $error = true;
}
if(!$error){
    header('location: task_18.php');
    exit;
}