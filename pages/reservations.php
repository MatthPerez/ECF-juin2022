<?php
$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = 'active';
$active2 = '';
$active3 = '';
$active4 = '';
require '../back/head.php';
require '../back/nav.php';
?>

<body>

  <section class="banner w90 ml5">
    <div class="relative">
      <div class="bg h30 absolute z1"></div>
      <div><img src="../pictures/banner_zen.jpg" alt="banner_zen" class=""></div>
    </div>
    <span class="absolute top10em f-white z2 ls2">Hôtels Hypnos</span>
    <span class="absolute top4em f-white f3em z2 ls6">La recette du bonheur</span>
  </section>

  <section class="central">
    <h1 class="cent">Nos établissements</h1>
    <?php
      require '../back/destinations.php';
      foreach($destinations as $destination) {
        ?>
        <span><img src="<?php echo $destinations[link] ?>" alt=""></span>
        <span><?php echo $destinations[name] ?></span>
        <span><?php echo $destinations[link] ?></span>
        <span><?php echo $destinations[link] ?></span>
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