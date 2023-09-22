<?php
include_once "./inc/header.php";
include_once "./inc/nav.php";
require_once "../models/jeuModel.php";

if (isset($_GET['id_jeu'])) {
    // identifiant de l'emprunt
    $id = $_GET['id_jeu'];
    // appel de la methode returnBook
    $jeu = Jeu::findJeuById($id);
}

?>

<div class="container">
    <h1 class="m-5">Ajouter un jeu</h1>
    <form action="./traitement/action.php" method="post">

        <div class="form-group  mb-3">
            <label class="m-2">Titre du jeu :</label>
            <input type="text" class="form-control text-uppercase" name="title" value="<?= !empty($jeu) ? $jeu["title"] : "" ?>">
            <?php
          
            ?>
        </div>

        <div class="form-group  mb-3">
            <label class="m-2">Min player :</label>
            <input type="number" class="form-control text-uppercase" name="min_players" value="<?= !empty($jeu) ? $jeu["min_players"] : "" ?>">
        </div>

        <div class="form-group  mb-3">
            <label class="m-2">Max player :</label>
            <input type="number" class="form-control text-uppercase" name="max_players" value="<?= !empty($jeu) ? $jeu["max_players"] : "" ?>">
        </div>

        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name=<?= !empty($jeu) ? "update_jeu" : "add_jeu" ?>> <?= !empty($jeu) ? "Update" : "Add" ?> jeu</button>
    </form>
</div>

<?php
include_once "./inc/footer.php";
?>