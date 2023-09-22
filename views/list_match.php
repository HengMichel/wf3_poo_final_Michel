
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
                <th>Nom du Jeu</th>
                <th>Nbr de joueurs enregistrés :</th>
                <th>Date de démarrage:</th>
                <th>Pseudonyme du gagnant du match :</th>
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
                    <td><?= $match['title']; ?></td>
                    <td><?= $match['nombre_de_joueurs']; ?></td>
                    <td><?= $match['start_date']; ?></td>
                    <td><?= $match['nickname']; ?></td>
          
                    <td><a href="traitement/action.php?idmatch=<?= $match['id_contest']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<?php
include_once "./inc/footer.php";
?>
