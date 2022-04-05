<?php
if (isset($_POST)) {
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  $from = 'guigne_nimoise@hotmail.fr';
  $to = 'matthieu.perez3pro@gmail.com';
  $subject= 'Test de mail';
  $message='Essai d\'envoi de mail';
  $headers='From:' . $from;
  mail($to,$subject,$message,$headers);
  ?>
  <link rel="stylesheet" href="../styles/style.css">
  <div class="central grad p2em">
    <h1 class="cent">Mail envoyé</h1>
    <p class="cent">votre message a bien été envoyé. Nous vous remercions pour votre intérêt.</p>
  </div>
  <?php
} else {
  echo 'Erreur de saisie !';
}
?>