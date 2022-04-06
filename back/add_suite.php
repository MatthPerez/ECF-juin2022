<?php

session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite']) and isset($_POST['price'])) {
  $request = $bdd->prepare("INSERT INTO suites(Suite, Branch, Price) VALUES (:suite,:branch,:price)");
  $request->execute([
    "suite" => $_POST['suite'],
    "branch" => $_SESSION['branch'],
    "price" => $_POST['price'],
  ]);
}

header('Location: manager.php');
