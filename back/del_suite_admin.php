<?php
session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite_name'])) {
  $suite_name = $_POST['suite_name'];
  $request = $bdd->exec("DELETE FROM suites WHERE id = '" . $_POST['suite_name'] . "'");
}
header('Location: ../admin.php');
