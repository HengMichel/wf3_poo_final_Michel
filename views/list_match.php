
<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/matchModel.php";
require_once "../models/jeuModel.php";
$matchList = Contest::findAllTables();
?>

<div class="container">
    <h1 class="m-5">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="border-3 link-warning">Nom du Jeu</th>
                <th class="border-3 link-warning">Nbr de joueurs enregistrés :</th>
                <th class="border-3 link-warning">Date de démarrage:</th>
                <th class="border-3 link-warning">Pseudonyme du gagnant du match :</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($matchList as $match){ ?>


                <!-- <div class="match <?php if ($match['start_date'] > date('Y-m-d H:i:s')) echo 'not-started'; ?>">
                    <h2><?= $match['game_title']; ?></h2>
                    <p>Date de démarrage : <?= $match['start_date']; ?></p> -->
                <!-- Autres données à afficher -->
                <!-- </div> -->




                <tr>
                    <td class="border-3 link-warning"><?= $match['title']; ?></td>
                    <td class="border-3 link-warning"><?= $match['nombre_de_joueurs']; ?></td>
                    <td class="border-3 link-warning"><?= $match['start_date']; ?></td>
                    <td class="border-3 link-warning"><?= $match['nickname']; ?></td>
          
                    <td><a class="border-3 link-warning" href="traitement/action.php?idmatch=<?= $match['id_contest']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<?php
include_once "./inc/footer.php";
?>
