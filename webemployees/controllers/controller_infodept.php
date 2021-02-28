<?php

session_start();

require_once("../models/model_infodept.php");

if (!isset($_POST) || empty($_POST)) {

	$departamentos=obtenerDepartamentos();
    require_once("../views/view_06_infodept.php");
    


}else{

    
    $nameDepartamento = $_POST['departamento']; //el name
    $departamento = getDptoId($nameDepartamento);

    $stmt1=consultarEmpleados($departamento); //select de los empleados
    $stmt2=consultarManagers($departamento); //select de los managers

    require_once("../views/view_06_tabla_infodept.php");


}

?>