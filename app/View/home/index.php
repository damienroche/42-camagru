<?php

$form = new Core\Builder\Form($_POST);

echo $form->open('', 'POST');
echo $form->input('name', 'text', 'Nom');
echo $form->input('password', 'password');
echo $form->submit();
echo $form->close();
?>
