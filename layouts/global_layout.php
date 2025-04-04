<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $mainTitle ?? "Machine à sous" ?></title>
  <link rel="icon" href="https://webdevoo.com/assets/logo/logo-comete-webdevoo-green-2023-rounded-256x256.ico?v=0.0.3">
  <link rel="stylesheet" href="/sources/css/slot.css?v=<?= filemtime("sources/css/slot.css")?>">
</head>
<body>
  <header class="main-head">
    <h1 class="main-head-title">
      <?= $pageTitle ?? "MàS" ?>
    </h1>
  </header>

  <main class="main-content">
    <?= $mainContent ?? throw new Exception("Erreur 404 : Le contenu demandé n'existe pas.") ?>
  </main>

  <footer class="main-foot">
    <p class="copyright">
      © Webdevoo - 2025
    </p>
  </footer>

  <?= $addScripts ?? null ?>
</body>
</html>