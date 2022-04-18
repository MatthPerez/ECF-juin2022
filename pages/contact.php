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
$script = '';
session_start();
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $connect = $user . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
  $user = 'Jean DUPONT';
}
require '../back/head.php';
require '../back/nav.php';
?>

<body class="bg-hotel">
  <section class="mt2em mb2em central-small bg-blur">
    <!-- Formulaire de contact  -->
    <div class="flex-title">
      <span><img src="../pictures/icons/left1.png" alt="left" height="20" class="mt1em5"></span>
      <span>
        <h1 class="cent f2rem">Demander à être recontacté</h1>
      </span>
      <span><img src="../pictures/icons/right1.png" alt="right" height="20" class="mt1em5"></span>
    </div>
    <form method="post" action="../back/form.php">
      <fieldset class="montserrat bold">
        <legend class="f2rem">Vos coordonnées</legend>

        <label for="name" class="ml20px f-larger">Nom</label><br>
        <input type="text" name="name" id="name" value="<?php echo $user ?>" class="w100p mb2em ml0em" required>

        <label for="phone" class="ml20px f-larger">Téléphone</label><br>
        <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" title="n° à 10 chiffres" placeholder="0600000000" class="w100p mb2em ml0em" required>

        <label for="message" class="ml20px f-larger">Message</label><br>
        <textarea name="message" id="message" cols="78" rows="10" class="w100p" placeholder="Message à envoyer" required></textarea>

        <input type="text" value="<?php $message = 'Votre message a bien été envoyé. Nous vous remercions pour votre intérêt.' ?>" class="invisible">

      </fieldset>
      <div class="cent">
        <input type="submit" class="btn3 m1em f1em" value="Envoyer">
        <input type="reset" class="btn3 m1em f1em" value="Effacer">
      </div>
    </form>
  </section>

  <section class="central-small bg-blur pb1em mb3em">
    <h3 class="cent mt2em mb1em pt1em">Vous pouvez aussi nous joindre par</h3>
    <div class="cent">
      <span><button class="btn1"><a href="https://api.whatsapp.com/send?phone=0695378162" target="_blank" class="f-black f-larger1">WhatsApp</a></button></span>
      <span><button class="btn1"><a href="mailto:matthieu.perez30pro@gmail.com" target="_blank" class="f-black f-larger1">Courriel</a></button></span>
      <span><button class="btn1"><a href="tel:0695378162" target="_blank" class="f-black f-larger1">Téléphone</a></button></span>
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