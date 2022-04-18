<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite']) and isset($_POST['price'])) {
  $request = $bdd->prepare("UPDATE suites SET
    Suite = :suite,
    Price = :price
    WHERE Suite = :old_suite");
  $request->execute([
    "old_suite" => $_POST['old_suite'],
    "suite" => $_POST['suite'],
    "price" => $_POST['price'],
  ]);
  header('Location: ../admin.php');
}

// var_dump($_POST);
