<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

if(!@include_once('admin/model/conexion.php')) {
  include_once 'admin/model/conexion.php';
}

class EuModelo
{
    
    public function listar_modelos()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,e.nombre as estado,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s, estado e WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and m.idestado=e.idestado");
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
    
    public function listar_modelos_clientes()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,e.nombre as estado,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s, estado e WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and m.idestado=e.idestado and e.nombre='Activo'");
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
    
    public function listar_modelos_clientes_sexo($idsexo)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,e.nombre as estado,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s, estado e WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and m.idestado=e.idestado and e.nombre='Activo' and m.idsexo=:idsexo");
            $stm->bindParam(':idsexo', $idsexo);
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
    
    public function listar_modelos_clientes_tipo_prenda($idtipoprenda)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,e.nombre as estado,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s, estado e WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and m.idestado=e.idestado and e.nombre='Activo' and m.idtipoprenda=:idtipoprenda");
            $stm->bindParam(':idtipoprenda', $idtipoprenda);
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
    
    public function listar_modelos_clientes_sexo_y_tipo_prenda($idsexo,$idtipoprenda)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,e.nombre as estado,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s, estado e WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and m.idestado=e.idestado and e.nombre='Activo' and m.idsexo=:idsexo and m.idtipoprenda=:idtipoprenda");
            $stm->bindParam(':idsexo', $idsexo);
            $stm->bindParam(':idtipoprenda', $idtipoprenda);
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
    
    public function verificar_codigo($codigo)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT count(*) as contador FROM modelo WHERE codigo=:codigo");
            $stm->bindParam(':codigo', $codigo);
            $stm->execute();

            $verificarCodigo = $stm->fetchAll(PDO::FETCH_OBJ); //devuelve el objeto, caso contrario "null".

