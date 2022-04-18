<?php
session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['suite'])) {
  $suite = $_POST['suite'];
  $request = $bdd->exec("DELETE FROM suites WHERE Suite = '" . $_POST['suite'] . "'");
}
header('Location: ../admin.php');

// var_dump($_POST);