<?php
require_once 'model/database.php';

$clrClase= 'curso';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$clrClase.controller.php";
    $clrClase = ucwords($clrClase) . 'Controller';
    $clrClase = new $clrClase;
    $clrClase->Index();
}
else
{
        $clrClase = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
        require_once "controller/$clrClase.controller.php";
        $clrClase = ucwords($clrClase) . 'Controller';
        $clrClase = new $clrClase;
        call_user_func( array( $clrClase, $accion ) );
}