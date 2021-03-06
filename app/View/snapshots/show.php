<?php $current = false; ?>
<?php if (isset($_SESSION['auth'])) : ?>
<?php if ($vars['snapshot']->author == $_SESSION['auth']) { $current = true; } ?>
<?php endif; ?>

<div class="singleSnapshot u-globalWrap">
  <article class="snapshot">
    <?php $snapshot = $vars['snapshot']; ?>
    <figure>
      <img src="/assets/images/snapshots/<?= $snapshot->img?>">
    </figure>
    <div class="sidePanel">
      <?= $snapshot->author ?>
      <?= $snapshot->description ?>
      <?php if ($current) : ?>
        <div class="snapshot-controls">
          <span class="icon-more"></span>
          <ul>
            <form method="POST" action="/snapshots/delete">
              <input type="hidden" name="token" value="<?= $snapshot->token; ?>">
              <input type="hidden" name="id" value="<?= $snapshot->id; ?>">
              <input type="submit" value="Supprimer">
            </form>
          </ul>
        </div>
      <?php endif; ?>

      <?php $comments = $vars['comments'] ?>
      <?php if ($comments) : ?>
        <div class="commentList">
          <?php foreach ($comments as $comment) : ?>
            <div class="comment">
              <div class="author"><?= $comment->username; ?></div>
              <div><?= $comment->content; ?></div>
              <?php if (isset($_SESSION['id'])) : ?>
                <?php if ($_SESSION['id'] == $comment->user_id) : ?>
                  <span class="icon-trash"></span>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <!-- <section class="commentSection">
          <div class="commentList">
            <?php if(isset($snapshot->description)) : ?>
              <div class="comment">
                <div class="author"><?= $snapshot->author; ?></div>
                <div>
                  <a href="/snapshots/<?= $snapshot->id ?>"</a>
                </div>
              </div>
            <?php endif; ?>
          </div>

        </section> -->
      <?php if (isset($_SESSION['auth'])) : ?>
          <div class="commentForm">
          <?php
            $comment = new Core\Builder\Form;
            echo $comment->open('/comments/add', 'POST');
            echo $comment->input('content', 'text', 'Add a comment...');
            echo $comment->hidden('token', hash('md5', strtotime($snapshot->created_date) . 'im4g3_t00k3n#io'));
            echo $comment->submit();
            echo $comment->close();
          ?>
          </div>
        <?php endif; ?>
    </div>
  </article>
</div>

