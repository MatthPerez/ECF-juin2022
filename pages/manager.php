<!DOCTYPE html>
<html lang="fr">


<?php
session_start();
$content = '';
$title = 'Espace gérant';
$style = '../styles/style.css';
require '../back/head.php';
if (!isset($_SESSION['branch'])) {
  header('Location: reservations.php');
} else {
  $user = $_SESSION['user'];
  $branch = $_SESSION['branch'];
}
?>

<body>
  <h1 class="cent border-horizontal">
    <span class="f3rem">Espace gestion des établissements Hypnos</span>
    <span><a href="../back/logout.php">Se déconnecter</a></span>
  </h1>

  <!-- CREATION BDD -->
  <?php
  try {
    require_once '../back/bdd_variables.php';
    $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
  ?>

  <!-- SUITES -->
  <section class="just central comfortaa mb2em">
    <p class="just">Bienvenue dans votre espace <strong><?= $user ?></strong>. Ici, vous pouvez gérer votre établissement et ses suites (ajout, modification ou suppression). Vous pouvez aussi consulter les dates de réservation en cours.</p>
    <?php
    $a = 0;
    $suites = $bdd->query('SELECT * FROM suites');
    while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
      if ($suite->Branch == $branch) {
        $a++;
      }
    }
    ?>
    <h1 class="cent pv1em mt2em border-horizontal">Mes <?php echo $a ?> suites</h1>
    <div class="center">
      <table>
        <thead>
          <td>Désignation</td>
          <td>Prix</td>
          <td>Action</td>
        </thead>
        <tbody>
          <?php
          // Suppression suite dans la BDD


          // Affichage suites
          $suites = $bdd->query('SELECT * FROM suites');
          $utilisateurs = $bdd->query('SELECT * FROM utilisateurs');
          $utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ);

          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
            if ($suite->Branch == $branch) {
          ?>
              <tr>
                <td><?= $suite->Branch . ' - ' . $suite->Suite ?></td>
                <td><?= $suite->Price ?> €/nuit</td>
                <td class="f-green">Consulter</td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Ajout d'une suite -->
  <section class="cent mb4em">
    <fieldset class="central-small1">
      <legend class="bold f2rem f-green">Ajouter une suite</legend>
      <form method="POST" action="../back/add_suite.php">

        <label for="suite">Nom de la suite</label><br>
        <input type="text" name="suite" id="suite" class="mb1em ml0em centered" required><br>

        <label for="persons">Accueil (nombre de personnes)</label><br>
        <input type="int" name="persons" id="persons" class="mb1em ml0em centered" required><br>

        <label for="link">Lien image</label><br>
        <input type="url" name="link" id="link" class="mb1em ml0em centered" required><br>

        <label for="price">Prix de la nuit</label><br>
        <input type="int" name="price" id="price" class="mb1em ml0em centered" required><br>

        <input type="submit" name="add_suite" id="add_suite" class="btn3">
      </form>
    </fieldset>
  </section>

  <!-- Modification d'une suite -->
  <section class="cent mb4em">
    <fieldset class="central-small1">
      <legend class="bold f2rem f-blue">Mettre à jour une suite</legend>
      <form method="POST" action="../back/update_suite.php">
        <label for="suite_selection">Choix de la suite</label><br>
        <select name="old_suite" id="old_suite" class="mb1em centered ml0em centered" required>
          <?php
          $suites = $bdd->query('SELECT * FROM suites');
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
            if ($suite->Branch == $branch) {
              echo '<option value="' . $suite->Suite . '">' . $suite->Suite . '</option>
          ';
            }
          }
          ?>
        </select><br>
        <label for="name">Nouveau nom de la suite</label><br>
        <input type="text" name="new_suite" id="new_suite" class="mb1em ml0em centered" required><br>

        <label for="persons">Accueil</label><br>
        <input type="int" name="persons" id="persons" class="mb1em ml0em centered" required><br>

        <label for="link">Lien image</label><br>
        <input type="url" name="link" id="link" class="mb1em ml0em centered" required><br>

        <label for="price">Nouveau prix</label><br>
        <input type="int" name="price" id="price" class="mb1em ml0em centered" required><br>

        <input type="submit" name="update_suite" id="update_suite" value="Confirmer" class="btn3">
      </form>
    </fieldset>
  </section>

  <!-- Suppression d'une suite -->
  <section class="cent mb10em">
    <fieldset class="central-small1">
      <legend class="bold f2rem f-red">Supprimer une suite</legend>
      <form method="POST" action="../back/del_suite.php">
        <label for="suite">Choix de la suite</label><br>
        <select name="suite_name" id="suite_name" class="mb1em centered ml0em centered" required>
          <?php
          $suites = $bdd->query('SELECT * FROM suites');
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
            if ($suite->Branch == $branch) {
              echo '<option value="' . $suite->Suite . '">' . $suite->Suite . '</option>
          ';
            }
          }
          ?>
        </select><br>
        <input type="submit" name="del_suite" id="del_suite" class="btn3 centered">
      </form>
    </fieldset>
  </section>
</body>

</html>