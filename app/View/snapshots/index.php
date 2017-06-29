<?php

echo "Snapshots.index";

foreach ($vars as $snap) {
  echo "<div>";
  echo $snap->description;
  echo "</div>";
  // var_dump($snap);
}

?>
