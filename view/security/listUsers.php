<?php
    $users = $result["data"]['users'];

?>

<h1>Liste des utilisateurs</h1>

<?php
foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=security&action=profil&id=<?= $user->getId() ?>"><?= $user->getPseudonym()?></a>, membre depuis le <?= $user->getCreationDate() ?></p>
<?php }