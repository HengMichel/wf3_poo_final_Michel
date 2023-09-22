<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/wf3_poo_final_Michel/models/database.php";

class Joueur{

    // pour la méthode static, pas besoin de déclarer une variable à l'inverse des contructeurs

    // methode pour s'inscrire
    public static function addJoueur($email,$name){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("INSERT INTO player (email, nickname) VALUES (?,?)");

        // exécuter la requête
        try {
            $request->execute(array($email,$name));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_final_Michel/list_joueur.php");
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // methode pour tout afficher 
    public static function findAllJoueurs(){

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare("SELECT * FROM player");

        // exécuter la requête
        $joueurList = null;
        try {
            $request->execute();
    
            // récupère le résultat dans un tableau
            $joueurList = $request->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $joueurList;
    }

    // methode pour tout afficher 
    public static function deleteJoueurById($id){
        
        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request =$db->prepare(" DELETE FROM player WHERE id_player = ?");

        // exécuter la requête
        $result = false;
        try {
            $request->execute(array($id));
            $result = true;
            
        // rediriger vers la page login.php
        header("Location: http://localhost/wf3_poo_final_Michel/list_joueur.php");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;

    }

    // methode pour tout afficher 
    public static function findJoueurById(){

    }
}