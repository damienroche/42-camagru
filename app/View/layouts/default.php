<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Lato" rel="stylesheet">
  <link href="/assets/styles/main.css" rel="stylesheet">
</head>
<body class="">

  <header>
    <div class="headerInner">
      <a href="/" class="u-camagruFont logo" title="Back to Home">camagru</a>
      <?php if (!isset($_SESSION['auth'])): ?>
        <div class="u-flex1"></div>
        <nav>
          <a href="/login" title="Login">
            <span class="icon-unlock"></span>
          </a>
          <a href="/signup" title="Signup">
            <span class="icon-user-plus"></span>
          </a>
        </nav>
      <?php else : ?>
        <div class="goPhotobooth u-flex1 u-textCentered">
          <a href="/snapshots/add" title="Take a snapshot !">
            <span class="icon-camera"></span>
          </a>
        </div>
        <nav>
          <a href="/users/<?= $_SESSION['auth'] ?>" class="me" title="<?= $_SESSION['auth'] ?>">
            <span class="icon-user"></span>
          </a>
          <a href="/logout" class="switchOff" title="Logout">
            <span class="icon-toggle-left"></span>
            <span class="icon-toggle-right"></span>
          </a>
        </nav>
      <?php endif; ?>
    </div>
  </header>
  <main>
    <!-- <?php var_dump($_SESSION); ?> -->
    <!-- <?php var_dump($_SERVER); ?> -->
    <?= $content ?>
  </main>

</body>
<script type="text/javascript" src="/assets/javascripts/main.js"></script>
</html>
