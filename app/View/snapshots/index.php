<?php

echo "Snapshots.index";
?>

<?php foreach ($vars as $snap) : ?>
  <div>
    <a href="/snapshots/<?= $snap->id ?>">
      <p><?= $snap->description ?></p>
    </a>
  </div>
<?php endforeach; ?>
