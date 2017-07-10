<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots wrap">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article class="snapshot">
        <section class="authorCard">
          <div class="avatar">
            <span class="icon-user"></span>
          </div>
          <a href="/users/<?= $snapshot->author; ?>"><?= $snapshot->author; ?></a>
        </section>
        <figure class="snapshotFigure">
          <a href="/snapshots/<?= $snapshot->id ?>">
            <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
          </a>
        </figure>
        <section class="actionSection">
          <div class="actions">
            <span class="icon-heart"></span>
            <span class="icon-comment-square"></span>
          </div>
          <div>
            <span><?= $snapshot->likes_count; ?> <?= ($snapshot->likes_count > 1) ? 'Likes' : 'Like' ; ?></span>
            <span><?= $snapshot->comments_count; ?> <?= ($snapshot->comments_count > 1) ? 'Comments' : 'Comment' ; ?></span>
          </div>

        </section>
        <section class="commentSection">
          <div class="commentList">
            <?php if(isset($snapshot->description)) : ?>
              <div class="comment">
                <div class="author"><?= $snapshot->author; ?></div>
                <div>
                  <a href="/snapshots/<?= $snapshot->id ?>"><?= $snapshot->description; ?></a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!-- <?php if (isset($_SESSION['auth'])) : ?>
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
          <?php endif; ?> -->
        </section>
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
