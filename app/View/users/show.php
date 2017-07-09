<?php if (!$vars['snapshots']) : ?>
  <?php if ($vars['user']->username == $_SESSION['auth']) : ?>
    <p>Aucun selfie, vous pouvez en ajouter dès maintenant !</p>
  <?php else : ?>
    <p>Cet utilisateur n'a pas encore pris de selfie.</p>
  <?php endif; ?>
<?php else : ?>
  <?php foreach ($vars['snapshots'] as $snapshot) : ?>
    <?= $snapshot->description ?>
  <?php endforeach; ?>
<?php endif; ?>
