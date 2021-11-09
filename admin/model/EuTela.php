<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuTela
{
    
    public function listar_telas()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM tela");
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