<?php

 include_once '../db/db.php';


# Función 'obtenerDepartamentos'. 
# Parámetros: Conexión a la bbdd 
#   
# Funcionalidad: Conseguir un Array con las deptos
# 
# Return: Array de dept_id#dept_name
#
# Realizado: 20/02/2021
# 
# Código por Javier Gonzalez & Lucas Fadavi


function obtenerDepartamentos(){

  global $conexion;

    $dptos = array();
    
    $sql = "SELECT dept_name FROM departments";

    foreach ($conexion->query($sql) as $row) {
        $dptos[]=$row['dept_name'];
    }

    return $dptos;
}


# Función 'getDptoId'. 
# Parámetros: Conexión a la bbdd 
#   
# Funcionalidad: Obtener el Id, de los dptos seleccionadas (Id#Name)
# 
# Return: DptoId
#
# Realizado: 20/02/2021
# 
# Código por Javier Gonzalez & Lucas Fadavi

function getDptoId($departamento){
    global $conexion;

    $sql = "SELECT dept_no FROM departments WHERE dept_name='$departamento'";

    foreach ($conexion->query($sql) as $row) {
        $id=$row['dept_no'];
    }


    return $id;
}







 function consultarEmpleados($departamento){

  global $conexion;


  $stmt = $conexion->prepare("SELECT * FROM dept_emp JOIN employees ON dept_emp.emp_no=employees.emp_no WHERE dept_emp.dept_no=:dept_no AND dept_emp.to_date='9999-01-01'");

  $stmt->bindParam(':dept_no', $departamento);
  $stmt->execute();

  return $stmt;

    

}

function consultarManagers($departamento){

  global $conexion;


  $stmt = $conexion->prepare("SELECT * FROM dept_manager JOIN employees ON dept_manager.emp_no=employees.emp_no WHERE dept_manager.dept_no=:dept_no AND dept_manager.to_date='9999-01-01'");

  $stmt->bindParam(':dept_no', $departamento);
  $stmt->execute();

  return $stmt;

    

}




?>