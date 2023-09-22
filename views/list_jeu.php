<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/jeuModel.php";
$jeuList = Jeu::findAllJeu();
?>

<div class="container">
    <h1 class="m-5">Liste de jeu</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id Jeu</th>
                <th>Title</th>
                <th>Number main actors</th>
                <th>number_total_actors</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeuList as $jeu) { ?>
                <tr>
                    <td><?= $jeu['id_game']; ?></td>
                    <td><?= $jeu['title']; ?></td>
                    <td><?= $jeu['min_players']; ?></td>
                    <td><?= $jeu['max_players']; ?></td>
                    <td>
                        
                        <a href="./traitement/action.php?id_jeu_delete=<?= $film['id_game']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php
include_once "./inc/footer.php";
?>