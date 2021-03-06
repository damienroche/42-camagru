<div class="u-globalWrap">
  <div id="filters">
    <div><img src="/assets/images/filters/hole.png"></div>
    <div><img src="/assets/images/filters/glasses.png"></div>
    <div><img src="/assets/images/filters/cat.png"></div>
    <div><img src="/assets/images/filters/valdemara.png"></div>
  </div>

  <div id="preview">
    <img src="http://placekitten.com/g/640/480" id="photo" alt="photo">
    <div class="filter">
      <img src="../assets/images/filters/cat.png" id="filter">
    </div>
    <video id="video"></video>
  </div>
  <button id="take">Prendre une photo</button>
  <button id="undo" disabled>Refaire</button>
  <!-- <button id="send" disabled>Envoyer</button> -->
  <canvas id="canvas"></canvas>

  <?php
  $form = new Core\Builder\Form($_POST);
  echo $form->open('/snapshots/create', 'POST');
  echo $form->input('description');
  echo $form->hidden('base64', '', 'output');
  echo $form->submit('Envoyer', 'send');
  echo $form->close();
  ?>
</div>
