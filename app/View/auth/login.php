<div class="u-globalWrap">
  <h2>Login</h2>
  <?php
  $form = new Core\Builder\Form($_POST);
  echo $form->open('/login', 'POST', 'authForms');
  echo $form->input('username', 'text', 'Username');
  echo $form->input('password', 'password');
  echo $form->submit();
  echo $form->close();
  ?>

  <a href="/recover">Lost password ?</a>
</div>
