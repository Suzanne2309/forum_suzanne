<div class="hero">
    <h1>Ghosty : Le forum d’un monde invisible !</h1>
    <?php
    if(App\Session::getUser()){ ?>
        <p> Bon retour parmis nous ! Allez-vous nous enchanter avec une nouvelle légende ou témoignage mystérieux ? </p>
    <?php } else { ?>
        <p>Nous sommes une communauté qui cherche de l’aventure dans un monde différent de notre réalité.
        Ici vous pourrez découvrir des légendes, parler de mythologies ou simplement raconter votre histoire qui vous à amener dans ce vaste monde.</p>
        <div class="heroButtons">
            <button class="mainBtn">
                <a href="index.php?ctrl=security&action=login">Se connecter</a>
            </button>
            <button class="mainBtn">
                <a href="index.php?ctrl=security&action=register">S'inscrire</a>
            </button>
        </div>
    <?php } ?>
</div>

<div class="recentTopic">
    <h2>Le dernier post publié</h2>
    <div class="topic">
        <img src="<?= PUBLIC_DIR ?>/img/ghost.jpg" alt="Une personne déguisé en fantôme avec un drap et des lunettes tenant une lampe vers le visage">
        <article>
            <h3>La fôret Maudite</h3>
            <p class="justify">The witch's charm is potent. Mystic sigils adorn the walls. Ancient runes hold the key. Magic is in the air. Candles flicker with intention. The witch's magic is eternal. Magic is in the air.
                The night sky is a canvas. The forest is your sanctuary. The raven's feathers are powerful. The circle is sacred. Magic herbs steep in water.
                The fire crackles with energy. The witch's hat is a symbol. Magic resides in the shadows. The witch's magic is eternal. The black cat crosses your path. The circle is cast. A broomstick stands ready.
                The witch's charm is potent. The cauldron is sacred. The raven is a messenger. The elements respond to your call. A spellbook holds ancient knowledge.
                A crystal ball reflects the future. The crystal's energy is strong. The earth's energy is yours. The forest hides ancient spells.
                The grimoire is ancient. The veil between worlds thins. A spell of binding is woven. The moon's light is your guide. Herbal concoctions simmer.
                The owl's hoot signals the time. A book of shadows lies open. Ancient chants fill the night.
            </p>
            <p>Ecrit par <a href="#">OccultCat</a>, le 2023-02-01 à 16:20:09</p>
            <p>Catégorie : <a href="#">Légendes urbaines</a></p>
        </article>
    </div>
</div>