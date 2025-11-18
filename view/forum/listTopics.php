<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics'];
?>

<h1>Liste des topics</h1>

<?php
if (!empty($topics)) {
    $hasTopic = false; 
    foreach($topics as $topic){ 
        $hasTopic = true;?>
        <p><a href="index.php?ctrl=forum&action=topicDetail&id=<?= $topic->getId() ?>"><?= $topic ?></a> publié le <?= $topic->getPublicationDate() ?>, par <a href="index.php?ctrl=security&action=profil&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser() ?></a></p>
        <p>Catégorie : <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>"><?= $topic->getCategory() ?></a></p>
<?php }; ?>

    <a href="index.php?ctrl=forum&action=addTopicToCategory&id=<?= $category->getId()?>">Ajouter un post</a>

<?php //Plus de message erreur quand une category n'a pas de topic associé mais affiche pas les balises html
    if (!$hasTopic) { ?>
        <p>Pas encore de post pour cette catégorie ! Et si vous lui en ajouteriez une ? </p>
        <a href="index.php?ctrl=forum&action=addTopicToCategory&id=<?= $category->getId()?>">Ajouter</a>
    <?php };
}
