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
$script = '';
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
      <div><img src="../pictures/banner_zen.jpg" alt="banner_zen" class="reduce"></div>
    </div>
    <span class="absolute top10em f-white z2 ls2 font-reduce">Hôtels Hypnos</span>
    <span class="absolute top4em f-white z2 f3em ls6 neutra hide">LA RECETTE DU BONHEUR</span>
  </section>

  <section class="flex-title border-horizontal">
    <span><img src="../pictures/icons/left.png" alt="left" class="img"></span>
    <span class="mh10px">
      <?php if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo '<h1 class="quicksand f-purple f2rem bold centered">Bienvenue ' . $user . ' !</h1>
        <h2 class="quicksand">Prenez le temps de parcourir nos plus belles destinations en France métropolitaine</h2>';
      } else {
        echo '<h2 class="quicksand centered">Prenez le temps de parcourir nos plus belles destinations en France métropolitaine</h2>';
      } ?>
    </span>
    <span><img src="../pictures/icons/right.png" alt="right" class="img"></span>
  </section>

  <section class="section mb1em">
    <?php
    try {
      require_once '../back/bdd_variables.php';
      $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
    } catch (Exception $e) {
      // die('Erreur : ' . $e->getMessage());
      echo 'Impossible de se connecter à la base de données';
    }

    require '../back/bdd_variables.php';
    $etablissements = $bdd->query('SELECT * FROM etablissements ORDER BY id');
    while ($etablissement = $etablissements->fetch(PDO::FETCH_OBJ)) {
      if ($etablissement->Branch != 'admin') {
    ?>
        <span class="flex-box">
          <img src="<?php echo $etablissement->Link ?>" alt="image" class="absolute">
          <h3 class="absolute f-white"><?php echo $etablissement->Branch ?></h3>
          <div class="absolute f-white"><?php echo $etablissement->Location ?></div>
          <form method="POST" action="branches.php" class="absolute f-white top10em">
            <input type="text" name="branch" id="branch" value="<?php echo $etablissement->Branch ?>" class="invisible">
            <input type="text" name="location" id="location" value="<?php echo $etablissement->Location ?>" class="invisible">
            <input type="submit" class="btn2 cent" value="Visiter">
          </form>
        </span>
    <?php
      }
    }
    ?>
  </section>

  <section class="central just mb1em">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid facere reiciendis id? Quas illum animi qui quis commodi ipsum neque maxime quasi tempore officiis beatae suscipit facere explicabo quae iste ipsam quidem nam dicta, eaque inventore doloremque quaerat natus rerum? Eveniet sequi sit deleniti repellat quo? Nihil expedita libero obcaecati.
  </section>

  <section class="central just mb1em">
    Consulter les <a href="mentions.php" target="_blank">mentions légales</a>.
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