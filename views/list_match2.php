<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/joueurModel.php";
$matchList = Match::findAllMatchs();
?>

<div class="container">
    <h1 class="m-5">Liste de match</h1>
    <table class="table">
        <thead>
            <tr>
                <!-- <th>Id Actor</th> -->
                <th>Game id</th>
                <th>Start Date</th>
                <th>Winner id</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($matchList as $match){ ?>
                <tr>
                    <td><?= $match['game_id']; ?></td>
                    <td><?= $match['start_date']; ?></td>
                    <td><?= $match['winner_id']; ?></td>
                    <td><a href="traitement/action.php?idmatch=<?= $match['id_contest']; ?>">Update</a></td>
                    <td><a href="traitement/action.php?idmatch=<?= $match['id_contest']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php
include_once "./inc/footer.php";
?>
