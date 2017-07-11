<?php $current = false; ?>
<?php if (isset($_SESSION['auth'])) : ?>
<?php if ($vars['user']->username == $_SESSION['auth']) { $current = true; } ?>
<?php endif; ?>
<div class="u-globalWrap userPage">
  <h2><?= $vars['user']->username ?></h2>
  <?php if ($current) : ?>
    <a href="/profile/edit">
      <span class="icon-cog"></span>
    </a>
  <?php endif; ?>


  <?php if (!$vars['snapshots']) : ?>
    <?php if ($current) : ?>
      <p>Aucun selfie, vous pouvez en ajouter dès maintenant !</p>
    <?php else : ?>
      <p>Cet utilisateur n'a pas encore pris de selfie.</p>
    <?php endif; ?>
  <?php else : ?>
    <h3>
      <span>Collection</span>
      <span><?= count($vars['snapshots']); ?> </span>
      <span class="icon-image"></span>
    </h3>
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
  <h3>Likes</h3>
  <h3>Following</h3>
</div>
