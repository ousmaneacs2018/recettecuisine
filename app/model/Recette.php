<?php

Class Recette extends Model{


    public static function Affiche() {
        $db = Database::getInstance();

        //affichage aliment
        $aliment = $db->prepare("SELECT Aliment, Cholesterol FROM plat WHERE id = 1");
        
        //affichage aliment                
        $aliment->setFetchMode(PDO::FETCH_ASSOC);
        $aliment->execute();
        $tables = $aliment->fetch();

        return $tables;
    }

    public static function AfficheConseils() {
        $db = Database::getInstance();


    }

    public static function getSearchAliment($aliment, $limit = 0){
        $db = Database::getInstance();
        $sql = "select aliment from plat
                where aliment like '%".$aliment."%'";

        if($limit != 0){
            $sql .= ' limit 0, ' .$limit;
        }
        $films = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $films;
    }

}

