<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuPrivilegios{
    
    public function listar_privilegios()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM privilegio");
            $stm->execute();

            $privilegios = $stm->fetchAll(PDO::FETCH_OBJ);

            return $privilegios;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }

    public function obtener_privilegios($idusuario){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT p.nombre as nombrep,cp.nombre as nombrecp, p.path FROM clasificacion_privilegio cp, privilegio p, privilegio_detalle pd, usuario u WHERE cp.idclasificacionprivilegio=p.idclasificacionprivilegio and p.idprivilegio=pd.idprivilegio and pd.idusuario=u.idusuario and u.idusuario=:idusuario");
            $stm->bindParam(':idusuario', $idusuario);
            $stm->execute();

            $privilegios = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            return $privilegios;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function buscar_privilegio($idprivilegio){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("Select * from privilegio where idprivilegio=:idprivilegio");
            $stm->bindParam(':idprivilegio', $idprivilegio);
            $stm->execute();

            $privilegio = $stm->fetch(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            return $privilegio;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
}