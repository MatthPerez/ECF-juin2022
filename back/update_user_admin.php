<?php

session_start();
try {
  require_once 'bdd_variables.php';
  $bdd = new PDO('mysql:host=' . $bddhost . ';dbname=' . $bdd_name . ';charset=utf8', $bdd_username, $bdd_password);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

// if (isset($_POST['suite']) and isset($_POST['price'])) {
  // $request = $bdd->prepare("UPDATE suites SET Suite = :suite,
  // Price = :price
  // WHERE Suite = :old_suite");
//   $request->execute([
//     "old_suite" => $_POST['old_suite'],
//     "suite" => $_POST['suite'],
//     "price" => $_POST['price'],
//   ]);
//   header('Location: ../admin.php');
// }

if (isset($_POST['old_user'])) {
  $request = $bdd->prepare("UPDATE utilisateurs SET
  Username = :new_username,
  Password = :new_password,
  Mail = :new_mail,
  Status = :new_status,
  Branch = :new_branch
  WHERE Username = :old_user");
}
$request->execute([
  "old_user" => $_POST['old_user'],
  "new_username" => $_POST['new_username'],
  "new_password" => $_POST['new_password'],
  "new_mail" => $_POST['new_mail'],
  "new_status" => $_POST['status'],
  "new_branch" => $_POST['branch'],
]);
header('Location: ../admin.php');

// var_dump($_POST);
// echo '<h2>DONNÉES</h2><p><b>Ancien nom</b> : ' . $_POST['old_user'] . '<br><b>Nouveau nom</b> : ' . $_POST['new_username'] . '<br><b>Nouveau mail</b> : ' . $_POST['new_mail'] . '<br><b>Nouveau statut</b> : ' . $_POST['new_status'] . '<br><b>Nouvel établissement</b> : ' . $_POST['branch'] . '</p>';
