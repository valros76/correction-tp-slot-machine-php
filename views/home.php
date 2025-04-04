<?php
$mainTitle = "Accueil - MàS";
$pageTitle = "Accueil";
ob_start();
?>
<section class="main-sections container">
  <h1 class="main-sections-title">
    Jouez dès maintenant !
  </h1>

  <article class="slot-machine">
    <div class="reel" id="reel1">🍒</div>
    <div class="reel" id="reel2">🍒</div>
    <div class="reel" id="reel3">🍒</div>
  </article>
  <p id="result">Lancez les rouleaux</p>
  <button id="spinButton">
    Jouer
  </button>
</section>
<?php
$mainContent = ob_get_clean();
$slotScriptModificationTime = filemtime("sources/js/slot.js");
if (!isset($addScripts)) {
  $addScripts = null;
}
$addScripts .= "<script src='/sources/js/slot.js?v={$slotScriptModificationTime}'></script>";
