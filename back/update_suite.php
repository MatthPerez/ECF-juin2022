<?php

session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['old_suite']) and isset($_POST['new_suite']) and isset($_POST['price'])) {
  // Prix
  $request = $bdd->prepare("UPDATE suites SET Price = :new_price WHERE Suite = :old_name");
  $request->execute([
    "new_price" => $_POST['price'],
    "old_name" => $_POST['old_suite'],
  ]);
  // Nom
  $request = $bdd->prepare("UPDATE suites SET Suite = :new_name WHERE Suite = :old_name");
  $request->execute([
    "old_name" => $_POST['old_suite'],
    "new_name" => $_POST['new_suite']
  ]);
}

header('Location: manager.php');
