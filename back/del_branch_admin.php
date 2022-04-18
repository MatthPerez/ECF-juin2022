<?php
session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['branch'])) {
  $branch = $_POST['branch'];
  $request = $bdd->exec("DELETE FROM etablissements WHERE Branch = '" . $_POST['branch'] . "'");
}
header('Location: ../admin.php');

