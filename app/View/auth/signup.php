<div class="u-globalWrap">
  <h2>Register</h2>
  <?php

  $form = new Core\Builder\Form($_POST);
  echo $form->open('/users/create', 'POST');
  echo $form->input('username', 'text', 'Username');
  echo $form->input('email', 'email', 'Email');
  echo $form->input('password', 'password');
  echo $form->submit();
  echo $form->close();

  ?>

</div>

