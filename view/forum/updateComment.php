<?php 
    $comments = $result["data"]['comments'];
?>

    <div class="updateCommentForm">
       <h2>Modification de commentaire</h2>

        <form action="index.php?ctrl=forum&action=updateComment&id=<?= $comments->getId();?>" method="post">
            <label for="title">Titre du commentaire :</label>
            <input type="text" name="title" id="title" value="<?= $comments->getTitle() ?>"><br>

            <label for="text">Votre texte ici :</label>
            <input type="text" name="text" id="text" value="<?= $comments->getText() ?>"><br>

            <input type="submit" name="submit" value="Modifier">
        </form>
    </div>