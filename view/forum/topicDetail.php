<?php 
    $topics = $result["data"]['topics'];
    $comments = $result["data"]['comments'];
?>

<h2>Curieux du post “<?= $topics->getTitle() ?>” ? Entrez dans les détails… au risque d’être hanté.</h2>

<div class="topic">
    <!--image de profil-->
    <div class="wrap">
        <div class="topicContent">
            <h3><?= $topics->getTitle() ?></h3>
            <p><?= $topics->getText() ?></p>
        </div>
        <div class="topicInfos">
            <p><a href="index.php?ctrl=security&action=profil&id=<?= $topics->getUser()->getId() ?>"><?= $topics->getUser() ?></a>, le <?= $topics->getPublicationDate() ?></p>
            <p>Catégorie : <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topics->getCategory()->getId() ?>"><?= $topics->getCategory() ?></a></p>
        </div>
    </div>
</div>

<div class="comment">
    <div class="commentOptions">
        <p><!--Compteur des commentaires des posts--></p>
        <form action="post">
            <label for="">Trier par :</label>
            <select> 
                <option value="">commentaire récent</option>
                <option value="">commentaire ancienne</option>
                <option value="">par ordre croissant des auteurs</option>
                <option value="">par ordre décroissant des auteurs</option>
            </select>
        </form>
    </div>
    <div class="commentByTopic">
    <h3>Liste des commentaires de "<?= $topics->getTitle(); ?>"</h3>
    <?php
    $hasComment = false; 
    foreach($comments as $comment ){ 
        if($comment->getTopic()->getId() === $topics->getId()) { 
            $hasComment = true;?>
        <div class="commentBox">
            <div class="commentContent">
            <h4><?= $comment->getTitle() ?></h4>
            <p><?= $comment->getText() ?></p> 
            </div>
            <div class="commentInfos">
            <p><a href="index.php?ctrl=security&action=profil&id=<?= $comment->getUser()->getId() ?>"><?= $comment->getUser() ?></a><br></p>
            <p><?= $comment->getPublicationDate() ?></p>
            </div>
        </div>
        <?php }
     }; 
    if(!$hasComment) { ?>
        <p>Il n'y a pas encore de commentaire pour ce post. Vous pourriez être le premier !</p>
    <?php};?>
    </div>

</div>