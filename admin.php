<!DOCTYPE html>
<html lang="fr-FR" class="bg-black">

<?php
session_start();
$content = '';
$style = 'styles/style.css';
$title = 'Espace administrateur';
require 'back/head.php';
?>

<body class="bg-black">
  <h1 class="cent white-border-horizontal">
    <span class="f-white">Espace administrateur hôtel Hypnos -</span>
    <span><a href="back/logout.php" class="f-white">Se déconnecter</a></span>
  </h1>

  <!-- CREATION BDD -->
  <?php
  try {
    require_once 'back/bdd_variables.php';
    $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
  ?>

  <!-- COMPTES -->
  <section class="cent comfortaa mb2em">
    <?php
    $counters = $bdd->query('SELECT * FROM utilisateurs');
    $a = 0;
    foreach ($counters as $counter) {
      $a++;
    };
    ?>
    <h1 class="f-white cent mt2em white-border-horizontal"><?php echo $a ?> comptes utilisateurs</h1>
    <div class="center mb1em">
      <table>
        <thead>
          <td>Utilisateur</td>
          <td>Mot de passe</td>
          <td>Mail</td>
          <td>Statut</td>
          <td>Actions</td>
        </thead>
        <tbody>
          <?php
          // Suppression compte dans la BDD


          // Affichage comptes
          $utilisateurs = $bdd->query('SELECT * FROM utilisateurs ORDER BY Status');
          while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $utilisateur->Username ?></td>
              <td><?= $utilisateur->Password ?></td>
              <td><?= $utilisateur->Mail ?></td>
              <td><?= $utilisateur->Status ?></td>
              <td class="f-red cent">
                <?php
                if ($utilisateur->Status != 'Administrateur') {
                  echo 'Supprimer';
                } else {
                  echo '-';
                }
                ?>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="central-small cent bordered bg-cool">
      <h2>Ajouter un utilisateur</h2>
      <form action="back/add_user.php" method="POST">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="mb1em"><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="mb1em"><br>
        <label for="mail">Courriel</label>
        <input type="email" name="mail" id="mail" class="mb1em"><br>
        <label for="status">Statut</label>
        <input type="text" name="status" id="status" class="mb1em"><br>
        <label for="branch">Etablissement</label>
        <input type="text" name="branch" id="branch" class="mb1em" class="mb1em"><br>
        <input type="submit" class="btn3 mb1em">
      </form>
    </div>
  </section>

  <!-- ETABLISSEMENTS -->
  <section class="just central comfortaa mb2em">
    <?php
    $counters = $bdd->query('SELECT * FROM etablissements');
    $a = 0;
    foreach ($counters as $counter) {
      $a++;
    };
    ?>
    <h1 class="f-white cent mt2em white-border-horizontal"><?php echo $a ?> établissements</h1>
    <div class="center">
      <table class="mb1em">
        <thead>
          <td>Désignation</td>
          <td>Ville</td>
          <td>Gérant</td>
          <td>Action</td>
        </thead>
        <tbody>
          <?php
          // Suppression établissement dans la BDD


          // Affichage établissements
          $branches = $bdd->query('SELECT * FROM etablissements');
          while ($branch = $branches->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $branch->Branch ?></td>
              <td><?= $branch->Location ?></td>
              <td><?= $branch->Manager ?></td>
              <td class="f-red">Supprimer</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="central-small cent bordered bg-cool">
      <h2>Ajouter un établissement</h2>
      <form action="back/add_branch.php" method="POST">
        <label for="username">Nom d'établissement</label>
        <input type="text" name="branch" id="branch" class="mb1em"><br>
        <label for="location">Lieu</label>
        <input type="text" name="location" id="location" class="mb1em"><br>
        <label for="manager">Gérant</label>
        <input type="text" name="manager" id="manager" class="mb1em"><br>
        <label for="link">Lien image</label>
        <input type="url" name="link" id="link" class="mb1em"><br>
        <label for="comment">Commentaire</label>
        <input type="text" name="comment" id="comment" class="mb1em"><br>
        <input type="submit" class="btn3 mb1em">
      </form>
    </div>
  </section>

  <!-- SUITES -->
  <section class="just central comfortaa mb2em">
    <?php
    $counters = $bdd->query('SELECT * FROM suites');
    $a = 0;
    foreach ($counters as $counter) {
      $a++;
    };
    ?>
    <h1 class="f-white cent mt2em white-border-horizontal"><?php echo $a ?> suites</h1>
    <div class="center">
      <table class="mb1em">
        <thead>
          <td>Désignation</td>
          <td>Etablissement</td>
          <td>Price</td>
          <td colspan="2">Action</td>
        </thead>
        <tbody>
          <?php
          // Suppression suite dans la BDD


          // Affichage suites
          $suites = $bdd->query('SELECT * FROM suites ORDER BY Branch');
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $suite->Suite ?></td>
              <td><?= $suite->Branch ?></td>
              <td><?= $suite->Price ?> €/nuit</td>
              <td class="f-red">Supprimer</td>
              <td class="f-blue">Modifier</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="central-small cent bordered bg-cool">
      <h2>Ajouter une suite</h2>
      <form method="POST" action="add_suite.php">
        <label for="suite">Nom de la suite</label>
        <input type="text" name="suite" id="suite" class="mb1em" required><br>
        <label for="price">Prix de la nuit</label>
        <input type="number" name="price" id="price" class="mb1em" required><br>
        <input type="submit" name="add_suite" id="add_suite" class="btn3 mb1em">
      </form>
    </div>
  </section>

</body>

</html>