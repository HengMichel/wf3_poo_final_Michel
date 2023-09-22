<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_Michel/models/database.php";

class Contest
{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addMatch($game_id,$start_date,$winner_id){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO contest (game_id, start_date,winner_id) VALUES (?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($game_id,$start_date,$winner_id));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_Michel/list_match.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour tout afficher 
    public static function findAllMatchs(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("SELECT * FROM contest");

        // exécuter la requête
        $matchList = null;
        try {
            $request->execute();
    
            // récupère le résultat dans un tableau
            $matchList = $request->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $matchList;
    }

    // methode pour tout afficher triée par date de démarrage décroissante
    public static function findAllMatchsSortedByStartDateDesc() {
    // on appel la fonction dbConnect qui est dans la class Database
    $db = Database::dbConnect();

    // preparation de la requête avec la clause ORDER BY
    $request = $db->prepare("SELECT * FROM contest ORDER BY start_date DESC");

    // exécuter la requête
    $matchList = null;
    try {
        $request->execute();
        // récupère le résultat dans un tableau
        $matchList = $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $matchList;
}



    public static function findAllTables(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs  FROM contest c  LEFT JOIN player p ON c.winner_id = p.id_player  LEFT JOIN game g ON c.game_id = g.id_game  LEFT JOIN player_contest cp ON c.id_contest = cp.contest_id  GROUP BY c.id_contest, g.id_game  ORDER BY c.start_date DESC;");

        // exécuter la requête
        $matchList = null;
        try {
            $request->execute();
    
            // récupère le résultat dans un tableau
            $matchList = $request->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $matchList;
    }


    // methode pour tout afficher 
    public static function deleteMatchById($id){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare(" DELETE FROM contest WHERE id_contest = ?");

        // exécuter la requête
        $result = false;
        try {
            $request->execute(array($id));
            $result = true;
            
        // rediriger vers la page login.php
        header("Location: http://localhost/wf3_poo_final_Michel/list_match.php");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;

    }

    // methode pour tout afficher 
    public static function findMatchById($id){
        $db = Database::dbConnect();

        // preparer la requete
        $request = $db->prepare("SELECT * FROM contest WHERE id_contest=?");
        //executer la requete
        try {
            $request->execute(array($id));;
            // recuperer le resultat dans un tableau
            $match = $request->fetch();

            return $match;
        } catch (PDOException $e) {
            $e->getMessage();
        }

    }
}