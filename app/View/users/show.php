<h2><?= $vars['user']->username ?></h2>

<?= count($vars['snapshots']); ?> publications

<?php if (!$vars['snapshots']) : ?>
  <?php if ($vars['user']->username == $_SESSION['auth']) : ?>
    <p>Aucun selfie, vous pouvez en ajouter dès maintenant !</p>
  <?php else : ?>
    <p>Cet utilisateur n'a pas encore pris de selfie.</p>
  <?php endif; ?>
<?php else : ?>
  <div class="userSnapshots">
  <?php foreach ($vars['snapshots'] as $snapshot) : ?>
    <article>
      <a href="/snapshots/<?= $snapshot->id ?>">
        <img src="/assets/images/snapshots/<?= $snapshot->img; ?>">
      </a>
    </article>
  <?php endforeach; ?>
  </div>
<?php endif; ?>
