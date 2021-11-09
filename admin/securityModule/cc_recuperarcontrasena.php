<?php

class CcRecuperarContrasena{

    public function validarCorreo($correo){
        include_once '../model/EuUsuario.php';
        $obUsuario = new EuUsuario();
        
        $decision = $obUsuario->validar_correo($correo);
        
        return $decision;
        
    }
    
    public function validarCodigoRecuperacion($codigorecuperacion){
        if(strlen($codigorecuperacion)==6){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function verificarContrasenas($contrasenanueva,$confirmacioncontrasenanueva)
    {
        if ($contrasenanueva == $confirmacioncontrasenanueva && strlen($contrasenanueva)>4) {
            return 1;
        } else {
            return 0;
        } 
    }
    
    public function formIngresarCorreo()
    {

        include_once './FormIngresarCorreo.php';
        $obUsuarios = new FormIngresarCorreo();
        $obUsuarios->form_ingresarcorreo_show();
        
    }
    
    public function ingresarCodigoRecuperacion($correo){
        
        $this->actualizarCodigoRecuperacion($correo);
        
        include_once './FormIngresarCodigoRecuperacion.php';
        $obCodigoRecuperacion = new FormCodigoRecuperacion();
        $obCodigoRecuperacion->form_codigo_recuperacion_show($correo);
        
    }
    
    public function actualizarCodigoRecuperacion($correo) {
        
        $codigorecuperacion=rand(100000,999999);
        
        include_once './PHPMailer/EnviarCorreo.php';
        $obEnviarCorreo = new EnviarCorreo();
        $obEnviarCorreo->enviar($correo,$codigorecuperacion);

        include_once '../model/EuUsuario.php';
        $obUsuario = new EuUsuario();

        $obUsuario->actualizar_codigo_recuperacion($codigorecuperacion,$correo);
        
    }
    
    public function verificarCodigoRecuperacion($correo,$codigorecuperacion){
        
        include_once '../model/EuUsuario.php';
        $obUsuario = new EuUsuario();
        
        $decision = $obUsuario->validar_usuario_codigo_recuperacion($correo,$codigorecuperacion);
        
        if ($decision!=0) {
            
            include_once './FormEstablecerNuevaContrasena.php';
            $obNuevaContrasena = new FormEstablecerNuevaContrasena();
            $obNuevaContrasena->form_Nueva_Contrasena_show($correo);
            
        } else {
            
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('El código de recuperación ingresado no es correcto.','<a href="./FormIngresarCodigoRecuperacion.php">Inicio</a>');
            
        }
        
    }
   
    public function establecerNuevaContrasena($correo,$nuevacontrasena){
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuario = new EuUsuarioTrabajador();
        $obUsuario->cambiar_contrasena_usuario_trabajador($correo,$nuevacontrasena);

        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('Contraseña cambiada correctamente.','<a href="../index.php">Inicio</a>');
        
    }
    
}
