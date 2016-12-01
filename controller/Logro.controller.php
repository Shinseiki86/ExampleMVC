<?php
require_once 'model/Logro.php';

class LogroController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Logro();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Logro/Logro.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $log = new Logro();
        
        if(isset($_REQUEST['id_Logro'])){
            $log = $this->model->Obtener($_REQUEST['id_Logro']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Logro/Logro-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $log = new Logro();
        
        $log->id_Logro = $_REQUEST['id_Logro2'];
        $log->participacion = $_REQUEST['participacion'];
      
        $bandera = false;
        foreach($this->model->Listar() as $r){
            if($r->id_Logro == $_REQUEST['id_Logro2']){
                $bandera = true;
            }
        }
        
        $bandera == true
            ? $this->model->Actualizar($log)
            : $this->model->Registrar($log);

        header('Location: ./?c=Logro');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_Logro']);
        header('Location: ./?c=Logro');
    }
}