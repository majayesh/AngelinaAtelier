<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuTrabajador 
{
    protected $idtrabajador = "";
    protected $nomTrabajador = "";
    protected $apPaterno="";
    protected $apMaterno="";
    protected $dni="";

    protected function buscar_trabajador(){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("Select * from trabajador where idtrabajador=:idtrabajador;");
            $stm->bindParam(':idtrabajador', $this->idtrabajador);
            $stm->execute();

            $trabajador = $stm->fetch(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            return $trabajador;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }

}