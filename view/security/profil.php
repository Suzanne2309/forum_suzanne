<?php 
    $user = $result["data"]['user'];
    $topics = $result["data"]['topics']; 
?>

<h2>Bienvenue sur mon porfil</h2>

<div class="profil">
    <!--image de profil-->
    <article class="qui">
        <h3>Je suis <?= $user->getPseudonym(); ?></h3>
        <p>Membre de Ghosty depuis le <?= $user->getCreationDate(); ?></p>
    </article>
    <article class="apropos">
        <h3>A propos de moi :</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas hendrerit, lacus quis commodo consectetur, lectus dolor gravida risus, eu sollicitudin erat leo non felis. Suspendisse consequat leo lectus, nec luctus nisl mattis convallis. Phasellus ut odio placerat, elementum diam quis, elementum tellus. </p>
        <p>Phasellus magna nisi, finibus at tortor in, imperdiet egestas sem. Cras velit lacus, ultrices id aliquet ut, ultrices nec purus. Vestibulum tincidunt nunc eget arcu viverra, sed ullamcorper nunc bibendum. Sed ut bibendum leo. Curabitur vulputate imperdiet elit vitae pharetra. Aenean vel cursus nisl, in tincidunt felis.</p>
    </article>
</div>

<div class="PostsByUser">
    <h3>Liste des postes de <?= $user->getPseudonym(); ?></h3>
    <?php foreach($topics as $topic ){ 
        if($topic->getUser()->getId() === $user->getId()) { ?>
        <p><?= $topic->getTitle() ?> publié le <?= $topic->getPublicationDate() ?><br>
        <?php }
     } ?>
</div>