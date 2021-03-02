<?php

//session_start();

require_once("../models/model_altaempleado.php");

if (!isset($_POST) || empty($_POST)) {

    $departamentos=obtenerDepartamentos();
    $cargos=obtenerCargos();

    require_once("../views/altaempleado.php");

}else{

    $birth_date = $_POST['nacimiento'];
    $first_name = $_POST['nombre'];
    $last_name  = $_POST['apellido'];
    $gender     = $_POST['genero'];
    $hire_date  = $_POST['altafecha'];
    $salary     = $_POST['salario'];
    $title      = $_POST['cargo'];

    $departamento = $_POST['departamento'];
    $dept_no = getDptoId($departamento);

    //Damos de alta un nuevo empleado en la bbdd
    $nuevoEmpleado = altaEmpleado($birth_date, $first_name, $last_name , $gender, $hire_date, $dept_no, $salary, $title);

    echo "Nuevo empleado dado de alta";

    


}

?>