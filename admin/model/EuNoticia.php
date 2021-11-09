<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

if(!@include_once('admin/model/conexion.php')) {
  include_once 'admin/model/conexion.php';
}

class EuNoticia
{
    
    public function listar_noticias()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT n.idnoticia,n.titular,n.resena,n.contenido,e.nombre as estado,DATE_FORMAT(fecha, '%d de %M del %Y') AS 'fecha',n.imagen FROM noticia n, estado e WHERE n.idestado=e.idestado");
            $stm->execute();

            $noticias = $stm->fetchAll(PDO::FETCH_OBJ);

            return $noticias;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function listar_noticias_clientes()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT n.idnoticia,n.titular,n.resena,n.contenido,e.nombre as estado,DATE_FORMAT(fecha, '%d de %M del %Y') AS 'fecha',n.imagen FROM noticia n, estado e WHERE n.idestado=e.idestado and e.nombre='Activo' ORDER BY 1 DESC");
            $stm->execute();

            $noticias = $stm->fetchAll(PDO::FETCH_OBJ);

            return $noticias;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function obtener_noticia($idnoticia)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT idnoticia,titular,resena,contenido,idestado,DATE_FORMAT(fecha, '%d de %M del %Y') AS 'fecha',imagen FROM noticia WHERE idnoticia=:idnoticia");
            $stm->bindParam(':idnoticia', $idnoticia);
            $stm->execute();

            $noticia = $stm->fetchAll(PDO::FETCH_OBJ);

            return $noticia;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function registrar_noticia($array)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("INSERT INTO noticia (titular,resena,contenido,idestado,imagen) VALUES (:titular,:resena,:contenido,:idestado,:imagen)");
            $stm->bindParam(':titular', $array["titular"]);
            $stm->bindParam(':resena', $array["resena"]);
            $stm->bindParam(':contenido', $array["contenido"]);
            $stm->bindParam(':idestado', $array["idestado"]);
            $stm->bindParam(':imagen', $array["imagen"]);
            $stm->execute();
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function modificar_noticia($array)
    {
        try {
            $db = Conexion::conect();
            
            if ($array["imagen"]=="null") {
                
                $stm = $db->prepare("UPDATE noticia SET titular=:titular,resena=:resena,contenido=:contenido,idestado=:idestado WHERE idnoticia=:idnoticia");
                $stm->bindParam(':titular', $array["titular"]);
                $stm->bindParam(':resena', $array["resena"]);
                $stm->bindParam(':contenido', $array["contenido"]);
                $stm->bindParam(':idestado', $array["idestado"]);
                $stm->bindParam(':idnoticia', $array["idnoticia"]);
                                
            } else {
                
                $stm = $db->prepare("UPDATE noticia SET titular=:titular,resena=:resena,contenido=:contenido,idestado=:idestado,imagen=:imagen WHERE idnoticia=:idnoticia");
                $stm->bindParam(':titular', $array["titular"]);
                $stm->bindParam(':resena', $array["resena"]);
                $stm->bindParam(':contenido', $array["contenido"]);
                $stm->bindParam(':idestado', $array["idestado"]);
                $stm->bindParam(':imagen', $array["imagen"]);
                $stm->bindParam(':idnoticia', $array["idnoticia"]);
                
            }
            
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
        
    }
    
    public function eliminar_noticia($idNoticia)
    {
        try {
            $db = Conexion::conect();
            
            $stm1 = $db->prepare("SELECT idestado FROM estado WHERE nombre='Inactivo'");
            $stm1->execute();
            $result1 = $stm1->fetchAll(PDO::FETCH_OBJ);
            
            $stm2 = $db->prepare("UPDATE noticia SET idestado=:idestado WHERE idnoticia=:idnoticia");
            $stm2 ->bindParam(':idestado', $result1[0]->idestado);
            $stm2 ->bindParam(':idnoticia', $idNoticia);
            $stm2->execute();
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm1->null;
            $stm2->null;
            $db->null;
        }
    }
    
}