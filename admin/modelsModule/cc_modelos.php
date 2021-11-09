<?php
session_start();

class CcModelos
{

    public function validarBtnPrivilegioVerModelos()
    {
        
        $decision = $this->validarPrivilegio("Ver Modelos");
        if ($decision == 1) {
            
            $this->formVerModelos();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioCrearModelo()
    {
        
        $decision = $this->validarPrivilegio("Crear Modelo");
        if ($decision == 1) {
            
            $this->formCrearModelo();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioModificarModelo()
    {
        
        $decision = $this->validarPrivilegio("Modificar Modelo");
        if ($decision == 1) {
            
            $this->formPrincipalModificarModelo();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioEliminarModelo()
    {
        
        $decision = $this->validarPrivilegio("Eliminar Modelo");
        if ($decision == 1) {
            
            $this->formEliminarModelo();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
        
    }
    
    public function formVerModelos()
    {
        
        include_once '../model/EuModelo.php';
        $obModelos = new EuModelo();
        $obModelos = $obModelos->listar_modelos();
        
        $_SESSION['modelos'] = $obModelos;

        include_once './FormVerModelos.php';
        $obVerModelos = new FormVerModelos();
        $obVerModelos->modelosShow();
        
    }
    
    public function formCrearModelo()
    {
        
        include_once '../model/EuColor.php';
        $obColores = new EuColor();
        $obColores = $obColores->listar_colores();

        $_SESSION['colores'] = $obColores;

        include_once '../model/EuTipoPrenda.php';
        $obTiposPrenda = new EuTipoPrenda();
        $obTiposPrenda = $obTiposPrenda->listar_tipos_prendas();

        $_SESSION['tiposprenda'] = $obTiposPrenda;
        
        include_once '../model/EuTela.php';
        $obTelas = new EuTela();
        $obTelas = $obTelas->listar_telas();

        $_SESSION['telas'] = $obTelas;
        
        include_once '../model/EuSexo.php';
        $obSexos = new EuSexo();
        $obSexos = $obSexos->listar_sexos();

        $_SESSION['sexos'] = $obSexos;
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;
        
        include_once './FormCrearModelo.php';
        $obNuevoModelo = new FormCrearModelo();
        $obNuevoModelo->crearModeloShow();
    }
    
    public function formPrincipalModificarModelo()
    {
        include_once '../model/EuModelo.php';
        $obModelos = new EuModelo();
        $obModelos = $obModelos->listar_modelos();
        
        $_SESSION['modelos'] = $obModelos;
        
        include_once './FormPrincipalModificarModelo.php';
        $obModificarModelo = new FormPrincipalModificarModelo();
        $obModificarModelo->modificarModeloShow();
    }
    
    public function formModificarModelo($idmodelo)
    {
        
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
        
        include_once '../model/EuModelo.php';
        $obModelo = new EuModelo();
        $obModelo = $obModelo->obtener_modelo($idmodelo);
        
        $_SESSION['modelo'] = $obModelo;
        
        include_once '../model/EuColor.php';
        $obColores = new EuColor();
        $obColores = $obColores->listar_colores();

        $_SESSION['colores'] = $obColores;
        
        include_once '../model/EuTipoPrenda.php';
        $obTiposPrenda = new EuTipoPrenda();
        $obTiposPrenda = $obTiposPrenda->listar_tipos_prendas();

        $_SESSION['tiposprenda'] = $obTiposPrenda;

        include_once '../model/EuTela.php';
        $obTelas = new EuTela();
        $obTelas = $obTelas->listar_telas();

        $_SESSION['telas'] = $obTelas;
        
        include_once '../model/EuSexo.php';
        $obSexos = new EuSexo();
        $obSexos = $obSexos->listar_sexos();

        $_SESSION['sexos'] = $obSexos;
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;

        include_once './FormModificarModelo.php';
        $obformModificarModelo = new FormModificarModelo();
        $obformModificarModelo->formModificarModeloShow();
    }
    
    public function formEliminarModelo()
    {
        include_once '../model/EuModelo.php';
        $obModelos = new EuModelo();
        $obModelos = $obModelos->listar_modelos();
        
        $_SESSION['modelos'] = $obModelos;
        
        include_once './FormEliminarModelo.php';
        $obEliminarModelo = new FormEliminarModelo();
        $obEliminarModelo->eliminarModeloShow();
    }
    
    public function volverModificarModelo()
    {
        $this->formPrincipalModificarModelo();
    }
    
    //--
    
    public function crearModelo($array)
    {
        
        include_once '../model/EuModelo.php';
        $obModelo = new EuModelo();
        $obModelo ->registrar_modelo($array);
        
        $this->formVerModelos();
    }
    
    public function eliminarModelo($idModelo)
    {
        include_once '../model/EuModelo.php';
        $obModelo = new EuModelo();
        $obModelo ->eliminar_modelo($idModelo);
        
        $this->formEliminarModelo();
    }
    
    public function modificarModelo($array)
    {
        include_once '../model/EuModelo.php';
        $obModelo = new EuModelo();
        $obModelo ->modificar_modelo($array);
        
        $this->formPrincipalModificarModelo();
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
