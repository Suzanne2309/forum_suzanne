<?php
    $category = $result["data"]['category'];
?>

<div class="wrapper">
    
    <h2>Ajouter un nouveau post!</h2>

    <div class="topicForm">
        <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId();?>" method="post">
            <label for="title">Titre du post :</label>
            <input type="text" name="title" id="title"><br>

            <label for="text">Taper votre texte :</label>
            <input type="text" name="text" id="text"><br>
            


            <input type="submit" name="submit" value="Poster">
        </form>
    </div>

</div>