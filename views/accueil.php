<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/joueurModel.php";
require_once "../models/jeuModel.php";
require_once "../models/matchModel.php";
$matchList = Contest::findAllTables();
$joueurList = Joueur::findAlljoueurs();
$jeuList = Jeu::findAllJeu();
$MatchsSortedByStartDateDesc = Contest::findAllMatchsSortedByStartDateDesc();
?>

<div class="container mb-5">
    <h2 class="m-5">Liste des joueurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id Joueur</th>
                <th>Email</th>
                <th>Nickname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($joueurList as $joueur){ ?>
                <tr>
                    <td><?= $joueur['id_player']; ?></td>
                    <td><?= $joueur['email']; ?></td>
                    <td><?= $joueur['nickname']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container mb-5">
    <h2 class="m-5">Liste des jeux</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id Jeu</th>
                <th>Title</th>
                <th>Min joueur</th>
                <th>Max joueur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jeuList as $jeu){ ?>
                <tr>
                    <td><?= $jeu['id_game']; ?></td>
                    <td><?= $jeu['title']; ?></td>
                    <td><?= $jeu['min_players']; ?></td>
                    <td><?= $jeu['max_players']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h1 class="m-5">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom du Jeu</th>
                <th>Nbr de joueurs enregistrés :</th>
                <th>Date de démarrage:</th>
                <th>Pseudonyme du gagnant du match :</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($matchList as $match){ ?>
                <tr>
                    <td><?= $match['title']; ?></td>
                    <td><?= $match['nombre_de_joueurs']; ?></td>
                    <td><?= $match['start_date']; ?></td>
                    <td><?= $match['nickname']; ?></td>
                    <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

</div>
<?php
include_once "../views/inc/footer.php";
?>