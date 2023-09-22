<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/joueurModel.php";
$joueurList = Joueur::findAllJoueurs();
?>

<div class="container">
    <h1 class="m-5">Liste de joueur</h1>
    <table class="table">
        <thead>
            <tr>
                <!-- <th>Id Actor</th> -->
                <th>Email</th>
                <th>Nickname</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($joueurList as $joueur){ ?>
                <tr>
                    <td><?= $joueur['email']; ?></td>
                    <td><?= $joueur['nickname']; ?></td>
                    <td><a href="traitement/action.php?idJoueur=<?= $joueur['id_player']; ?>">Update</a></td>
                    <td><a href="traitement/action.php?idJoueur=<?= $joueur['id_player']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php
include_once "./inc/footer.php";
?>
