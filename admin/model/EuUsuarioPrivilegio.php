<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuUsuarioPrivilegio
{
    
    public function listar_usuario_privilegios()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT u.idusuario,p.idprivilegio,p.nombre FROM privilegio p, privilegio_detalle pd, usuario u WHERE pd.idusuario=u.idusuario and pd.idprivilegio=p.idprivilegio");
            $stm->execute();

            $privilegiosusuario = $stm->fetchAll(PDO::FETCH_OBJ);

            return $privilegiosusuario;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}