<?php

class Conexion{

    public static function conect(){
        try{
            
            $db = new PDO ("mysql:host=localhost;dbname=proyectogestproyti;","root","12345678");
            /*
            $db = new PDO ("mysql:host=bhjh5vqcwadclhqmkhsu-mysql.services.clever-cloud.com;dbname=bhjh5vqcwadclhqmkhsu;","u108wu77a4nvxery","qNzGXEkMs7HbyoUW4ecR");
            */
            return $db;
        }catch(PDOException $e){
            die("Error: ". $e->getMessage());
        }
    }

}