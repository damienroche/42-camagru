<?php

$form = new Core\Builder\Form($_POST);

?>

<?php if (!isset($_SESSION['auth'])): ?>

<?php
echo $form->open('/users/create', 'POST');
echo $form->input('username', 'text', 'Username');
echo $form->input('email', 'email', 'Email');
echo $form->input('password', 'password');
echo $form->submit();
echo $form->close();

echo $form->open('/login', 'POST');
echo $form->input('username', 'text', 'Username');
echo $form->input('password', 'password');
echo $form->submit();
echo $form->close();
?>

<?php else : ?>

  <a href="/logout">Se déconnecter</a>

<?php endif; ?>
