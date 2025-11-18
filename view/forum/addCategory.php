
    <!-- $newCategory = $result['data']['categoryName']; -->


<div class="wrapper">
    
    <h2>Ajouter votre catégorie!</h2>

    <div class="addCategoryForm">
        <form action="index.php?ctrl=forum&action=addNewCategory" method="post">
            <label for="categoryName">Nom de la catégorie :</label>
            <input type="text" name="categoryName" id="categoryName"><br>

            <input type="submit" name="submit" value="Ajouter">
        </form>
    </div>

</div>