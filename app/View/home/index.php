<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots wrap">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article class="snapshot">
        <section class="authorCard">
          <span class="icon-user"></span>
          <a href="/users/<?= $snapshot->author; ?>"><?= $snapshot->author; ?></a>
        </section>
        <figure class="snapshotFigure">
          <a href="/snapshots/<?= $snapshot->id ?>">
            <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
          </a>
        </figure>
        <section class="actionSection">
          <span class="icon-heart"></span>
          <span class="icon-comment-square"></span>
        </section>
        <section class="commentSection">
          <div class="commentList">
            <?php if(isset($snapshot->description)) : ?>
              <div class="comment">
                <div class="author"><?= $snapshot->author; ?></div>
                <div><?= $snapshot->description; ?></div>
              </div>
            <?php endif; ?>
          </div>
          <?php if (isset($_SESSION['auth'])) : ?>
            <div class="commentForm">
            <?php
              $comment = new Core\Builder\Form;
              echo $comment->open('/comments/add', 'POST');
              echo $comment->label('content', $_SESSION['auth']);
              echo $comment->input('content', 'text', 'Add a comment...');
              echo $comment->hidden('token', hash('md5', $snapshot->id . 'im4g3_t00k3n#io'));
              echo $comment->submit();
              echo $comment->close();
            ?>
            </div>
          <?php endif; ?>
        </section>
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
