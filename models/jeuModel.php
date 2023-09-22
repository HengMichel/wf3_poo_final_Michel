<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/wf3_poo_final_Michel/models/database.php";

class Jeu
{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addJeu($title, $numberMinPlayers, $numberMaxPlayers)
    {

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO `game`(`title`, `min_players`, `max_players`) VALUES(?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($title, $numberMinPlayers, $numberMaxPlayers));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_Michel/list_jeu.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour tout afficher 
    public static function findAllJeu()
    {

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("SELECT * FROM `game`");

        // exécuter la requête
        $jeuList = null;
        try {
            $request->execute();

            // récupère le résultat dans un tableau
            $jeuList = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $jeuList;
    }

    // methode pour tout afficher 
    public static function deleteJeuById($id)
    {
        $db = Database::dbConnect();

        // preparer la requete
        $request = $db->prepare("DELETE FROM game WHERE id_game=?");
        //executer la requete

        try {
            $request->execute(array($id));
            // recuperer le resultat dans un tableau
            header("Location: http://localhost/wf3_poo_final_Michel/list_jeu.php");
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // methode pour tout afficher 
    public static function findJeuById($id)
    {
        $db = Database::dbConnect();

        // preparer la requete
        $request = $db->prepare("SELECT * FROM game WHERE id_game=?");
        //executer la requete
        try {
            $request->execute(array($id));;
            // recuperer le resultat dans un tableau
            $jeu = $request->fetch();

            return $jeu;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
