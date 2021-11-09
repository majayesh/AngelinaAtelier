<?php
session_start();

class CcChatbot
{

    public function validarBtnPrivilegioVerPreguntasyRespuestas()
    {
        
        $decision = $this->validarPrivilegio("Ver Preguntas y Respuestas");
        if ($decision == 1) {
            
            $this->formVerPreguntasyRespuestas();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioCrearPreguntayRespuesta()
    {
        
        $decision = $this->validarPrivilegio("Crear Pregunta y Respuesta");
        if ($decision == 1) {
            
            $this->formCrearPreguntayRespuesta();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioModificarPreguntayRespuesta()
    {
        
        $decision = $this->validarPrivilegio("Modificar Pregunta y Respuesta");
        if ($decision == 1) {
            
            $this->formPrincipalModificarPreguntayRespuesta();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioEliminarPreguntayRespuesta()
    {
        
        $decision = $this->validarPrivilegio("Eliminar Pregunta y Respuesta");
        if ($decision == 1) {
            
            $this->formEliminarPreguntayRespuesta();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
        
    }
    
    public function formVerPreguntasyRespuestas()
    {
        
        include_once '../model/EuBot.php';
        $obPreguntasyRespuestas = new EuBot();
        $obPreguntasyRespuestas = $obPreguntasyRespuestas->listar_preguntas_y_respuestas();
        
        $_SESSION['preguntasyrespuestas'] = $obPreguntasyRespuestas;

        include_once './FormVerPreguntasyRespuestas.php';
        $obVerPreguntasyRespuestas = new FormVerPreguntasyRespuestas();
        $obVerPreguntasyRespuestas->PreguntasyRespuestasShow();
        
    }
    
    public function formCrearPreguntayRespuesta()
    {
        
        include_once './FormCrearPreguntayRespuesta.php';
        $obNuevaPreguntayRespuesta = new FormCrearPreguntayRespuesta();
        $obNuevaPreguntayRespuesta->crearPreguntayRespuestaShow();
    }
    
    public function formPrincipalModificarPreguntayRespuesta()
    {
        include_once '../model/EuBot.php';
        $obPreguntasyRespuestas = new EuBot();
        $obPreguntasyRespuestas = $obPreguntasyRespuestas->listar_preguntas_y_respuestas();
        
        $_SESSION['preguntasyrespuestas'] = $obPreguntasyRespuestas;
        
        include_once './FormPrincipalModificarPreguntayRespuesta.php';
        $obModificarPreguntayRespuesta = new FormPrincipalModificarPreguntayRespuesta();
        $obModificarPreguntayRespuesta->modificarPreguntayRespuestaShow();
    }
    
    public function formModificarPreguntayRespuesta($idpreguntayrespuesta)
    {
        
        include_once '../model/EuBot.php';
        $obPreguntayRespuesta = new EuBot();
        $obPreguntayRespuesta = $obPreguntayRespuesta->obtener_pregunta_y_respuesta($idpreguntayrespuesta);
        
        $_SESSION['preguntayrespuesta'] = $obPreguntayRespuesta;

        include_once './FormModificarPreguntayRespuesta.php';
        $obformModificarPreguntayRespuesta = new FormModificarPreguntayRespuesta();
        $obformModificarPreguntayRespuesta->formModificarPreguntayRespuestaShow();
        
    }
    
    public function formEliminarPreguntayRespuesta()
    {
        include_once '../model/EuBot.php';
        $obPreguntasyRespuestas = new EuBot();
        $obPreguntasyRespuestas = $obPreguntasyRespuestas->listar_preguntas_y_respuestas();
        
        $_SESSION['preguntasyrespuestas'] = $obPreguntasyRespuestas;
        
        include_once './FormEliminarPreguntayRespuesta.php';
        $obEliminarPreguntayRespuesta = new FormEliminarPreguntayRespuesta();
        $obEliminarPreguntayRespuesta->eliminarPreguntayRespuestaShow();
    }
    
    public function volverModificarPreguntayRespuesta()
    {
        $this->formPrincipalModificarPreguntayRespuesta();
    }
    
    //--
    
    public function crearPreguntayRespuesta($array)
    {
        
        include_once '../model/EuBot.php';
        $obPreguntayRespuesta = new EuBot();
        $obPreguntayRespuesta ->registrar_pregunta_y_respuesta($array);
        
        $this->formVerPreguntasyRespuestas();
    }
    
    public function eliminarPreguntayRespuesta($idpreguntayrespuesta)
    {
        include_once '../model/EuBot.php';
        $obPreguntayRespuesta = new EuBot();
        $obPreguntayRespuesta ->eliminar_pregunta_y_respuesta($idpreguntayrespuesta);
        
        $this->formEliminarPreguntayRespuesta();
    }
    
    public function modificarPreguntayRespuesta($array)
    {
        include_once '../model/EuBot.php';
        $obPreguntayRespuesta = new EuBot();
        $obPreguntayRespuesta ->modificar_pregunta_y_respuesta($array);
        
        $this->formPrincipalModificarPreguntayRespuesta();
    }
    
    private function validarPrivilegio($privilegio)
    {
        $decision=0;
        // session_start();
        foreach ($_SESSION['privilegio'] as $privi) {
            if ($privi->nombrep == $privilegio) {
                $decision=1;
                break;
            } else {
                $decision=0;
            }
        }
        return $decision;
    }
    
}
