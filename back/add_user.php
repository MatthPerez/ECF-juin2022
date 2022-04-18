<?php

try {
  require_once '../back/bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  // die('Erreur : ' . $e->getMessage());
  echo 'Impossible de se connecter à la base de données';
}

require 'bdd_variables.php';
$utilisateurs = $bdd->query('SELECT * FROM utilisateurs');
while ($utilisateur = $utilisateurs->fetch(PDO::FETCH_OBJ)) {
  foreach ($utilisateurs as $utilisateur) {
    // echo $utilisateur['Mail'] . ' - ' . $_POST['mail'];
    if ($utilisateur['Mail'] === $_POST['mail']) {
      // header('Location: error.php');
      $site_message = "Il y a une erreur dans l'identifiant ou le mot de passe.";
      require 'error.php';
    }
  }
  // Création compte client
  $request = $bdd->prepare("INSERT INTO utilisateurs(Username, Password, Mail, Status) VALUES (:username,:password,:mail, :status)");
  $request->execute([
    "username" => $_POST['username'],
    "mail" => $_POST['mail'],
    "password" => $_POST['password'],
    "status" => "Client"
  ]);
  header('Location: form.php');
}
