<?php
session_start();
$_SESSION = [];
unset($user, $branch, $connect);
$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = '';
$active2 = '';
$active3 = 'active';
$active4 = '';
$connect = '';
$connect = 'Mon compte';
$script = '';
require '../back/head.php';
require '../back/nav.php';
?>

<body class="bg-cool">
  <h1 class="cent">Espace de connexion</h1>

  <section class="mt1em bg-cool1 central-small cent bordered box-shadowed">
    <h1>Se connecter</h1>
    <form method="POST" action="connection.php">

      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username" class="mb1em ml0em centered" required><br>

      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" required class="mb1em ml0em centered"><br>

      <input type="submit" class="btn3" name="submit" id="submit" value="Se connecter">
    </form>
  </section>

  <section class="mt3em mb3em bg-cool1 central-small cent bordered box-shadowed">
    <h1 class="mt1em">Créer un compte client</h1>
    <form method="POST" action="connection.php">

      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username" class="mb1em ml0em centered" required><br>

      <label for="mail">Courriel</label><br>
      <input type="mail" name="mail" id="mail" class="mb1em ml0em centered" required><br>

      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" required class="mb1em ml0em centered"><br>

      <input type="submit" class="btn3" name="submit" id="submit" value="Créer">
    </form>
  </section>
</body>

<footer>
  <?php
  require '../back/icons.php';
  echo '
  <span>Groupe Hypnos &copy 2022</span>
  <span>-</span>
  <span class="mr1em">' . $facebook . '</span>
  <span class="mr1em">' . $instagram . '</span>
  <span class="mr1em">' . $twitter . '</span>
  <span>' . $youtube . '</span>
  ';
  ?>
</footer>