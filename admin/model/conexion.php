<?php

class Conexion{

    public static function conect(){
        try{
            /*
            $db = new PDO ("mysql:host=localhost;dbname=proyectogestproyti;","root","12345678");
            */
            $db = new PDO ("mysql:host=bmoydgsdmzkj7jowgmqz-mysql.services.clever-cloud.com;dbname=bmoydgsdmzkj7jowgmqz;","u59mbpprfcuaiai8","txaxkZMsquuiqFnXnNHB");
            
            return $db;
        }catch(PDOException $e){
            die("Error: ". $e->getMessage());
        }
    }

}