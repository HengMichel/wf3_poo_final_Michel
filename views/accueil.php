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
    <h2 class="m-5 link-warning">Liste des joueurs</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="link-warning bg-black">Id Joueur</th>
                <th class="link-warning bg-black">Email</th>
                <th class="link-warning bg-black">Nickname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($joueurList as $joueur){ ?>
                <tr>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $joueur['id_player']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $joueur['email']; ?></td>
                    <td class="border-warning border-3 mt-2 link-primary bg-black"><?= $joueur['nickname']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container mb-5">
    <h2 class="m-5  link-warning bg-black">Liste des jeux</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Id Jeu</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Title</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Min joueur</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Max joueur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jeuList as $jeu){ ?>
                <tr>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $jeu['id_game']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $jeu['title']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $jeu['min_players']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black"><?= $jeu['max_players']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container">
    <h1 class="m-5 link-warning bg-black">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Nom du Jeu</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Nbr de joueurs enregistrés :</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Date de démarrage:</th>
                <th class="border-warning border-3 mt-2 link-warning bg-black">Pseudonyme du gagnant du match :</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($matchList as $match){ ?>
                <tr>
                    <td class="border-warning border-3 mt-2 link-warning bg-black
"><?= $match['title']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black
"><?= $match['nombre_de_joueurs']; ?></td>
                    <td class="border-warning border-3 mt-2 link-warning bg-black
"><?= $match['start_date']; ?></td>
                    <td class="border-warning border-3 mt-2 link-info bg-black
"><?= $match['nickname']; ?></td>
                    <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

</div>
<?php
include_once "../views/inc/footer.php";
?>