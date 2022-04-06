<!DOCTYPE html>
<html lang="fr">


<?php
session_start();
$content = '';
$title = 'Espace gérant';
$style = '../styles/style.css';
require 'head.php';
?>

<body class="">
  <h1 class="cent border-horizontal">
    <span>Espace gestion des établissements Hypnos -</span>
    <span><a href="logout.php">Se déconnecter</a></span>
  </h1>

  <!-- CREATION BDD -->
  <?php
  try {
    require_once 'bdd_variables.php';
    $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
  ?>

  <!-- SUITES -->
  <section class="just central comfortaa mb2em">
    <p class="just">Bienvenue dans votre espace <strong><?= $_SESSION['user'] ?></strong>. Ici, vous pouvez gérer votre établissement et ses suites (ajout, modification ou suppression). Vous pouvez aussi consulter les dates de réservation en cours.</p>
    <?php
    $a = 0;
    $suites = $bdd->query('SELECT * FROM suites');
    while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
      if ($suite->Branch == $_SESSION['branch']) {
        $a++;
      }
    }
    ?>
    <h1 class="cent mt2em border-horizontal">Mes <?php echo $a ?> suites</h1>
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
            if ($suite->Branch == $_SESSION['branch']) {
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

  <section class="cent mb4em">
    <fieldset class="central-small">
      <legend class="bold f-green">Ajouter une suite</legend>
      <form method="POST" action="add_suite.php">
        <label for="suite">Nom de la suite</label>
        <input type="text" name="suite" id="suite" class="mb1em" required><br>
        <label for="price">Prix de la nuit</label>
        <input type="number" name="price" id="price" class="mb1em" required><br>
        <input type="submit" name="add_suite" id="add_suite" class="btn3">
      </form>
    </fieldset>
  </section>

  <section class="cent mb4em">
    <fieldset class="central-small">
      <legend class="bold f-red">Supprimer une suite</legend>
      <form method="POST" action="del_suite.php">
        <label for="suite">Choix de la suite</label>
        <select name="suite_name" id="suite_name" class="mb1em" required>
          <?php
          $suites = $bdd->query('SELECT * FROM suites');
          $a = 0;
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
            $a++;
            if ($suite->Branch == $_SESSION['branch']) {
              echo '<option value="' . $a . '">' . $suite->Suite . '</option>
          ';
            }
          }
          ?>
        </select><br>
        <input type="submit" name="del_suite" id="del_suite" class="btn3">
      </form>
    </fieldset>
  </section>

  <section class="cent mb10em">
    <fieldset class="central-small">
      <legend class="bold f-blue">Mettre à jour une suite</legend>
      <form method="POST" action="update_suite.php">
        <label for="suite_selection">Choix de la suite</label>
        <select name="old_suite" id="old_suite" class="mb1em" required>
          <?php
          $suites = $bdd->query('SELECT * FROM suites');
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
            if ($suite->Branch == $_SESSION['branch']) {
              echo '<option value="' . $suite->Suite . '">' . $suite->Suite . '</option>
          ';
            }
          }
          ?>
        </select><br>
        <label for="name">Nouveau nom de la suite</label>
        <input type="text" name="new_suite" id="new_suite" class="mb1em" required><br>
        <label for="price">Nouveau prix</label>
        <input type="number" name="price" id="price" class="mb1em" required><br>
        <input type="submit" name="update_suite" id="update_suite" class="btn3">
      </form>
    </fieldset>
  </section>
</body>

</html>