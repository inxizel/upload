<?php

foreach($_FILES['img_file']['name'] as $name => $value)
{
	$name_file = stripslashes($_FILES['img_file']['name'][$name]);
	$source_file = $_FILES['img_file']['tmp_name'][$name];
	
    $path_file = $name_file;

    $up = move_uploaded_file($source_file, $path_file);

    var_dump($up);

}

?>