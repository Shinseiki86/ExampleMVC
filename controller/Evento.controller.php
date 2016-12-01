<?php
require_once 'model/Evento.php';

class EventoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Evento();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Evento/Evento.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $ev = new Evento();
        
        if(isset($_REQUEST['id_Evento'])){
            $ev = $this->model->Obtener($_REQUEST['id_Evento']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Evento/Evento-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $ev = new Evento();
        
        $ev->id_Evento = $_REQUEST['id_Evento2'];
        $ev->fecha_Evento = $_REQUEST['fecha_Evento'];
        $ev->descripcion_Evento = $_REQUEST['descripcion_Evento'];
    
        $bandera = false;
        foreach($this->model->Listar() as $r){
            if($r->id_Evento == $_REQUEST['id_Evento2']){
                $bandera = true;
            }
        }
        
        $bandera == true
            ? $this->model->Actualizar($ev)
            : $this->model->Registrar($ev);

        header('Location: ./?c=evento');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_Evento']);
        header('Location: ./?c=Evento');
    }
}