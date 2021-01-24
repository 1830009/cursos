<?php
require_once 'model/inscripcion.php';

class InscripcionController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Inscripcion();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/inscripcion/inscripcion.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Inscripcion();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/inscripcion/inscripcion-editar.php';
        require_once 'view/footer.php';
    }

    public function Inscribir(){
        $alm = new Inscripcion();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/alumno/inscribir.php';
        require_once 'view/footer.php';

    }

    public function InscribirSQL(){
        $alm = new Alumno();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre=$_REQUEST['Curso'];
        echo $alm->Nombre;
    }
    
    public function Guardar(){
        $alm = new Inscripcion();
        
        $alm->Curso = $_REQUEST['curso'];
        $alm->Alumno= $_REQUEST['alumno'];
         $this->model->Registrar($alm);
        
       // header('Location: index.php?x=inscripcion');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idA'],$_REQUEST['idC']);
        header('Location: index.php?x=inscripcion');
    }
}