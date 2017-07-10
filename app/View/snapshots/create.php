<?php

var_dump($_POST);

$type = "data:image/png;base64,";
if (substr($_POST['base64'], 0, strlen($type)) !== $type) return ;

?>
