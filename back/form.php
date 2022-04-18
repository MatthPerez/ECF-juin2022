<?php

if (isset($_POST['name'])) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $from = 'inconnu';
  $to = 'matthieu.perez3pro@gmail.com';
  $subject = 'Test de mail';
  $headers = 'From:' . $from;
  // mail($to,$subject,$message,$headers);
  $site_message='Votre message a bien été envoyé.';
} else {
  $site_message = 'Le compte a bien été créé.';
}
  
?>
<link rel="stylesheet" href="../styles/style.css">
<div class="central grad-grey mt2em p2em">
<h1 class="cent"><?php echo $site_message ?></h1>
<p class="cent f-larger">Nous vous remercions pour votre intérêt.</p>
<p class="cent"><a href="../pages/reservations.php"><button class="btn3">Retourner à l'accueil</button></a></p>
