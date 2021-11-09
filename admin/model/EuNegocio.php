<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

if(!@include_once('admin/model/conexion.php')) {
  include_once 'admin/model/conexion.php';
}

class EuNegocio
{
    
    /*
    public function listar_negocio()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * from negocio");
            $stm->execute();

            $modelos = $stm->fetchAll(PDO::FETCH_OBJ);

            return $modelos;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    */
    
    /*
    public function registrar_informacion($array)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("INSERT INTO negocio (descripcion,email,telefono,ubicacion) values (:descripcion,:email,:telefono,:ubicacion)");
            $stm->bindParam(':descripcion', $array["descripcion"]);
            $stm->bindParam(':email', $array["email"]);
            $stm->bindParam(':telefono', $array["telefono"]);
            $stm->bindParam(':ubicacion', $array["ubicacion"]);
            $stm->execute();
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    */
    
    public function obtener_negocio()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM negocio WHERE idnegocio=1");
            $stm->execute();

            $modelo = $stm->fetchAll(PDO::FETCH_OBJ);

            return $modelo;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function modificar_negocio($array)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("UPDATE negocio SET descripcion=:descripcion,email=:email,telefono=:telefono,ubicacion=:ubicacion WHERE idnegocio=1");
            $stm->bindParam(':descripcion', $array["descripcion"]);
            $stm->bindParam(':email', $array["email"]);
            $stm->bindParam(':telefono', $array["telefono"]);
            $stm->bindParam(':ubicacion', $array["ubicacion"]);
            
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
        
    }
    
}