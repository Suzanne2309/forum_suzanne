<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>GHOSTY - Forum du paranormal</title>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <header>
                    <div class="logo">
                        <img src="<?= PUBLIC_DIR ?>/img/ghostyLogo.png" alt="Logo du site, un petit fantôme dessiné avec écrit GHOSTY du haut vers le bas">
                    </div>
                    <nav>
                        <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUser()){
                                // var_dump($_SESSION["user"]);die;
                                ?>
                                <a href="index.php?ctrl=security&action=profil&id=<?= App\Session::getUser()->getId()?>">
                                    <span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?>
                                </a>
                                <a href="index.php?ctrl=home&action=index">Accueil</a>
                                <?php
                                if(App\Session::isAdmin()){
                                ?>
                                    <a href="index.php?ctrl=home&action=users">Les profils</a>
                                <?php
                                } 
                                ?>
                                <a href="index.php?ctrl=forum&action=index">Liste des catégories</a>
                                <a href="index.php?ctrl=forum&action=listTopics">Liste des posts</a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="index.php?ctrl=home&action=index">Accueil</a>
                                <a href="index.php?ctrl=forum&action=index">Liste des catégories</a>
                                <a href="index.php?ctrl=forum&action=listTopics">Liste des posts</a>
                            <?php
                            }
                        ?>
                    </nav>
                    <div class="search_bar">
                        <input class="search" type="text" placeholder="Rechercher..." aria-label="Rechercher">
                        <button class="search_btn" type="submit" aria-label="Bouton recherche">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                        </button>
                    </div>
                    <div class="connexionButtons">
                        <?php
                        if(App\Session::getUser()){ ?>
                        <button class="layoutBtn" aria-label="Bouton déconnexion"><a href="index.php?ctrl=security&action=logout">Déconnexion</a></button>
                        <?php } else { ?>
                        <button class="layoutBtn" aria-label="Bouton connexion"><a href="index.php?ctrl=security&action=login">Connexion</a></button>
                        <button class="layoutBtn" aria-label="Bouton inscription"><a href="index.php?ctrl=security&action=register">Inscription</a></button>
                        <?php } ?>
                    </div>
                </header>
                
                <main id="forum">
                    <?= $page ?>
                </main>
            </div>
            <footer>
                <div class="logo">
                    <img src="<?= PUBLIC_DIR ?>/img/ghostyLogo.png" alt="Logo du site, un petit fantôme dessiné avec écrit GHOSTY du haut vers le bas">
                </div>
                <div class="legal">
                    <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
                </div>
                <div class="connexionButtonsFooter">
                    <?php
                    if(App\Session::getUser()){ ?>
                        <button class="layoutBtn" aria-label="Bouton déconnexion"><a href="index.php?ctrl=security&action=logout">Déconnexion</a></button>
                    <?php } else { ?>
                        <button class="layoutBtn" aria-label="Bouton connexion"><a href="index.php?ctrl=security&action=login">Connexion</a></button>
                        <button class="layoutBtn" aria-label="Bouton inscription"><a href="index.php?ctrl=security&action=register">Inscription</a></button>
                    <?php } ?>
                </div>
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>