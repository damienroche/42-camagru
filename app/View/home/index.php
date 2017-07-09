<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article>
        <div class="authorCard">
          <a href="/users/<?= $snapshot->author; ?>"><?= $snapshot->author; ?></a>
        </div>
        <div class="snapshotFigure">
          <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
        </div>
        <div class="commentSection">
          <div class="commentList"></div>
          <?php if (isset($_SESSION['auth'])) : ?>
            <div class="commentForm">
            <?php
              $comment = new Core\Builder\Form;
              echo $comment->open('/comments/add', 'POST');
              echo $comment->input('content', 'text', 'Add a comment...');
              echo $comment->hidden('token', hash('md5', $snapshot->id . 'im4g3_t00k3n#io'));
              echo $comment->submit();
              echo $comment->close();
            ?>
            </div>
          <?php endif; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
