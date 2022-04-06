<?php
session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite_name'])) {
  $suite_name = $_POST['suite_name'];
  $request = $bdd->exec("DELETE FROM suites WHERE id = '" . $_POST['suite_name'] . "'");
}
header('Location: manager.php');
