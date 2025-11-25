<?php
    $categories = $result["data"]['categories'];

?>
<h1>Liste des catégories</h1>
    <div class="wrap">
        <div class="listCategories">
            <?php
            foreach($categories as $category ){ ?>
                <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a></p>
            <?php } ?>
        </div>

        <div class="addCategory">
            <h2>Vous n'avez pas trouvé la catégorie que vous vouliez ? Ajouter là en deux click !</h2>
            <button class="mainBtn"><a href="index.php?ctrl=forum&action=addNewCategory">Ajouter</a></button>
        </div>
    </div>
