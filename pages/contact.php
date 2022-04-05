<?php
$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Hôtel Hypnos';
$style = '../styles/style.css';
$level = '../';
$pages = '';
$active1 = '';
$active2 = '';
$active3 = '';
$active4 = 'active';
session_start();
if (isset($_SESSION['user'])) {
  $connect = $_SESSION['user'] . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
}
require '../back/head.php';
require '../back/nav.php';
?>

<body class="bg-hotel">
  <section class="mt4em central-small bg-blur">
    <!-- Formulaire de contact  -->
    <div class="flex-title">
      <span><img src="../pictures/icons/left1.png" alt="left" height="20" class="mt1em5"></span>
      <span>
        <h1 class="cent pt1em">Demander à être recontacté</h1>
      </span>
      <span><img src="../pictures/icons/right1.png" alt="right" height="20" class="mt1em5"></span>
    </div>
    <form method="post" action="../back/form.php">
      <fieldset class="montserrat bold">
        <legend>Vos coordonnées</legend>
        <label for="name" class="ml20px">Nom</label>
        <input type="text" name="name" id="name" placeholder="Jean DUPONT" class="w100p mb10px" required>
        <label for="phone" class="ml20px">Téléphone</label>
        <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" title="n° à 10 chiffres" placeholder="0600000000" class="w100p mb10px" required>
        <label for="message" class="ml20px">Message</label>
        <textarea name="message" id="message" cols="78" rows="7" class="w100p" placeholder="Message à envoyer" required></textarea>
      </fieldset>
      <div class="cent">
        <button type="submit" class="btn3 m1em f1em">Envoyer</button>
        <button type="reset" class="btn3 m1em f1em">Effacer</button>
      </div>
    </form>
  </section>

  <section class="central-small bg-blur pb1em mb3em">
    <h3 class="cent mb2 pt1em">Vous pouvez aussi nous joindre par</h3>
    <div class="cent">
      <span><button class="btn1"><a href="https://api.whatsapp.com/send?phone=0695378162" target="_blank">WhatsApp</a></button></span>
      <span><button class="btn1"><a href="mailto:matthieu.perez30pro@gmail.com" target="_blank">Courriel</a></button></span>
      <span><button class="btn1"><a href="tel:0695378162" target="_blank">Téléphone</a></button></span>
    </div>
  </section>
</body>

<footer class="sticky-bottom">
  <?php
  require '../back/icons.php';
  echo '
  <span>Groupe Hypnos &copy 2022</span>
  <span>-</span>
  <span>' . $facebook . '</span>
  <span>' . $instagram . '</span>
  <span>' . $twitter . '</span>
  <span>' . $youtube . '</span>
  ';
  ?>
</footer>