            if($verificarCodigo[0]->contador==1){
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
    
    public function obtener_modelo($idmodelo)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT idmodelo,codigo,nombre,descripcion,idcolorprimario,idcolorsecundario,idtipoprenda,idtela,idsexo,idestado,imagen FROM modelo WHERE idmodelo=:idmodelo");
            $stm->bindParam(':idmodelo', $idmodelo);
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
    
    public function obtener_modelo_cliente($idmodelo)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT DISTINCT m.idmodelo,m.codigo,m.nombre,m.descripcion,cp.hexadecimal as hexadecimalcolorprimario, cp.nombre as colorprimario,cs.hexadecimal as hexadecimalcolorsecundario, cs.nombre as colorsecundario, tp.nombre as tipoprenda,t.nombre as tela,s.nombre as sexo,m.imagen FROM modelo m, color cp, color cs, tipoprenda tp, tela t, sexo s WHERE m.idcolorprimario=cp.idcolor and m.idcolorsecundario=cs.idcolor and m.idtipoprenda=tp.idtipoprenda and m.idtela=t.idtela and m.idsexo=s.idsexo and idmodelo=:idmodelo");
            $stm->bindParam(':idmodelo', $idmodelo);
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
    
    /*
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
    */
    public function registrar_modelo($array)
    {
        try {
            $db = Conexion::conect();
            /*
            $stm1 = $db->prepare('SELECT c.idcolor FROM color c, modelo m WHERE c.nombre=:colorprimario');
            $stm1->bindParam(':colorprimario', $array["colorprimario"]);
            $stm1->execute();
            $result1 = $stm1->fetchAll(PDO::FETCH_OBJ);
            
            $stm2 = $db->prepare('SELECT c.idcolor FROM color c, modelo m WHERE c.nombre=:colorsecundario');
            $stm2->bindParam(':colorsecundario', $array["colorsecundario"]);
            $stm2->execute();
            $result2 = $stm2->fetchAll(PDO::FETCH_OBJ);
            
            $stm3 = $db->prepare('SELECT tp.idtipoprenda FROM tipoprenda tp, modelo m WHERE m.nombre=:tipoprenda');
            $stm3->bindParam(':tipoprenda', $array["tipoprenda"]);
            $stm3->execute();
            $result3 = $stm3->fetchAll(PDO::FETCH_OBJ);
            
            $stm4 = $db->prepare('SELECT t.idtela FROM tela t, modelo m WHERE m.nombre=:tela');
            $stm4->bindParam(':tela', $array["tela"]);
            $stm4->execute();
            $result4 = $stm4->fetchAll(PDO::FETCH_OBJ);
            
            $stm5 = $db->prepare('SELECT s.idsexo FROM sexo s, modelo m WHERE s.nombre=:sexo');
            $stm5->bindParam(':sexo', $array["sexo"]);
            $stm5->execute();
            $result5 = $stm5->fetchAll(PDO::FETCH_OBJ);
            */
            
            $stm = $db->prepare("INSERT INTO modelo (codigo,nombre,descripcion,idcolorprimario,idcolorsecundario,idtipoprenda,idtela,idsexo,idestado,imagen) values (:codigo,:nombre,:descripcion,:idcolorprimario,:idcolorsecundario,:idtipoprenda,:idtela,:idsexo,:idestado,:imagen)");
            $stm->bindParam(':codigo', $array["codigo"]);
            $stm->bindParam(':nombre', $array["nombre"]);
            $stm->bindParam(':descripcion', $array["descripcion"]);
            $stm->bindParam(':idcolorprimario', $array["idcolorprimario"]);
            $stm->bindParam(':idcolorsecundario', $array["idcolorsecundario"]);
            $stm->bindParam(':idtipoprenda', $array["idtipoprenda"]);
            $stm->bindParam(':idtela', $array["idtela"]);
            $stm->bindParam(':idsexo', $array["idsexo"]);
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
    
    public function modificar_modelo($array)
    {
        try {
            $db = Conexion::conect();
            
            if ($array["imagen"]=="null") {
                
                $stm = $db->prepare("UPDATE modelo SET codigo=:codigo,nombre=:nombre,descripcion=:descripcion,idcolorprimario=:idcolorprimario,idcolorsecundario=:idcolorsecundario,idtipoprenda=:idtipoprenda,idtela=:idtela,idsexo=:idsexo,idestado=:idestado WHERE idmodelo=:idmodelo");
                $stm->bindParam(':codigo', $array["codigo"]);
                $stm->bindParam(':nombre', $array["nombre"]);
                $stm->bindParam(':descripcion', $array["descripcion"]);
                $stm->bindParam(':idcolorprimario', $array["idcolorprimario"]);
                $stm->bindParam(':idcolorsecundario', $array["idcolorsecundario"]);
                $stm->bindParam(':idtipoprenda', $array["idtipoprenda"]);
                $stm->bindParam(':idtela', $array["idtela"]);
                $stm->bindParam(':idsexo', $array["idsexo"]);
                $stm->bindParam(':idestado', $array["idestado"]);
                $stm->bindParam(':idmodelo', $array["idmodelo"]);
                
            } else {
                
                $stm = $db->prepare("UPDATE modelo SET codigo=:codigo,nombre=:nombre,descripcion=:descripcion,idcolorprimario=:idcolorprimario,idcolorsecundario=:idcolorsecundario,idtipoprenda=:idtipoprenda,idtela=:idtela,idsexo=:idsexo,idestado=:idestado,imagen=:imagen WHERE idmodelo=:idmodelo");
                $stm->bindParam(':codigo', $array["codigo"]);
                $stm->bindParam(':nombre', $array["nombre"]);
                $stm->bindParam(':descripcion', $array["descripcion"]);
                $stm->bindParam(':idcolorprimario', $array["idcolorprimario"]);
                $stm->bindParam(':idcolorsecundario', $array["idcolorsecundario"]);
                $stm->bindParam(':idtipoprenda', $array["idtipoprenda"]);
                $stm->bindParam(':idtela', $array["idtela"]);
                $stm->bindParam(':idsexo', $array["idsexo"]);
                $stm->bindParam(':idestado', $array["idestado"]);
                $stm->bindParam(':imagen', $array["imagen"]);
                $stm->bindParam(':idmodelo', $array["idmodelo"]);
                
            }
            
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
        
    }
    
    public function eliminar_modelo($idModelo)
    {
        try {
            $db = Conexion::conect();
            
            $stm1 = $db->prepare("SELECT idestado FROM estado WHERE nombre='Inactivo'");
            $stm1->execute();
            $result1 = $stm1->fetchAll(PDO::FETCH_OBJ);
            
            $stm2 = $db->prepare("UPDATE modelo SET idestado=:idestado WHERE idmodelo=:idmodelo");
            $stm2 ->bindParam(':idestado', $result1[0]->idestado);
            $stm2 ->bindParam(':idmodelo', $idModelo);
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