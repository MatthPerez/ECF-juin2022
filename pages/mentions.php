<?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

$content = 'description" content="hôtel, voyage, détente, amoureux, séjour, spa, privatif, réservation, romantique, couple, relaxation';
$title = 'Mentions légales';
$style = '../styles/style.css';
$script = '';
session_start();
if (isset($_SESSION['user'])) {
  $connect = $_SESSION['user'] . '<br>Se déconnecter';
} else {
  $connect = 'Se connecter';
}
require '../back/head.php';
?>

<body>
  <section class="central just mb1em">
    <h1 class="mt1em centered">Mentions légales</h1>

    <p class="just">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab natus laboriosam iste illum eos, autem dicta obcaecati similique blanditiis ratione ipsam, sunt mollitia esse impedit repellat vel quia dignissimos quibusdam velit? Repellendus fuga autem veniam, nihil quam numquam illo dicta eveniet laudantium quo corporis natus, provident iusto possimus molestias? Voluptatibus neque amet vero dicta at facilis, aperiam perspiciatis harum doloribus pariatur necessitatibus dolore quos incidunt. Corrupti nobis quasi quaerat sapiente porro, distinctio quisquam mollitia nam beatae deleniti eum ab accusantium vitae quam repellendus sunt ipsam amet illo nemo inventore reiciendis quos expedita. Eos itaque tenetur natus libero consequatur quia impedit?</p>

    <p class="just">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum odio, eveniet sit rerum explicabo accusamus. Deserunt voluptas accusamus eius ipsum cupiditate delectus doloribus hic illo cum sit! Similique quis in beatae corrupti repudiandae, soluta ut eaque veritatis aperiam eius id doloremque. Harum, explicabo necessitatibus magnam rerum minima doloremque eligendi iste.</p>

  <p class="just">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt cupiditate quidem sequi! Dolores reprehenderit ratione asperiores quos vel? Maxime, ducimus. Ex quasi eos tempora expedita sit soluta laudantium eius, consequuntur iste reprehenderit nesciunt porro iusto doloremque. Nam recusandae officiis voluptatibus saepe praesentium ratione mollitia atque laboriosam? Voluptatibus provident dolores nulla quo nesciunt saepe. Suscipit sed necessitatibus nisi quisquam sapiente provident dolorem illum tempora perferendis! Voluptates aut saepe voluptas, dicta beatae dolorem necessitatibus dolore tempore. Nesciunt tenetur doloribus, provident est sint aut quisquam ut adipisci. Repellendus, itaque. Laboriosam aut quidem distinctio excepturi consequuntur eligendi illum temporibus facilis delectus tempora animi nemo expedita, vitae reprehenderit. Vitae explicabo libero distinctio ad quaerat corrupti est placeat earum ut, unde ipsum esse sunt! Dicta voluptas placeat a corrupti dolores, alias esse, amet veritatis maiores tempore culpa possimus dolore natus cum quos ea, tempora fugiat minus illum incidunt vitae. Possimus modi nihil repudiandae fuga voluptatibus itaque autem magni, doloremque ea vero nostrum magnam, placeat aspernatur illo ipsa dolor quaerat perspiciatis. Laudantium quos voluptatibus sunt quas, deleniti ex minima sit non fugiat. Suscipit libero nisi esse dolores ipsa quisquam dicta ad, consequatur quae inventore voluptatum, laboriosam repudiandae incidunt eum totam. Hic praesentium aut, repellendus alias nulla accusamus tenetur rem iure quaerat saepe tempora ipsa quae consequatur, in fugiat ratione modi nostrum odit distinctio, mollitia aperiam iusto commodi. Blanditiis, soluta assumenda? Aut et, dolorem perferendis sequi quod ab voluptas harum illum rerum nulla repudiandae voluptate, placeat magni eligendi animi in? Hic distinctio cupiditate saepe nihil eius similique repellat.</p>

  <p class="just">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur earum consequatur at provident laborum quasi asperiores hic incidunt error temporibus. Alias dicta labore quis sequi laborum vel molestiae eum ipsam!</p>

  </section>
</body>