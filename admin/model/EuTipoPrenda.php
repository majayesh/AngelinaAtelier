<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuTipoPrenda
{
    
    public function listar_tipos_prendas()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM tipoprenda");
            $stm->execute();

            $tiposprenda = $stm->fetchAll(PDO::FETCH_OBJ);

            return $tiposprenda;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}