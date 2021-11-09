<?php

if(!@include_once('../model/conexion.php')) {
  include_once '../model/conexion.php';
}

class EuBot
{
    private $name = "AngelinaBot";
    private $gender = "Mujer";

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function hears($message, callable $call)
    {
        $call(new EuBot);
        return $message;
    }

    public function reply($response)
    {
        echo $response;
    }
    
    public function listar_preguntas_y_respuestas()
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM chatbot");
            $stm->execute();

            $preguntasyrespuestas = $stm->fetchAll(PDO::FETCH_OBJ);

            return $preguntasyrespuestas;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function obtener_pregunta_y_respuesta($idchatbot)
    {
        try {
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM chatbot WHERE idchatbot=:idchatbot");
            $stm->bindParam(':idchatbot', $idchatbot);
            $stm->execute();

            $preguntayrespuesta = $stm->fetchAll(PDO::FETCH_OBJ);

            return $preguntayrespuesta;

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function registrar_pregunta_y_respuesta($array)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("INSERT INTO chatbot (pregunta,respuesta) VALUES (:pregunta,:respuesta)");
            $stm->bindParam(':pregunta', $array["pregunta"]);
            $stm->bindParam(':respuesta', $array["respuesta"]);
            $stm->execute();
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function modificar_pregunta_y_respuesta($array)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("UPDATE chatbot SET pregunta=:pregunta,respuesta=:respuesta WHERE idchatbot=:idchatbot");
            $stm->bindParam(':pregunta', $array["pregunta"]);
            $stm->bindParam(':respuesta', $array["respuesta"]);
            $stm->bindParam(':idchatbot', $array["idchatbot"]);
            
            $stm->execute();

        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
        
    }
    
    public function eliminar_pregunta_y_respuesta($idchatbot)
    {
        try {
            $db = Conexion::conect();
            
            $stm = $db->prepare("DELETE FROM chatbot WHERE idchatbot=:idchatbot");
            $stm ->bindParam(':idchatbot', $idchatbot);
            $stm->execute();
            
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
    public function eliminar_espacios($cadena){
        
        $cadena = str_replace(" ", "", $cadena);
        
        return $cadena;
        
    }
    
    public function eliminar_signos($cadena){
        
        $cadena = str_replace("¿", "", $cadena);
        $cadena = str_replace("?", "", $cadena);
        
        return $cadena;
        
    }
    
    public function eliminar_tildes($cadena){
		
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç'),
        array('N', 'n', 'C', 'c'),
        $cadena
        );

        return $cadena;
        
    }
    
    public function convertir_a_minusculas($cadena){
        
        $cadena = strtolower($cadena);
        
        return $cadena;
        
    }
    
    public function formatear_pregunta($cadena){
        
        $cadena = $this->eliminar_espacios($cadena);
        $cadena = $this->eliminar_signos($cadena);
        $cadena = $this->eliminar_tildes($cadena);
        $cadena = $this->convertir_a_minusculas($cadena);
        
        return $cadena;
        
    }
    
    public function verificar_pregunta($pregunta)
    {
        try {
            /*
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT respuesta FROM chatbot WHERE pregunta=:pregunta");
            $stm->bindParam(':pregunta', $pregunta);
            $stm->execute();
            
            if ($stm->rowCount() > 0) {
                
                $respuesta = $stm->fetchAll(PDO::FETCH_OBJ);
                
                return $respuesta;
                
            } else {
                
                return 0;
                
            }
            */
            $db = Conexion::conect();
            $stm = $db->prepare("SELECT * FROM chatbot");
            $stm->execute();
            $temp = "";
            
            $preguntasyrespuestas = $stm->fetchAll(PDO::FETCH_OBJ);
                
            foreach($preguntasyrespuestas as $preguntayrespuesta):
                
                $preguntabd = $this->formatear_pregunta($preguntayrespuesta->pregunta);
                
                if ($pregunta == $preguntabd) {

                    $temp = $preguntayrespuesta->respuesta;
                    
                    break;

                }
            endforeach;
            
            return $temp;
                
        } catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        } finally {
            $stm->null;
            $db->null;
        }
    }
    
}
