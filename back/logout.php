<?php

session_start();
if (isset($_SESSION)) {
  $_SESSION = [];
  unset($user, $branch, $connect);
  header('Location: ../pages/reservations.php');
} else {
  var_dump($_SESSION);
}
