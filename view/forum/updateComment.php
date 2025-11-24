<?php 
    $comment = $result["data"]['comment'];
?>

    <div class="updateCommentForm">
       <h2>Modification de commentaire</h2>

        <form action="index.php?ctrl=forum&action=updateComment&id=<?= $comment->getId();?>" method="post">
            <label for="title">Titre du commentaire :</label>
            <input type="text" name="title" id="title" value="<?= $comment->getTitle() ?>"><br>

            <label for="text">Votre texte ici :</label>
            <input type="text" name="text" id="text" value="<?= $comment->getText() ?>"><br>

            <input type="submit" name="submit" value="Modifier">
        </form>
    </div>