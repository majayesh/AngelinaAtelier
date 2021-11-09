<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuColor
{
    
    public function listar_colores()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM color WHERE idcolor!=0");
            $stm->execute();

            $telas = $stm->fetchAll(PDO::FETCH_OBJ);

            return $telas;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}