<?php $current = ($vars['user']->username == $_SESSION['auth']) ? true : false; ?>
<div class="u-globalWrap userPage">
  <h2><?= $vars['user']->username ?></h2>
  <p>
    <span><?= count($vars['snapshots']); ?> </span>
    <span class="icon-image"></span>
  </p>
  <?php if ($current) : ?>
    <a href="/profile/edit">Edit your profile</a>
  <?php endif; ?>


  <?php if (!$vars['snapshots']) : ?>
    <?php if ($current) : ?>
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
</div>
