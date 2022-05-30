<?php
session_start();

class CcNoticias
{

    public function validarBtnPrivilegioVerNoticias()
    {
        
        $decision = $this->validarPrivilegio("Ver Noticias");
        if ($decision == 1) {
            
            $this->formVerNoticias();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioCrearNoticia()
    {
        
        $decision = $this->validarPrivilegio("Crear Noticia");
        if ($decision == 1) {
            
            $this->formCrearNoticia();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioModificarNoticia()
    {
        
        $decision = $this->validarPrivilegio("Modificar Noticia");
        if ($decision == 1) {
            
            $this->formPrincipalModificarNoticia();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
    }
    
    public function validarBtnPrivilegioEliminarNoticia()
    {
        
        $decision = $this->validarPrivilegio("Eliminar Noticia");
        if ($decision == 1) {
            
            $this->formEliminarNoticia();
            
        } else {
            include_once '../shared/formMensaje.php';
            $obMensaje = new formMensaje();
            $obMensaje->mensajeShow('No tiene el permiso', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
        }
        
    }
    
    public function formVerNoticias()
    {
        
        include_once '../model/EuNoticia.php';
        $obNoticias = new EuNoticia();
        $obNoticias = $obNoticias->listar_noticias();
        
        $_SESSION['noticias'] = $obNoticias;

        include_once './FormVerNoticias.php';
        $obVerNoticias = new FormVerNoticias();
        $obVerNoticias->noticiasShow();
        
    }
    
    public function formCrearNoticia()
    {
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;
        
        include_once './FormCrearNoticia.php';
        $obNuevaNoticia = new FormCrearNoticia();
        $obNuevaNoticia->crearNoticiaShow();
    }
    
    public function formPrincipalModificarNoticia()
    {
        include_once '../model/EuNoticia.php';
        $obNoticias = new EuNoticia();
        $obNoticias = $obNoticias->listar_noticias();
        
        $_SESSION['noticias'] = $obNoticias;
        
        include_once './FormPrincipalModificarNoticia.php';
        $obModificarNoticia = new FormPrincipalModificarNoticia();
        $obModificarNoticia->modificarNoticiaShow();
    }
    
    public function formModificarNoticia($idnoticia)
    {
        
        include_once '../model/EuNoticia.php';
        $obNoticia = new EuNoticia();
        $obNoticia = $obNoticia->obtener_noticia($idnoticia);
        
        $_SESSION['noticia'] = $obNoticia;
        
        include_once '../model/EuEstado.php';
        $obEstados = new EuEstado();
        $obEstados = $obEstados->listar_estados();

        $_SESSION['estados'] = $obEstados;

        include_once './FormModificarNoticia.php';
        $obformModificarNoticia = new FormModificarNoticia();
        $obformModificarNoticia->formModificarNoticiaShow();
        
    }
    
    public function formEliminarNoticia()
    {
        include_once '../model/EuNoticia.php';
        $obNoticias = new EuNoticia();
        $obNoticias = $obNoticias->listar_noticias();
        
        $_SESSION['noticias'] = $obNoticias;
        
        include_once './FormEliminarNoticia.php';
        $obEliminarNoticia = new FormEliminarNoticia();
        $obEliminarNoticia->eliminarNoticiaShow();
    }
    
    public function volverModificarNoticia()
    {
        $this->formPrincipalModificarNoticia();
    }
    
    //--
    
    public function crearNoticia($array)
    {
        
        include_once '../model/EuNoticia.php';
        $obNoticia = new EuNoticia();
        $obNoticia ->registrar_noticia($array);
        
        $this->formVerNoticias();
    }
    
    public function eliminarNoticia($idNoticia)
    {
        include_once '../model/EuNoticia.php';
        $obNoticia = new EuNoticia();
        $obNoticia ->eliminar_noticia($idNoticia);
        
        $this->formEliminarNoticia();
    }
    
    public function modificarNoticia($array)
    {
        include_once '../model/EuNoticia.php';
        $obNoticia = new EuNoticia();
        $obNoticia ->modificar_noticia($array);
        
        $this->formPrincipalModificarNoticia();
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
