<?php

$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Suites Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = 'active';
$active2 = '';
$active3 = '';
$script='<script src="../js/reserved.js" defer></script>';
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

<h1 class="border-horizontal centered pv1em mb2em">
  <span><img src="../pictures/icons/left2.png" alt="left2"></span>
  <span>Suite "<?php echo $_POST['suite'] ?>"</span>
  <span><img src="../pictures/icons/right2.png" alt="right2"></span>
</h1>
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
  if ($suite->Suite == $_POST['suite']) {
?>
    <div class="central mb4em pv1em">
      <div class="centered f-larger1 mb1em bold">La suite peut accueillir jusqu'à <?php echo $suite->Persons ?> personnes. Le prix est fixé à <?php echo $suite->Price ?> € la nuit.</div>
      <div class="just central f-larger1 mb1em">Toutes nos suites bénéficient du wifi gratuit et illimité. L'accueil des visiteurs se fait dans le plus grand respect des règles sanitaires pour le confort et la tranquillité de tous.</div>

      <div><img src="<?php echo $suite->Link ?>" alt="suite" class="central mb1em rounded20"></div>

      <div class="just central f-larger1 mb1em">Toutes les réservations peuvent être annulées sans frais jusqu'à une semaine avant le jour prévu d'arrivée. Nous faisons tout notre possible pour vous offrir des conditions de séjour optimales et vous garantir une satisfaction maximum.</div>
      <div class="just central f-larger1 mb2em">Lorem idivsum dolor sit amet consectetur adipisicing elit. Nemo vel deleniti illo? Quos nulla laboriosam ratione nemo, culpa eligendi facilis? Consectetur, sunt est qui illum magni iure expedita atque autem ducimus! Blanditiis, ipsam hic maxime quos vitae corrupti sunt quia totam nostrum delectus voluptates dolorum non exercitationem, facere ipsum repellat!</div>

      <div class="centered">
        <button class="btn3" id="reserve">Réserver</button>
      </div>
      <script>
        
      </script>
    </div>
<?php
  };
}
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