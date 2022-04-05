<?php
session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite']) and isset($_POST['price'])) {
  $request = $bdd->prepare("INSERT INTO suites(Suite, Branch, Price) VALUES (?,?,?)");
  $request->execute(array($_POST['suite'], $_SESSION['branch'], $_POST['price']));
}
header('Location: manager.php');

