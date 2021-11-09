<?php
session_start();

class CcNegocio
{
    public function validarBtnPrivilegioModificarUsuario()
    {
        
        $decision = $this->validarPrivilegio("Modificar Informacion Negocio");
        if ($decision == 1) {
            
            $this->formModificarNegocio();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function formModificarNegocio()
    {
        include_once '../model/EuNegocio.php';
        $obNegocio = new EuNegocio();
        $obNegocio = $obNegocio->obtener_negocio();
        
        $_SESSION['negocio'] = $obNegocio;

        include_once './FormModificarNegocio.php';
        $obformModificarNegocio = new FormModificarNegocio();
        $obformModificarNegocio->formModificarNegocioShow();
    }
    
    public function volverModificarUsuario()
    {
        $this->formPrincipalModificarUsuario();
    }
    
    public function modificarNegocio($array)
    {
        include_once '../model/EuNegocio.php';
        $obNegocio = new EuNegocio();
        $obNegocio ->modificar_negocio($array);
        
        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('Información de negocio actualizada correctamente.', '<a href="../index.php">Inicio</a>');
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
