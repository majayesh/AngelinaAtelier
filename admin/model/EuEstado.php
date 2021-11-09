<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuEstado
{
    
    public function listar_estados()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM estado");
            $stm->execute();

            $estados = $stm->fetchAll(PDO::FETCH_OBJ);

            return $estados;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}