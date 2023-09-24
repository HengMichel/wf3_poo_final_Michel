<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/jeuModel.php";
$jeuList = Jeu::findAllJeu();
?>

<div class="container">
    <h1 class="m-5 link-warning">Liste de jeu</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="border-3 link-warning">Id Jeu</th>
                <th class="border-3 link-warning">Title</th>
                <th class="border-3 link-warning">Number main actors</th>
                <th class="border-3 link-warning">number_total_actors</th>
                <th class="border-3 link-warning">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeuList as $jeu) { ?>
                <tr>
                    <td class="border-3 link-warning"><?= $jeu['id_game']; ?></td>
                    <td class="border-3 link-warning"><?= $jeu['title']; ?></td>
                    <td class="border-3 link-warning"><?= $jeu['min_players']; ?></td>
                    <td class="border-3 link-warning"><?= $jeu['max_players']; ?></td>
                    <td class="border-3 link-warning">
                        
                        <a class="border-3 link-warning" href="./traitement/action.php?id_jeu_delete=<?= $film['id_game']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php
include_once "./inc/footer.php";
?>