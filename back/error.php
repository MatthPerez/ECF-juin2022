<!DOCTYPE html>
<html lang="fr-FR" class="bg-white">

<?php
$content = '';
$style = '../styles/style.css';
$title = 'Erreur';
require 'head.php';
if ($_POST['submit'] == 'Se connecter') {
  $site_message = "Il y a une erreur dans l'identifiant ou le mot de passe.";
} else {
  if (isset($_POST)) {
    $site_message = $_POST['Suite réservée'];
  } else {
    $site_message = "Le courriel renseigné existe déjà dans la base de données.";
  }
}
var_dump($_POST);
?>

<body class="bg-grad-light-blue">
  <div class="mt15 centered quicksand">
    <img src="../pictures/icons/Hypnos.png" alt="hypnos-icon" class="h200px">
    <h1 class="centered f3rem">Erreur de saisie</h1>
    <p class="centered f-black bold"><?php echo $site_message ?></p>
    <?php
    if (isset($_POST)) {
      echo '<p>
      Voici ce que vous avez saisi : ' . $_POST['username'] . ' - ' . $_POST['password'] . '
      </p>';
    }
    ?>
    <p class="centered f-black bold">
      <?php
      // var_dump($_POST);
      // var_dump($_SESSION);
      ?>
    </p>
    <p class="centered f-bold"><a href="../pages/connect.php" class="pointer f-red bold">Pour retourner à la page de création de compte, veuillez cliquer sur cette ligne.</a></p>
  </div>
</body>

</html>