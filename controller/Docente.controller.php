<?php
require_once 'model/Docente.php';
require_once 'model/Proyecto.php';

class DocenteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Docente();
        $this->modelProy = new Proyecto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Docente/Docente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $doc = new Docente();
        
        if(isset($_REQUEST['id_ceduladoc'])){
            $doc = $this->model->Obtener($_REQUEST['id_ceduladoc']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Docente/Docente-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $doc = new Docente();
        
        $doc->id_ceduladoc = $_REQUEST['id_ceduladoc'];
        $doc->nombre = $_REQUEST['nombre'];
        $doc->apellido = $_REQUEST['apellido'];
        $doc->experiencia = $_REQUEST['experiencia'];
        $doc->estudio = $_REQUEST['estudio'];
        $doc->publicacion = $_REQUEST['publicacion'];
        $doc->id_Proyecto = $_REQUEST['id_Proyecto'];
        

        $bandera = false;
        foreach($this->model->Listar() as $r){
            if($r->id_ceduladoc == $_REQUEST['id_ceduladoc2']){
                $bandera = true;
            }
        }
        
        $bandera == true
            ? $this->model->Actualizar($doc)
            : $this->model->Registrar($doc);

        header('Location: ./?c=Docente');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_ceduladoc']);
        header('Location: ./?c=Docente');
    }
}