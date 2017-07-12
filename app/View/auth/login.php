<div class="u-globalWrap">
  <h2>Login</h2>
  <?php
  $form = new Core\Builder\Form($_POST);
  echo $form->open('/login', 'POST', 'authForms');
  echo "<label for='email' class='required'><span class='icon-user'></span>";
  echo $form->input('username', 'text', 'Username');
  echo "</label>";
  echo "<label for='password' class='required'><span class='icon-unlock'></span>";
  echo $form->input('password', 'password', 'Password');
  echo "</label>";
  echo $form->submit();
  echo "<a href='/recover'>Lost password ?</a>";
  echo $form->close();
  ?>

</div>
