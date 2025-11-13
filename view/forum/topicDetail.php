<?php 
    $topics = $result["data"]['topic']; 
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