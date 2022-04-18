<?php

$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Suites Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = 'active';
$active2 = '';
$active3 = '';
$script='';
session_start();
if (isset($_SESSION['user'])) {
  $connect = $_SESSION['user'] . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
  header('Location: connect.php');
}
require '../back/head.php';
require '../back/nav.php';
?>
<h1 class="border-horizontal cent pv1em mb2em"><?php echo $_POST['branch'] . ' (' . $_POST['location'] . ')' ?></h1>
<?php
try {
  require_once '../back/bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  // die('Erreur : ' . $e->getMessage());
  echo 'Impossible de se connecter à la base de données';
}

require '../back/bdd_variables.php';
$suites = $bdd->query('SELECT * FROM suites ORDER BY id');
while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
  if ($suite->Branch == $_POST['branch']) {
?>
    <div class="central-small mb4em round-bordered pv1em">
      <h2 class="cent">Suite "<?php echo $suite->Suite ?>"</h2>
      <div><img src="<?php echo $suite->Link ?>" alt="suite" class="central mb1em rounded20"></div>
      <div class="just mb1em central">Lorem idivsum dolor sit amet consectetur adipisicing elit. Nemo vel deleniti illo? Quos nulla laboriosam ratione nemo, culpa eligendi facilis? Consectetur, sunt est qui illum magni iure expedita atque autem ducimus! Blanditiis, ipsam hic maxime quos vitae corrupti sunt quia totam nostrum delectus voluptates dolorum non exercitationem, facere ipsum repellat!</div>
      <div class="cent f-larger"><?php echo $suite->Persons ?> personnes maximum</div>
      <div class="cent mb1em f-larger"><?php echo $suite->Price ?> €/nuit</div>
      <div class="cent mb1em">
        <form method="POST" action="suites.php">
          <input type="text" name="suite" id="suite" value="<?php echo $suite->Suite ?>" class="invisible">
          <input type="submit" class="btn3 cent" value="Vérifier la disponibilité">
        </form>
      </div>
    </div>
<?php
  };
}
?>

<?php

?>

<body>

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