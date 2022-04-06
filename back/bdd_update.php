<?php

// Ajouter toutes les fonctions dans ce fichier

function deleteSuite(mysqli $bdd, $Suite)
{
  $sql = "DELETE FROM `Suite` WHERE $Suite = '" . $Suite . "'";
  $result = $bdd->query($sql);
  if (!$result) {
    throw new Exception(message: 'Impossible de supprimer l\'entrée.');
  }
}
