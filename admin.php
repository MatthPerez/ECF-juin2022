<!DOCTYPE html>
<html lang="fr-FR" class="bg-black">

<?php
session_start();
$content = '';
$style = 'styles/style.css';
$title = 'Espace administrateur';
require 'back/head.php';
?>

<body class="bg-black mb5em">
  <h1 class="cent white-border-horizontal">
    <span><img src="pictures/icons/up-inv.png" alt="icon-up" class="h2em"></span>
    <span class="f-white f3rem">Espace administrateur hôtel Hypnos</span>
    <span><a href="back/logout.php" class="f-white">Se déconnecter</a></span>
    <span><img src="pictures/icons/bottom-inv.png" alt="icon-bottom" class="h2em"></span>
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
  <section class="just central comfortaa mb2em">
    <?php
    $counters = $bdd->query('SELECT * FROM utilisateurs');
    $a = 0;
    foreach ($counters as $counter) {
      $a++;
    };
    ?>
    <h1 class="f-white centered mt2em white-border-horizontal"><img src="pictures/icons/left-inv.png" alt="icon-left">
      <?php echo $a ?> comptes utilisateurs<img src="pictures/icons/right-inv.png" alt="icon-right-inv">
    </h1>

    <div class="inline mb2em">
      <div>
        <h2>Ajouter</h2>
        <form action="back/add_user_admin.php" method="POST">

          <label for="username">Nom d'utilisateur</label><br>
          <input type="text" name="username" id="username" class="mb1em cent" required><br>
          <label for="password">Mot de passe</label><br>

          <input type="text" name="password" id="password" class="mb1em cent" required><br>
          <label for="mail">Courriel</label><br>

          <input type="email" name="mail" id="mail" class="mb1em cent" required><br>
          <label for="status">Statut</label><br>

          <select name="status" id="status" class="mb2em centered ml0em" required>
            <option value="Client">Client</option>
            <option value="Gérant">Gérant</option>
          </select><br>

          <label for="branch">Etablissement</label><br>
          <input type="text" name="branch" id="branch" class="mb1em cent" class="mb1em"><br>

          <input type="submit" class="mb1em cent btn3" value="Confirmer">
        </form>
      </div>

      <div>
        <h2>Modifier</h2>
        <form method="POST" action="back/update_user_admin.php">
          <label for="old_user">Nom d'utilisateur</label><br>
          <select name="old_user" id="old_user" class="mb2em centered ml0em" required>
            <?php
            $utilisateurs = $bdd->query('SELECT * FROM utilisateurs ORDER BY Status');
            while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
              if ($utilisateur->Username != 'admin') {
                echo '<option value="' . $utilisateur->Username . '">' . $utilisateur->Username . '</option>
                ';
              }
            }
            ?>
          </select><br>

          <label for="username">Nouveau nom d'utilisateur</label>
          <input type="text" name="new_username" id="new_username" class="mb1em cent" required><br>

          <label for="new_password">Nouveau mot de passe</label>
          <input type="text" name="new_password" id="new_password" class="mb1em cent" required><br>

          <label for="new_mail">Nouveau courriel</label><br>
          <input type="email" name="new_mail" id="new_mail" class="mb1em cent" required><br>

          <label for="new_status" class="mb1em">Nouveau statut</label><br>
          <select name="new_status" id="new_status" class="mb2em centered ml0em">
            <option value="Client">Client</option>
            <option value="Gérant">Gérant</option>
          </select><br>

          <label for="new_branch">Nouvel établissement</label><br>
          <input type="text" name="new_branch" id="new_branch" class="mb1em cent">

          <input type="submit" class="btn3 mb1em" value="Confirmer">
        </form>
      </div>

      <div>
        <h2>Supprimer</h2>
        <form method="POST" action="back/del_user_admin.php">
          <label for="username0"></label><br>
          <select name="username" id="username" class="mb1em centered ml0em" required>
            <?php
            $utilisateurs = $bdd->query('SELECT * FROM utilisateurs ORDER BY Status');
            while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
              if ($utilisateur->Username != 'admin') {
                echo '<option value="' . $utilisateur->id . '">' . $utilisateur->Username . '</option>
                ';
              }
            }
            ?>
          </select>
          <input type="submit" class="btn3 mb1em" value="Confirmer">
        </form>
      </div>
    </div>

    <div class="center mb1em">
      <table>
        <thead>
          <td>Utilisateur</td>
          <td>Mot de passe</td>
          <td>Mail</td>
          <td class="hide">Statut</td>
          <td class="hide">Etablissement</td>
        </thead>
        <tbody>
          <?php
          // Affichage comptes
          $utilisateurs = $bdd->query('SELECT * FROM utilisateurs ORDER BY Status');
          while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td class="centered"><?= $utilisateur->Username ?></td>
              <td class="centered"><?= $utilisateur->Password ?></td>
              <td><?= $utilisateur->Mail ?></td>
              <td class="centered hide"><?= $utilisateur->Status ?></td>
              <td class="centered hide"><?= $utilisateur->Branch ?></td>
            <?php
          }
            ?>
        </tbody>
      </table>
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
    <h1 class="f-white centered mt2em white-border-horizontal"><img src="pictures/icons/left-inv.png" alt="icon-left">
      <?php echo $a ?> établissements<img src="pictures/icons/right-inv.png" alt="icon-right">
    </h1>

    <div class="inline mb2em">
      <div>
        <h2>Ajouter</h2>
        <form action="back/add_branch_admin.php" method="POST">

          <label for="branch">Nom d'établissement</label><br>
          <input type="text" name="branch" id="branch" class="mb1em ml0em" required><br>

          <label for="location">Lieu</label><br>
          <input type="text" name="location" id="location" class="mb1em ml0em" required><br>

          <label for="manager">Gérant</label><br>
          <input type="text" name="manager" id="manager" class="mb1em ml0em" required><br>

          <label for="comment">Lien image</label><br>
          <input type="url" name="link" id="link" class="mb1em ml0em" required><br>

          <input type="submit" class="btn3 mb1em">
        </form>
      </div>

      <div>
        <h2>Modifier</h2>
        <form method="POST" action="back/update_branch_admin.php">
          <label for="old_branch">Etablissement</label><br>
          <select name="old_branch" id="old_branch" class="mb1em centered ml0em">
            <?php
            $branches = $bdd->query('SELECT * FROM etablissements');
            while ($branch = $branches->fetch(PDO::FETCH_OBJ)) {
              echo '<option value="' . $branch->Branch . '">' . $branch->Branch . '</option>
            ';
            }
            ?>
          </select><br>
          <label for="branch">Nouveau nom</label><br>
          <input type="text" name="branch" id="branch" class="mb1em ml0em" required><br>

          <label for="location">Nouveau lieu</label><br>
          <input type="text" name="location" id="location" class="mb1em ml0em" required><br>

          <label for="manager">Nouveau gérant</label><br>
          <input type="text" name="manager" id="manager" class="mb1em ml0em" required><br>

          <label for="link">Nouveau lien image</label><br>
          <input type="url" name="link" id="link" class="mb1em ml0em" required><br>

          <input type="submit" class="btn3 mb1em">
        </form>
      </div>

      <div>
        <h2>Supprimer</h2>
        <form method="POST" action="back/del_branch_admin.php">
          <label for="branch">Etablissement</label><br>
          <select name="branch" id="branch" class="mb1em centered ml0em">
            <?php
            $branches = $bdd->query('SELECT * FROM etablissements');
            while ($branch = $branches->fetch(PDO::FETCH_OBJ)) {
              echo '<option value="' . $branch->Branch . '">' . $branch->Branch . '</option>
            ';
            }
            ?>
          </select>
          <input type="submit" class="btn3 centered">
        </form>
      </div>
    </div>

    <div class="center">
      <table class="mb1em">
        <thead>
          <td>Désignation</td>
          <td>Ville</td>
          <td>Gérant</td>
        </thead>
        <tbody>
          <?php
          // Affichage établissements
          $branches = $bdd->query('SELECT * FROM etablissements');
          while ($branch = $branches->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $branch->Branch ?></td>
              <td><?= $branch->Location ?></td>
              <td><?= $branch->Manager ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
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
    <h1 class="f-white centered mt2em white-border-horizontal"><img src="pictures/icons/left-inv.png" alt="icon-left"><?php echo $a ?> suites<img src="pictures/icons/right-inv.png" alt="icon-right"></h1>
    <div class="inline mb2em">
      <div>
        <h2>Ajouter</h2>
        <form method="POST" action="back/add_suite_admin.php">
          <label for="suite">Nom de la suite</label><br>
          <input type="text" name="suite" id="suite" class="mb1em ml0em" required><br>
          <label for="branch">Nom de l'établissement</label>
          <select name="branch" id="branch" class="mb1em centered ml0em" required>
            <?php
            $branches = $bdd->query('SELECT * FROM etablissements');
            while ($branch = $branches->fetch(PDO::FETCH_OBJ)) {
              echo '<option value="' . $branch->Branch . '">' . $branch->Branch . '</option>
            ';
            }
            ?>
          </select><br>
          <label for="price">Prix</label><br>
          <input type="number" name="price" id="price" class="mb1em centered ml0em" required><br>
          <input type="submit" name="add_suite" id="add_suite" class="btn3 mb1em">
        </form>
      </div>

      <div>
        <h2>Modifier</h2>
        <form method="POST" action="back/update_suite_admin.php">
          <label for="old_suite">Suite</label><br>
          <select name="old_suite" id="old_suite" class="mb1em centered ml0em">
            <?php
            $suites = $bdd->query('SELECT * FROM suites');
            while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
              echo '<option value="' . $suite->Suite . '">' . $suite->Suite . '</option>
            ';
            }
            ?>
          </select><br>
          <label for="suite">Nouveau nom</label><br>
          <input type="text" name="suite" id="suite" class="mb1em ml0em" required><br>
          <label for="price">Nouveau prix</label><br>
          <input type="number" name="price" id="price" class="mb1em ml0em" required><br>
          <input type="submit" class="btn3 mb1em">
        </form>
      </div>

      <div>
        <h2>Supprimer</h2>
        <form method="POST" action="back/del_suite_admin.php">
          <label for="suite">Suite</label><br>
          <select name="suite" id="suite" class="mb1em centered ml0em">
            <?php
            $suites = $bdd->query('SELECT * FROM suites');
            while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
              echo '<option value="' . $suite->Suite . '">' . $suite->Suite . '</option>
            ';
            }
            ?>
          </select>
          <input type="submit" class="btn3 centered">
        </form>
      </div>
    </div>

    <div class="center">
      <table class="mb1em">
        <thead>
          <td>Désignation</td>
          <td>Etablissement</td>
          <td>Taille</td>
          <td>Price</td>
        </thead>
        <tbody>
          <?php
          // Affichage suites
          $suites = $bdd->query('SELECT * FROM suites ORDER BY Branch');
          while ($suite = $suites->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?= $suite->Suite ?></td>
              <td><?= $suite->Branch ?></td>
              <td class="centered"><?= $suite->Persons ?> personnes</td>
              <td class="centered"><?= $suite->Price ?> €/nuit</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

</body>

</html>