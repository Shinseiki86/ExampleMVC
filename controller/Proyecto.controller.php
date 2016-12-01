<?php
require_once 'model/Proyecto.php';

class ProyectoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Proyecto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Proyecto/Proyecto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $proy = new Proyecto();
        
        if(isset($_REQUEST['id_Proyecto'])){
            $proy = $this->model->Obtener($_REQUEST['id_Proyecto']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Proyecto/Proyecto-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $proy = new Proyecto();
        
        $proy->id_Proyecto = $_REQUEST['id_Proyecto2'];
        $proy->fecha_Proyecto = $_REQUEST['fecha_Proyecto'];
        $proy->descripcion = $_REQUEST['descripcion'];
        $proy->justificacion = $_REQUEST['justificacion'];
        $proy->resultado = $_REQUEST['resultado'];
        $proy->convocatoria = $_REQUEST['convocatoria'];
        

        $bandera = false;
        foreach($this->model->Listar() as $r){
            if($r->id_Proyecto == $_REQUEST['id_Proyecto2']){
                $bandera = true;
            }
        }
        
        $bandera == true
            ? $this->model->Actualizar($proy)
            : $this->model->Registrar($proy);

        header('Location: ./?c=Proyecto');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_Proyecto']);
        header('Location: ./?c=Proyecto');
    }
}