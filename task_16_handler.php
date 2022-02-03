
<?php

function get_type($file_name){
    $index = strripos($file_name, '.');
    return substr($file_name, $index + 1);
}

function addFile($array_name, $id, $path){
    $file = $_FILES[$array_name];
    $type = get_type($file['name']);
    $file_name = $path.$id.'.'.$type;
    return move_uploaded_file($file['tmp_name'], $file_name);
}

if(addFile('image', $_POST['id'], 'img\demo\gallery\\')){
    require('Database.php');
    $db->createRow('images', ['id'=>$_POST['id'], 'type'=>$type]);
    header('location: task_16.php');
    exit;
}
echo 'Ошибка загрузки';
