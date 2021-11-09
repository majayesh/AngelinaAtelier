<?php
session_start();

class CcUsuarios
{

    public function validarBtnPrivilegioVerUsuarios()
    {
        
        $decision = $this->validarPrivilegio("Ver Usuarios");
        if ($decision == 1) {
            
            $this->formVerUsuarios();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioCrearUsuario()
    {
        
        $decision = $this->validarPrivilegio("Crear Usuario");
        if ($decision == 1) {
            
            $this->formCrearUsuario();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioModificarUsuario()
    {
        
        $decision = $this->validarPrivilegio("Modificar Usuario");
        if ($decision == 1) {
            
            $this->formPrincipalModificarUsuario();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioEliminarUsuario()
    {
        
        $decision = $this->validarPrivilegio("Eliminar Usuario");
        if ($decision == 1) {
            
            $this->formEliminarUsuario();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
        
    }
    
    public function formVerUsuarios()
    {
        
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador = $obUsuarioTrabajador->listar_usuarios();
        
        $_SESSION['usuarios'] = $obUsuarioTrabajador;
        
        include_once '../model/EuUsuarioPrivilegio.php';
        $obPrivilegiosUsuario = new EuUsuarioPrivilegio();
        $obPrivilegiosUsuario = $obPrivilegiosUsuario->listar_usuario_privilegios();
        
        $_SESSION['privilegiosusuario'] = $obPrivilegiosUsuario;

        include_once './FormVerUsuarios.php';
        $obUsuarios = new FormVerUsuarios();
        $obUsuarios->usuariosShow();
        
    }
    
    public function formCrearUsuario()
    {
        
        include_once '../model/EuPrivilegios.php';
        $obPrivilegios = new EuPrivilegios();
        $obPrivilegios = $obPrivilegios->listar_privilegios();

        $_SESSION['privilegios'] = $obPrivilegios;

        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;
        
        include_once './FormCrearUsuario.php';
        $obNuevoUsuario = new FormCrearUsuario();
        $obNuevoUsuario->crearUsuarioShow();
    }
    
    public function formPrincipalModificarUsuario()
    {
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador = $obUsuarioTrabajador->listar_usuarios();
        
        $_SESSION['usuarios'] = $obUsuarioTrabajador;
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;
        
        include_once '../model/EuUsuarioPrivilegio.php';
        $obPrivilegiosUsuario = new EuUsuarioPrivilegio();
        $obPrivilegiosUsuario = $obPrivilegiosUsuario->listar_usuario_privilegios();
        
        $_SESSION['privilegiosusuario'] = $obPrivilegiosUsuario;
        
        include_once './FormPrincipalModificarUsuario.php';
        $obModificarUsuario = new FormPrincipalModificarUsuario();
        $obModificarUsuario->modificarUsuarioShow();
    }
    
    public function formModificarUsuario($idusuario)
    {
        include_once '../model/EuPrivilegios.php';
        $obPrivilegios = new EuPrivilegios();
        $obPrivilegios = $obPrivilegios->listar_privilegios();

        $_SESSION['privilegios'] = $obPrivilegios;
        
        include_once '../model/EuPrivilegios.php';
        $obPrivilegiosUsuario = new EuPrivilegios();
        $obPrivilegiosUsuario = $obPrivilegiosUsuario->obtener_privilegios($idusuario);
        
        $_SESSION["privilegiosusuariomodificar"] = $obPrivilegiosUsuario;
        
        /*
        $array = array(
            "idtrabajador" => $obUsuarioTrabajador->idtrabajador,
            "nombres" => $obUsuarioTrabajador->nombres,
            "apaterno" => $obUsuarioTrabajador->apaterno,
            "amaterno" => $obUsuarioTrabajador->amaterno,
            "telefono" => $obUsuarioTrabajador->telefono,
            "email" => $obUsuarioTrabajador->email,
            "usuario" => $obUsuarioTrabajador->usuario,
            "contrasena" => $obUsuarioTrabajador->contrasena,
        );
        */
        
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador = $obUsuarioTrabajador->obtener_usuario_trabajador($idusuario);
        
        $_SESSION['usuariotrabajador'] = $obUsuarioTrabajador;
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;

        include_once './FormModificarUsuario.php';
        $obformModificarUsuario = new FormModificarUsuario();
        $obformModificarUsuario->formModificarUsuarioShow();
    }
    
    public function formEliminarUsuario()
    {
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador = $obUsuarioTrabajador->listar_usuarios();
        
        $_SESSION['usuarios'] = $obUsuarioTrabajador;
        
        include_once '../model/EuUsuarioPrivilegio.php';
        $obPrivilegiosUsuario = new EuUsuarioPrivilegio();
        $obPrivilegiosUsuario = $obPrivilegiosUsuario->listar_usuario_privilegios();
        
        $_SESSION['privilegiosusuario'] = $obPrivilegiosUsuario;
        
        include_once './FormEliminarUsuario.php';
        $obModificarUsuario = new FormEliminarUsuario();
        $obModificarUsuario->eliminarUsuarioShow();
    }
    
    public function volverModificarUsuario()
    {
        $this->formPrincipalModificarUsuario();
    }
    
    //--
    
    public function crearUsuario($array)
    {
        
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador -> registrar_usuario_trabajador($array);
        
        $this->formVerUsuarios();
    }
    
    public function eliminarUsuario($idUsuario)
    {
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador -> eliminar_usuario_trabajador($idUsuario);
        
        $this->formEliminarUsuario();
    }
    
    public function modificarUsuario($array)
    {
        include_once '../model/EuUsuarioTrabajador.php';
        $obUsuarioTrabajador = new EuUsuarioTrabajador();
        $obUsuarioTrabajador -> modificar_usuario_trabajador($array);
        
        $this->formPrincipalModificarUsuario();
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
