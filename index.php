<!DOCTYPE html>
<html lang="fr-FR">


<?php
$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = 'styles/style.css';
$pages = 'pages/';
$level = '';
$active1 = '';
$active2 = '';
$active3 = '';
$active4 = '';
session_start();
if (isset($_SESSION['user'])) {
  $connect = $_SESSION['user'] . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
}
require 'back/head.php';
?>

<body>
  <?php
  require 'back/nav.php';
  header('Location: pages/reservations.php');
  ?>
  <h1 class="just central comfortaa">Ceci est un site test pour l'ECF d'avril 2022.</h1>
  <p class="just central comfortaa">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, commodi? Praesentium, delectus vero consequuntur natus beatae laudantium quidem saepe cupiditate mollitia quo itaque optio quisquam porro veniam odit sapiente! Sit est debitis vitae molestias dignissimos itaque nihil necessitatibus ratione quibusdam quo. Velit in odit expedita quisquam. Exercitationem neque dicta sint?</p>
</body>

</html>