<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Lato" rel="stylesheet">
  <link href="/assets/styles/main.css" rel="stylesheet">
</head>
<body>

  <header>
    <a href="/" class="logo">camagru</a>
    <?php if (!isset($_SESSION['auth'])): ?>
      <a href="/login">Login</a>
      <a href="/signup">Signup</a>
    <?php else : ?>
      <a href="/users/<?= $_SESSION['auth'] ?>"><?= $_SESSION['auth'] ?></a>
      <a href="/logout">Logout</a>
    <?php endif; ?>
  </header>
  <main>
    <!-- <?php var_dump($_SESSION); ?>
    <?php var_dump($_SERVER); ?> -->
    <?= $content ?>
  </main>

</body>
</html>
