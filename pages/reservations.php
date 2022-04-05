<?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = 'active';
$active2 = '';
$active3 = '';
session_start();
if (isset($_SESSION['user'])) {
  $connect = $_SESSION['user'] . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
}
require '../back/head.php';
require '../back/nav.php';
?>

<body>
  <section class="banner w90 ml5 mb1em">
    <div class="relative">
      <div class="bg h30 absolute z1"></div>
      <div><img src="../pictures/banner_zen.jpg" alt="banner_zen" class=""></div>
    </div>
    <span class="absolute top10em f-white z2 ls2">Hôtels Hypnos</span>
    <span class="absolute top4em f-white f3em z2 ls6 neutra">LA RECETTE DU BONHEUR</span>
  </section>

  <section class="flex-title cent m3em border-horizontal">
    <span><img src="../pictures/icons/left.png" alt="left" class="img"></span>
    <span class="mh10px">
      <?php if(isset($_SESSION ['user'])) {
        echo '<h1 class="quicksand f-purple f2rem bold">Bienvenue ' . $_SESSION['user'] . ' !</h1>
        <h2 class="quicksand">Prenez le temps de parcourir nos plus belles destinations en France métropolitaine</h1>';
      } else {
        echo '<h1 class="quicksand">Prenez le temps de parcourir nos plus belles destinations en France métropolitaine</h1>';
      } ?>
    </span>
    <span><img src="../pictures/icons/right.png" alt="right" class="img"></span>
  </section>

  <section class="section">
    <?php
    require '../back/destinations.php';
    foreach ($destinations as $destination) {
    ?>
      <span class="flex-box">
        <img src="<?php echo $destination['link'] ?>" alt="image" class="absolute">
        <h3 class="absolute f-white top3em"><?php echo $destination['name'] ?></h3>
        <div class="absolute f-white top7em"><?php echo $destination['location'] ?></div>
        <div class="absolute f-white top10em"><button class="btn2">Réserver</button></div>
      </span>
    <?php
    };
    ?>
  </section>

</body>

<footer>
  <?php
  require '../back/icons.php';
  echo '
  <span>Groupe Hypnos &copy 2022</span>
  <span>-</span>
  <span>' . $facebook . '</span>
  <span>' . $instagram . '</span>
  <span>' . $twitter . '</span>
  <span>' . $youtube . '</span>
  ';
  ?>
</footer>