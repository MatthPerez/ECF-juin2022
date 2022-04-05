<?php
session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=hypnos;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

var_dump($_SESSION);
if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['mail'])) {
  $request = $bdd->prepare("INSERT INTO utilisateurs(Username, Password, Mail, Status, Branch) VALUES (?,?,?,?,?)");
  $request->execute(array($_POST['uername'], $_POST['password'], $_POST['mail'], $_POST['status'], $_SESSION['branch']));
}
