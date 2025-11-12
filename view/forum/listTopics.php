<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics'];
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic){ ?>
    <p><a href="#"><?= $topic ?></a> publié le <?= $topic->getPublicationDate() ?>, par <a href="index.php?ctrl=security&action=profil&id=<?= $topic->getUser()->getId() ?>"><?= $topic->getUser() ?></a></p>
<?php }