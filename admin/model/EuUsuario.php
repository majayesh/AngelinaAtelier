<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}
include '../model/EuTrabajador.php';

class EuUsuario extends EuTrabajador
{
    
    public function verificar_usuario($username)
    {
        try {
            $db = Conexion::conect();
            
            $stm1 = $db->prepare("SELECT * FROM estado WHERE nombre='Inactivo'");
            $stm1->execute();
            $result = $stm1->fetchAll(PDO::FETCH_OBJ);
            
            $stm2 = $db->prepare("SELECT count(*) as respuesta FROM usuario WHERE (((usuario = :usuario) or (email = :email))) and idestado!=:idestado");
            $stm2->bindParam(':usuario', $username);
            $stm2->bindParam(':email', $username);
            $stm2->bindParam(':idestado', $result[0]->idestado);
            $stm2->execute();

            $verificarUsuario = $stm2->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            if($verificarUsuario[0]->respuesta == 1){
                return 1;
            } else {
                return 0;
            }

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm1->null;
            $stm2->null;
            $db->null;
        }
    }
    
    public function verificar_contrasena($username,$password)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT contrasena FROM usuario WHERE ((usuario = :usuario) or (email = :email))");
            $stm->bindParam(':usuario', $username);
            $stm->bindParam(':email', $username);
            $stm->execute();

            $verificarContrasena = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            if($password == $verificarContrasena[0]->contrasena){
                return 1;
            } else {
                return 0;
            }

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function obtener_usuario($username){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * from usuario WHERE ((usuario = :usuario) or (email = :email))");
            $stm->bindParam(':usuario', $username);
            $stm->bindParam(':email', $username);
            $stm->execute();

            $usuario = $stm->fetch(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            $this->idtrabajador = $usuario->idtrabajador;
            $usuario->idtrabajador = $this->buscar_trabajador();

            return $usuario;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function validar_correo($email)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT count(*) as respuesta FROM usuario WHERE email=:email");
            $stm->bindParam(':email', $email);
            $stm->execute();

            $validarcorreo = $stm->fetchAll(PDO::FETCH_OBJ);

            if($validarcorreo[0]->respuesta != 0){
                return 1;
            } else {
                return 0;
            }

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function actualizar_codigo_recuperacion($codigorecuperacion,$email)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("UPDATE usuario SET codigorecuperacion=:codigorecuperacion WHERE email=:email");
            $stm->bindParam(':codigorecuperacion', $codigorecuperacion);
            $stm->bindParam(':email', $email);
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function validar_usuario_codigo_recuperacion($email,$codigorecuperacion){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT COUNT(*) as respuesta FROM usuario WHERE email=:email and codigorecuperacion= BINARY :codigorecuperacion");
            $stm->bindParam(':email', $email);
            $stm->bindParam(':codigorecuperacion', $codigorecuperacion);
            $stm->execute();

            $resultado = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".
            
            if($resultado[0]->respuesta != 0){
                return 1;
            } else {
                return 0;
            }

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function cambiar_contrasena($correo,$nuevacontrasena)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare('UPDATE usuario SET contrasena=:contrasena WHERE email=:email');
            $stm->bindParam(':contrasena', $nuevacontrasena);
            $stm->bindParam(':email', $correo);
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}