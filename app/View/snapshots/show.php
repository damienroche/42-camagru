<div class="singleSnapshot u-globalWrap">
  <article class="snapshot">
    <?php $snapshot = $vars['snapshot']; ?>
    <figure>
      <img src="/assets/images/snapshots/<?= $snapshot->img?>">
    </figure>
    <div class="sidePanel">
      <?= $snapshot->author ?>
      <?= $snapshot->description ?>

      <?php $comments = $vars['comments'] ?>
      <?php if ($comments) : ?>
        <div class="commentList">
          <?php foreach ($comments as $comment) : ?>
            <div class="comment">
              <div class="author"><?= $comment->username; ?></div>
              <div><?= $comment->content; ?></div>
              <?php if ($_SESSION['id'] == $comment->user_id) : ?>
                <span class="icon-trash"></span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </article>
</div>

