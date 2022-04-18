<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite']) and isset($_POST['persons']) and isset($_POST['link']) and isset($_POST['price'])) {
  $request = $bdd->prepare("INSERT INTO suites(Suite, Branch, Persons, Link, Price) VALUES (:suite,:branch,:persons,:link,:price)");
  $request->execute([
    "suite" => $_POST['suite'],
    "branch" => $_SESSION['branch'],
    "price" => $_POST['price'],
    "persons" => $_POST['persons'],
    "link" => $_POST['link'],
  ]);
}

header('Location: ../pages/manager.php');
