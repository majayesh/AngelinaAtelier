<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

if(!@include_once('admin/model/conexion.php')) {
  include_once 'admin/model/conexion.php';
}

class EuSexo
{
    
    public function listar_sexos()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM sexo");
            $stm->execute();

            $sexos = $stm->fetchAll(PDO::FETCH_OBJ);

            return $sexos;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}