<?php
require_once 'model/curso.php';

class CursoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Curso();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/clase/curso.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Curso();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/clase/curso-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Curso();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Profesor = $_REQUEST['Profesor'];
        $alm->Carrera = $_REQUEST['Carrera'];
        $alm->Inicio = $_REQUEST['Inicio'];
        $alm->Fin= $_REQUEST['Fin'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}