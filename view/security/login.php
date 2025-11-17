<?php
    $user = $result["data"]['user'];

?>

<div class="wrapper">
    
    <h2>Bienvenue chez Ghosty, le forum du paranormal !</h2>

    <div class="registerForm">
        <form action="index.php?ctrl=security&action=login" method="post">
            <label for="email">Votre e-amil :</label>
            <input type="email" name="email" id="email"><br>
    
            <label for="password">Votre mot de passe :</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" name="submit" value="Se connecter">
        </form>
    </div>

</div>