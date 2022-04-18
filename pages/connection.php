<?php

session_start();
if (isset($_POST['submit'])) {
  if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $entered_username = htmlspecialchars($_POST['username']);
    $entered_password = htmlspecialchars($_POST['password']);

    // Administrateur
    if ($entered_username == 'admin' and $entered_password == 'admin') {
      header('Location: ../admin.php');
    }

    // Gérant
    try {
      require '../back/bdd_variables.php';
      $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
    } catch (Exception $e) {
      // die('Erreur : ' . $e->getMessage());
      echo 'Impossible de se connecter à la base de données';
    }
    $utilisateurs = $bdd->query('SELECT * FROM utilisateurs WHERE Status = "Gérant"');
    while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
      if ($utilisateur->Username == $entered_username and $utilisateur->Password == $entered_password) {
        $_SESSION['user'] = htmlspecialchars($_POST['username']);
        $_SESSION['branch'] = $utilisateur->Branch;
        header('Location: manager.php');
        // $branch = $_SESSION['branch'];
        // $user = $_SESSION['user'];
        // require 'manager.php';
      }
    }

    // Client
    $clients = $bdd->query('SELECT * FROM utilisateurs WHERE Status = "Client"');
    while ($client = $clients->fetch(PDO::FETCH_OBJ)) {
      if ($client->Username == $entered_username and $client->Password == $entered_password) {
        $_SESSION['user'] = htmlspecialchars($_POST['username']);
        // $_SESSION['mdp'] = htmlspecialchars($_POST['password']);
        header('Location: ../pages/reservations.php');
        // $user = $_SESSION['user'];
        // require 'reservations.php';
      }
    }
  } else {
    echo '<p class="central">Veuillez compléter tous les champs requis. ' . $_POST['username'] . $_POST['password'] . '</p>';
  }
}

// header('Location: error.php');
$site_message = "Il y a une erreur dans l'identifiant ou le mot de passe.";
require '../back/error.php';
