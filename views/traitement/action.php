
<?php
require_once "../../models/joueurModel.php";
require_once "../../models/jeuModel.php";
require_once "../../models/matchModel.php";


if (isset($_GET['id_jeu_delete'])) {
    // identifiant de l'emprunt
    $id = $_GET['id_jeu_delete'];
    // appel de la methode returnBook
    $jeu = Jeu::deleteJeuById($id);
}

if (isset($_POST['add_jeu'])) {
    $title = htmlspecialchars($_POST['title']);
    $numberMinPlayers = htmlspecialchars($_POST['min_players']);
    $numberMaxPlayers = htmlspecialchars($_POST['max_players']);

    // apeler la methode inscription de la classe User
    Jeu::addJeu($title, $numberMinPlayers, $numberMaxPlayers);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

if (isset($_POST['add_joueur'])) {
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['nickname']);

    // apeler la methode inscription de la classe User
    Joueur::addJoueur($email,$name);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}

if (isset($_POST['add_match'])) {
    $game_id = htmlspecialchars($_POST['game_id']);
    $start_date = htmlspecialchars($_POST['start_date']);
    $winner_id = htmlspecialchars($_POST['winner_id']);

    // apeler la methode inscription de la classe User
    Contest::addMatch($game_id,$start_date,$winner_id);
    // cette syntaxe uniquement pour appeler les méthodes static.
    // la méthode inscription étant static donc on utilise le nom de la classe suivi de "::" ensuite le nom de la méthode qui est inscriptions.

}


if (isset($_GET['idJoueur'])) {

    // identifiant de l'emprunter
    $idJoueur = htmlspecialchars($_GET['idJoueur']);

    // apeler la methode returnBook de la classe Book 
    Joueur::deleteJoueurById($idJoueur);
}


