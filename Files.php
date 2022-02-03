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
