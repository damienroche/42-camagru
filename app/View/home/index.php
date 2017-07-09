<?php

$form = new Core\Builder\Form($_POST);

echo $form->open('/users/create', 'POST');
echo $form->input('username', 'text', 'Username');
echo $form->input('email', 'email', 'Email');
echo $form->input('password', 'password');
echo $form->submit();
echo $form->close();

echo $form->open('/users/login', 'POST');
echo $form->input('username', 'text', 'Username');
echo $form->input('password', 'password');
echo $form->submit();
echo $form->close();
?>
