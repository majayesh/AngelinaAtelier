<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuUsuarioTrabajador
{
    
    public function listar_usuarios()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT t.idtrabajador,t.nombre,t.apaterno,t.amaterno,t.dni,t.telefono,u.idusuario,u.email,u.usuario,u.contrasena,e.idestado,e.nombre as estado FROM trabajador t, usuario u, estado e WHERE t.idtrabajador=u.idtrabajador and u.idestado=e.idestado");
            $stm->execute();

            $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            return $usuarios;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function buscar_usuarios()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT t.idtrabajador,t.nombre,t.apaterno,t.amaterno,t.dni,t.telefono,u.idusuario,u.email,u.usuario,u.contrasena,e.idestado,e.nombre as estado FROM trabajador t, usuario u, estado e WHERE t.idtrabajador=u.idtrabajador and u.idestado=e.idestado and t.nombre like ?");
            $stm->execute();

            $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            return $usuarios;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function registrar_usuario_trabajador($array)
    {
        try {
            $db = Conexion::conect();
            $stm1 = $db->prepare("INSERT INTO trabajador (nombre,apaterno,amaterno,dni,telefono) values (:nombre,:apaterno,:amaterno,:dni,:telefono)");
            $stm1->bindParam(':nombre', $array["nombres"]);
            $stm1->bindParam(':apaterno', $array["apaterno"]);
            $stm1->bindParam(':amaterno', $array["amaterno"]);
            $stm1->bindParam(':dni', $array["dni"]);
            $stm1->bindParam(':telefono', $array["telefono"]);
            $stm1->execute();
            
            //$stm2 = $db->prepare('SELECT MAX(idtrabajador) FROM trabajador WHERE nombre=:nombres and apaterno=:apaterno and amaterno=:amaterno');
            $stm2 = $db->prepare('SELECT idtrabajador FROM trabajador WHERE dni=:dni and nombre=:nombre and apaterno=:apaterno and amaterno=:amaterno');
            /*
            $stm2->bindParam(':nombres', $array["nombres"]);
            $stm2->bindParam(':apaterno', $array["apaterno"]);
            $stm2->bindParam(':amaterno', $array["amaterno"]);
            */
            $stm2->bindParam(':dni', $array["dni"]);
            $stm2->bindParam(':nombre', $array["nombres"]);
            $stm2->bindParam(':apaterno', $array["apaterno"]);
            $stm2->bindParam(':amaterno', $array["amaterno"]);
            $stm2->execute();
            $result = $stm2->fetchAll(PDO::FETCH_OBJ);
            
            $stm3 = $db->prepare('INSERT INTO usuario (email,usuario,contrasena,idestado,idtrabajador) values (:email,:usuario,:contrasena,:idestado,:idtrabajador)');
            $stm3->bindParam(':email', $array["email"]);
            $stm3->bindParam(':usuario', $array["usuario"]);
            $stm3->bindParam(':contrasena', $array["contrasena"]);
            $stm3->bindParam(':idestado', $array["idestado"]);
            $stm3->bindParam(':idtrabajador', $result[0]->idtrabajador);
            $stm3->execute();
            
            $stm4 = $db->prepare('SELECT idusuario FROM usuario WHERE idtrabajador=:idtrabajador');
            $stm4->bindParam(':idtrabajador', $result[0]->idtrabajador);
            $stm4->execute();
            $result2 = $stm4->fetchAll(PDO::FETCH_OBJ);
            
            for($i = 0; $i < count($array["privilegios"]); $i++) {
                
                $stm5 = $db->prepare('INSERT INTO privilegio_detalle (idprivilegio,idusuario) values (:idprivilegio,:idusuario)');
                $stm5->bindParam(':idprivilegio', $array["privilegios"][$i]);
                $stm5->bindParam(':idusuario', $result2[0]->idusuario);
                $stm5->execute();
                
            }
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm1->null;
            $stm2->null;
            $stm3->null;
            $stm4->null;
            $stm5->null;
            $db->null;
        }
    }
    
    public function modificar_usuario_trabajador($array)
    {
        try {
            $db = Conexion::conect();
            $stm1 = $db->prepare("UPDATE trabajador SET nombre=:nombre,apaterno=:apaterno,amaterno=:amaterno,dni=:dni,telefono=:telefono WHERE idtrabajador=:idtrabajador");
            $stm1->bindParam(':nombre', $array["nombres"]);
            $stm1->bindParam(':apaterno', $array["apaterno"]);
            $stm1->bindParam(':amaterno', $array["amaterno"]);
            $stm1->bindParam(':dni', $array["dni"]);
            $stm1->bindParam(':telefono', $array["telefono"]);
            $stm1->bindParam(':idtrabajador', $array["idtrabajador"]);
            $stm1->execute();
            
            if ($array["contrasena"]=="null") {
                
                $stm2 = $db->prepare('UPDATE usuario SET email=:email,usuario=:usuario,idestado=:idestado WHERE idtrabajador=:idtrabajador');
                $stm2->bindParam(':email', $array["email"]);
                $stm2->bindParam(':usuario', $array["usuario"]);
                $stm2->bindParam(':idestado', $array["idestado"]);
                $stm2->bindParam(':idtrabajador', $array["idtrabajador"]);
                
            } else {
                
                $stm2 = $db->prepare('UPDATE usuario SET email=:email,usuario=:usuario,contrasena=:contrasena,idestado=:idestado WHERE idtrabajador=:idtrabajador');
                $stm2->bindParam(':email', $array["email"]);
                $stm2->bindParam(':usuario', $array["usuario"]);
                $stm2->bindParam(':contrasena', $array["contrasena"]);
                $stm2->bindParam(':idestado', $array["idestado"]);
                $stm2->bindParam(':idtrabajador', $array["idtrabajador"]);
                
            }
            
            $stm2->execute();

            $stm3 = $db->prepare('SELECT idusuario FROM usuario WHERE idtrabajador=:idtrabajador');
            $stm3->bindParam(':idtrabajador', $array["idtrabajador"]);
            $stm3->execute();
            $result = $stm3->fetchAll(PDO::FETCH_OBJ);

            $stm4 = $db->prepare('DELETE FROM privilegio_detalle WHERE idusuario=:idusuario');
            $stm4->bindParam(':idusuario', $result[0]->idusuario);
            $stm4->execute();

            for($i = 0; $i < count($array["privilegios"]); $i++) {

                $stm5 = $db->prepare('INSERT INTO privilegio_detalle (idprivilegio,idusuario) values (:idprivilegio,:idusuario)');
                $stm5->bindParam(':idprivilegio', $array["privilegios"][$i]);
                $stm5->bindParam(':idusuario', $result[0]->idusuario);
                $stm5->execute();

            }

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm1->null;
            $stm2->null;
            $stm3->null;
            $stm4->null;
            $stm5->null;
            $db->null;
        }
        
    }
    
    public function eliminar_usuario_trabajador($idUsuario)
    {
        try {
            $db = Conexion::conect();
            
            $stm1 = $db->prepare("SELECT idestado FROM estado WHERE nombre='Inactivo'");
            $stm1->execute();
            $result = $stm1->fetchAll(PDO::FETCH_OBJ);
            
            //$stm = $db->prepare("DELETE FROM trabajador WHERE idtrabajador=:idtrabajador");
            $stm2 = $db->prepare("UPDATE usuario SET idestado=:idestado WHERE idusuario=:idusuario");
            $stm2 ->bindParam(':idestado', $result[0]->idestado);
            $stm2 ->bindParam(':idusuario', $idUsuario);
            $stm2->execute();
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm1->null;
            $stm2->null;
            $db->null;
        }
    }
    
    public function obtener_usuario_trabajador($idusuario)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT t.idtrabajador,t.nombre,t.apaterno,t.amaterno,t.dni,t.telefono,u.idusuario,u.email,u.usuario,u.contrasena,e.idestado,e.nombre as estado FROM trabajador t, usuario u, estado e WHERE t.idtrabajador=u.idtrabajador and u.idestado=e.idestado and u.idusuario=:idusuario");
            $stm->bindParam(':idusuario', $idusuario);
            $stm->execute();

            $usuariotrabajador = $stm->fetchAll(PDO::FETCH_OBJ);

            return $usuariotrabajador;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function validar_usuario_trabajador_dni($dni){
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT COUNT(*) as respuesta FROM usuario u, trabajador t WHERE u.idtrabajador=t.idtrabajador and t.dni=:dni");
            $stm->bindParam(':dni', $dni);
            $stm->execute();

            $usuario = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            if($usuario[0]->respuesta != 0){
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
    
    public function verificar_contrasena_usuario_trabajador($dni,$password)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT u.contrasena FROM usuario u, trabajador t WHERE u.idtrabajador=t.idtrabajador and t.dni=:dni");
            $stm->bindParam(':dni', $dni);
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
    
    public function verificar_contrasena_por_idusuario($idusuario,$password)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT contrasena FROM usuario WHERE idusuario=:idusuario");
            $stm->bindParam(':idusuario', $idusuario);
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
    
    public function cambiar_contrasena_usuario_trabajador($correo,$nuevacontrasena)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare('UPDATE usuario u SET contrasena=:contrasena WHERE u.email=:correo');
            $stm->bindParam(':contrasena', $nuevacontrasena);
            $stm->bindParam(':correo', $correo);
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function cambiar_contrasena_usuario_trabajador_por_idusuario($idusuario,$nuevacontrasena)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare('UPDATE usuario u SET contrasena=:contrasena WHERE u.idusuario=:idusuario');
            $stm->bindParam(':contrasena', $nuevacontrasena);
            $stm->bindParam(':idusuario', $idusuario);
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}