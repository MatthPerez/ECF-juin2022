<?php
$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = '';
$active2 = '';
$active3 = 'active';
$active4 = '';
session_start();
$_SESSION = array();
session_destroy();
$connect = '';
$connect = 'Mon compte';
require '../back/head.php';
require '../back/nav.php';
session_start();
if (isset($_POST['submit'])) {
  if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $admin_username = 'admin';
    $admin_password = 'admin';
    $entered_username = htmlspecialchars($_POST['username']);
    $entered_password = htmlspecialchars($_POST['password']);

    // Administrateur
    if ($admin_username == $entered_username and $admin_password == $entered_password) {
      header('Location: ../admin.php');
    }

    // Gérant
    try {
      require '../back/bdd_variables.php';
      $bdd = new PDO('mysql:host=' . $dbhost . ';dbname=hypnos;charset=utf8', $bdd_username, $bdd_password);
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    $utilisateurs = $bdd->query('SELECT * FROM utilisateurs WHERE Status = "Gérant"');
    while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
      if ($utilisateur->Username == $entered_username and $utilisateur->Password == $entered_password) {
        $_SESSION['user'] = htmlspecialchars($_POST['username']);
        $_SESSION['branch'] = $utilisateur->Branch;
        header('Location: ../back/manager.php');
      }
    }

    // Client
    $clients = $bdd->query('SELECT * FROM utilisateurs WHERE Status = "Client"');
    while ($client = $clients->fetch(PDO::FETCH_OBJ)) {
      if ($client->Username == $entered_username and $client->Password == $entered_password) {
        $_SESSION['user'] = htmlspecialchars($_POST['username']);
        $_SESSION['mdp'] = htmlspecialchars($_POST['password']);
        header('Location: ../pages/reservations.php');
      }
    }
  } else {
    echo '<p class="central">Veuillez compléter tous les champs requis. ' . $_POST['username'] . $_POST['password'] . '</p>';
  }
}
?>

<body class="bg-cool">
  <h1 class="cent">Espace de connexion</h1>

  <section class="mt1em bg-blur central-small cent bordered">
    <h1>Se connecter</h1>
    <form method="post">
      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username" class="mb1em" required><br>
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" required class="mb1em"><br>
      <input type="submit" class="btn3" name="submit" id="submit">
    </form>
  </section>

  <section class="mt3em mb3em bg-blur central-small cent bordered">
    <h1 class="mt2em">Créer un compte</h1>
    <form action="post">
      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username" class="mb1em" required><br>
      <label for="mail">Courriel</label>
      <input type="mail" name="mail" id="mail" class="mb1em" required><br>
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" required class="mb1em"><br>
      <input type="submit" class="btn3" name="submit" id="submit">
    </form>
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