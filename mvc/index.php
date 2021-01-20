
<?php
require_once 'model/database.php';

$clrClase= 'curso';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['x']))
{
        require_once 'view/header.php';
 ?>

        <h1>Gestión de Alumnos y Cursos</h1>
        <div class="well well-sm text-right">
                <a class="btn btn-primary" href="?x=alumno">Alumnos</a>
        </div>

        <div class="well well-sm text-right">
                <a class="btn btn-primary" href="?x=curso">Cursos</a>
        </div>
<?php 
        require_once 'view/footer.php';
}
else
{
        $clrClase = $_REQUEST['x'];
        if (!isset($_REQUEST['c'])){
                
                require_once "controller/$clrClase.controller.php";
                $clrClase = ucwords($clrClase) . 'Controller';
                $clrClase = new $clrClase;
                $clrClase->Index();
        }
        else{
                $clrClase = strtolower($_REQUEST['c']);
                $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
        
                require_once "controller/$clrClase.controller.php";
                $clrClase = ucwords($clrClase) . 'Controller';
                $clrClase = new $clrClase;
                call_user_func( array( $clrClase, $accion ) );
        }
}
