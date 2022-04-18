<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['branch']) and isset($_POST['location']) and isset($_POST['manager']) and isset($_POST['link'])) {
  $request = $bdd->prepare("INSERT INTO etablissements(Branch, Location, Manager, Link) VALUES (:branch,:location,:manager,:link)");
  $request->execute([
    "branch" => $_POST['branch'],
    "location" => $_POST['location'],
    "manager" => $_POST['manager'],
    "link" => $_POST['link']
  ]);
}
header('Location: ../admin.php');

// var_dump($_POST);