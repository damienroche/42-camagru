<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article>
       <?= $snapshot->author; ?>
       <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
