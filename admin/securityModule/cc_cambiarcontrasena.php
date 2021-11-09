<?php
session_start();

class CcCambiarContrasena{
    
    public function verificarContrasenas($contrasenanueva,$confirmacioncontrasenanueva)
    {
        if ($contrasenanueva == $confirmacioncontrasenanueva && strlen($contrasenanueva)>4) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function validarBtnCambiarContrasena()
    {
        
        $decision = $this->validarPrivilegio("Cambiar Contrasena");
        
        if ($decision == 1) {
            
            $this->formCambiarContrasena();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function formCambiarContrasena()
    {
        include_once './FormCambiarContrasena.php';
        $obCambiarContrasena = new FormCambiarContrasena();
        $obCambiarContrasena->cambiarContrasenaShow();
    }
    
    public function cambiarContrasena($contrasenaanterior,$nuevacontrasena)
    {
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsername = new EuUsuarioTrabajador();
        $verificarContrasena = $obUsername->verificar_contrasena_por_idusuario($_SESSION["usuario"]->idusuario,$contrasenaanterior);
        
        if ($verificarContrasena==1) {
            include_once '../model/EuUsuarioTrabajador.php';
            $obUsuario = new EuUsuarioTrabajador();
            $obUsuario->cambiar_contrasena_usuario_trabajador_por_idusuario($_SESSION["usuario"]->idusuario,$nuevacontrasena);
            
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeOtroShow('Contraseña cambiada correctamente.','<a href="../index.php">Inicio</a>');
            
        } else {
            
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeOtroShow('La contrasena anterior ingresada es incorrecta.','<a href="../index.php">Inicio</a>');
            
        }
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
