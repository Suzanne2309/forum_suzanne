<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics'];
    $user = $result["data"]['user'];
?>

<div class="wrapper">
    
    <h2>Ajouter un nouveau post!</h2>

    <div class="topicForm">
        <form action="index.php?ctrl=security&action=addTopicToCategory&id=<?= $category->getId();?>" method="post">
            <label for="title">Titre du post :</label>
            <input type="text" name="title" id="title"><br>

            <label for="text">Taper votre texte :</label>
            <input type="text" name="text" id="text"><br>
            

            <?php //$user = App\Session::getUser()->getId();?>


            <input type="submit" name="submit" value="Poster">
        </form>
    </div>

</div>