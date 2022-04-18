<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite']) and isset($_POST['price'])) {
  $request = $bdd->prepare("INSERT INTO suites(Suite, Branch, Price) VALUES (:suite,:branch,:price)");
  $request->execute([
    "suite" => $_POST['suite'],
    "branch" => $_POST['branch'],
    "price" => $_POST['price'],
  ]);
}

header('Location: ../admin.php');

// var_dump($_POST);
