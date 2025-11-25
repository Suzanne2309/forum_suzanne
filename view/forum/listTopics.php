<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics'];
?>

<?php 
    if (!empty($_GET["id"])) { ?>
            <h1>Liste des post associé à "<?= $category->getCategoryName()?>"</h1>
<?php } else {?>
        <h1>Liste des post</h1>
    <?php };?>
    <div class="listTopics">
<?php
    foreach($topics as $topic){ ?>
        <p><a href="index.php?ctrl=forum&action=topicDetail&id=<?= $topic->getId() ?>"><?= $topic ?></a> publié le <?= $topic->getPublicationDate() ?>, par <a href="index.php?ctrl=security&action=profil&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser() ?></a></p>
        <p>Catégorie : <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>"><?= $topic->getCategory() ?></a></p>
        <form action="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId()?>" method="post">
            <input type="submit" name="submit" value="X">
        </form>
    </div>
<?php }; 
    if (!empty($_GET["id"])) { ?>
    <div class="addTopicBtn">
            <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId()?>">Ajouter un post</a>
    </div>
    <?php }?>


