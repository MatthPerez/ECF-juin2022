<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['mail']) and isset($_POST['status'])) {
  $request = $bdd->prepare("INSERT INTO utilisateurs(Username, Password, Mail, Status, Branch) VALUES (:username,:password,:mail, :status, :branch)");
  $request->execute([
    "username" => $_POST['username'],
    "password" => $_POST['password'],
    "mail" => $_POST['mail'],
    "status" => $_POST['status'],
    "branch" => $_POST['branch'],
  ]);
  header('Location: ../admin.php');
} else {
  echo "Il manque des éléments : <br><br>Nom d'utilisateur : " . $_POST['username'] . '<br>' . "Mot de passe : " . $_POST['password'] . '<br>' . "Mail : " . $_POST['mail'] . '<br>' . "Statut : " . $_POST['status'] . '<br>' . "Etablissement : " . $_POST['branch'] . '<br><br><a href="../admin.php">Retour page administrateur</a>';
}
