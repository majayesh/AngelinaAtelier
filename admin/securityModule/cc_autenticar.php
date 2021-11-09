<?php

class CcAutenticarUsuario{

    protected function validarTextos($username, $password){

        if(strlen($username)<4 || strlen($password)<4){
            return 0;
        }else{
            return 1;
        }

    }

    public function validarDatos($username,$password){

        $decision = $this->validarTextos($username,$password);


        if($decision == 1){

            include_once '../model/EuUsuario.php';
            $obUsuario = new EuUsuario();
            $verificarUsuario = $obUsuario->verificar_usuario($username);

            if($verificarUsuario==1){
                
                $verificarContrasena = $obUsuario->verificar_contrasena($username,$password);
                
                if($verificarContrasena==1){
                
                session_start();
                
                $usuario = $obUsuario ->obtener_usuario($username);
                $_SESSION['usuario'] = $usuario;
    
                include_once '../model/EuClasificacionesPrivilegios.php';
                $obClasiPrivi = new EuClasificacionesPrivilegios();
                $_SESSION['clasificacion_privilegio'] = $obClasiPrivi->obtener_clasificaciones_privilegios($usuario->idusuario);
                
                include_once '../model/EuPrivilegios.php';
                $obPrivi = new EuPrivilegios();
                $_SESSION['privilegio'] = $obPrivi->obtener_privilegios($usuario->idusuario);

                include_once 'ci_bienvenida.php';
                $obBienvenida = new CiBienvenida();
                $obBienvenida->bienvenidaShow();
                
                }else{
                    include_once '../shared/formMensaje.php';
                    $obMensaje = new formMensaje();
                    $obMensaje->mensajeShow('La contraseña ingresada no es válida','<a href="../index.php">Inicio</a>');
                } 
    
            }else{
                include_once '../shared/formMensaje.php';
                $obMensaje = new formMensaje();
                $obMensaje->mensajeShow('El usuario no existe o se encuentra inactivo','<a href="../index.php">Inicio</a>');
            } 

        }else{
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('Caracteres insuficientes','<a href="../index.php">Inicio</a>');
        }
        
        
    }

}
