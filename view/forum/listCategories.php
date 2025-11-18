<?php
    $categories = $result["data"]['categories'];

?>

<h1>Liste des catégories</h1>

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a></p>
<?php } ?>

<p>Vous n'avez pas trouvé la catégorie que vous vouliez ? Ajouter là en deux click !</p>
<a href="index.php?ctrl=forum&action=addNewCategory">Au formulaire</a>
