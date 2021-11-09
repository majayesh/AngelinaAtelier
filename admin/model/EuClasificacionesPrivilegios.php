<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuClasificacionesPrivilegios{

    public function obtener_clasificaciones_privilegios($idusuario){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT cp.nombre FROM clasificacion_privilegio cp, privilegio p, privilegio_detalle pd, usuario u WHERE cp.idclasificacionprivilegio=p.idclasificacionprivilegio and p.idprivilegio=pd.idprivilegio and pd.idusuario=u.idusuario and u.idusuario=:idusuario");
            $stm->bindParam(':idusuario', $idusuario);
            $stm->execute();

            $clasificaciones_privilegios = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            return $clasificaciones_privilegios;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}