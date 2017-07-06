<?php

echo "users.index";

$users = new App\Model\User();

print_r($users->getById());


 ?>
