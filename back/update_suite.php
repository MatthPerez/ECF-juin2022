<?php

session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['new_suite']) and isset($_POST['persons']) and isset($_POST['link']) and isset($_POST['price'])) {
  $request = $bdd->prepare("UPDATE suites SET
  Suite = :new_suite,
  Persons = :persons,
  Link = :link,
  Price = :price
  WHERE Suite = :old_suite");
}
$request->execute([
  "old_suite" => $_POST['old_suite'],
  "new_suite" => $_POST['new_suite'],
  "persons" => $_POST['persons'],
  "link" => $_POST['link'],
  "price" => $_POST['price'],
]);
header('Location: ../pages/manager.php');

// var_dump($_POST);
// var_dump($_SESSION);