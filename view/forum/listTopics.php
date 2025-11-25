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
    if (!empty($topics)) {
        foreach($topics as $topic){ ?>
            <div class="topicCard">
                <h2><a href="index.php?ctrl=forum&action=topicDetail&id=<?= $topic->getId() ?>"><?= $topic ?></a></h2>
                <p><a href="index.php?ctrl=security&action=profil&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser() ?></a>, <?= $topic->getPublicationDate() ?></p>
                <p>Catégorie : <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>"><?= $topic->getCategory() ?></a></p>
                <form action="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId()?>" method="post">
                    <input class="delete" type="submit" name="submit" value="X">
                </form>
            </div>
<?php   };
    } else {
        echo "<p>Il y a pas encore de Post ! Soyez le premier !</p>";
    }

    if (!empty($_GET["id"])) { ?>
        <div class="addTopicBtn">
            <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId()?>">Ajouter un post</a>
        </div>
    <?php }?>
    </div>


