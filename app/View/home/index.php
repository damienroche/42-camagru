<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots wrap">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article class="snapshot">
        <div class="snapshot-head">
          <section class="authorCard">
            <div class="avatar">
              <span class="icon-user"></span>
            </div>
            <a href="/users/<?= $snapshot->author; ?>"><?= $snapshot->author; ?></a>
          </section>
          <section class="snapshot-metas">
            <span><?= $snapshot->likes_count; ?> <?= ($snapshot->likes_count > 1) ? 'Likes' : 'Like' ; ?></span>
            <span><?= $snapshot->comments_count; ?> <?= ($snapshot->comments_count > 1) ? 'Comments' : 'Comment' ; ?></span>
          </section>
        </div>
        <figure class="snapshotFigure">
          <a href="/snapshots/<?= $snapshot->id ?>">
            <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
            <figcaption><?= $snapshot->description; ?></figcaption>
          </a>
        </figure>
        <?php if (isset($_SESSION['id'])) : ?>
          <span class="icon-heart js-like" data-snap="<?= $snapshot->id ?>" data-user="<?= $_SESSION['id']; ?>"></span>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
