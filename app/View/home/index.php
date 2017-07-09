<?php if($vars['snapshots']) : ?>
  <div class="homeSnapshots">
    <?php foreach ($vars['snapshots'] as $snapshot) : ?>
      <article>
       <?= $snapshot->author; ?>
       <img src="/assets/images/snapshots/<?= $snapshot->img ?>">
        <?php
          if (isset($_SESSION['auth'])) {
            $comment = new Core\Builder\Form;
            echo $comment->open('/comments/add', 'POST');
            echo $comment->input('content', 'text', 'Add a comment...');
            echo $comment->hidden('token', hash('md5', $snapshot->id . 'im4g3_t00k3n#io'));
            echo $comment->submit();
            echo $comment->close();
          }
        ?>
      </article>
    <?php endforeach; ?>
  </div
<?php else : ?>
<?php endif; ?>
