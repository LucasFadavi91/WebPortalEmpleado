<?php 

require_once("../db/db.php");



# Función 'obtenerDepartamentos'. 
# Parámetros: 
#   
# Funcionalidad: Conseguir un Array con las deptos
# 
# Return: Array de dept_id#dept_name
#
# Realizado: 01/03/2021
# 
# Código por Lucas Fadavi y Javier Gonzalez


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
# Parámetros: $departamento 
#   
# Funcionalidad: Obtener el Id, de los dptos seleccionadas (Id#Name)
# 
# Return: DptoId
#
# Realizado: 01/03/2021
# 
# Código por Lucas Fadavi y Javier Gonzalez

function getDptoId($departamento){
    global $conexion;

    $sql = "SELECT dept_no FROM departments WHERE dept_name='$departamento'";

    foreach ($conexion->query($sql) as $row) {
        $id=$row['dept_no'];
    }


    return $id;
}



# Función 'cambioDepartamento'. 
# Parámetros:
#   
# Funcionalidad: Cambiar al empleado de departamento
# 
# Return: DptoId
#
# Realizado: 01/03/2021
# 
# Código por Lucas Fadavi y Javier Gonzalez



function cambioDepartamento($emp_no, $departamento){

    global $conexion;

    $stmt0 = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no=:emp_no");
                $stmt0->bindParam(':emp_no', $emp_no);
    $stmt0->execute();


    if($stmt0->rowCount() != 0){ //si rowCount devolviera 0 no hay resultados disponibles

        $dptoActual=filtrarEmpleado($emp_no);

        if($dptoActual!=$departamento){

        	$fecha_actual=getFecha();

        	$stmt = $conexion->prepare("UPDATE dept_emp SET to_date=:to_date WHERE emp_no=:emp_no");
                    $stmt->bindParam(':to_date',$fecha_actual);
                    $stmt->bindParam(':emp_no', $emp_no);

            $stmt->execute();

            //insertamos en la tabla 'salaries'        

        	$to_date_Aux='9999-01-01';

            $stmt2 = $conexion->prepare("INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date) VALUES (:emp_no, :dept_no, :from_date, :to_date)");

                $stmt2->bindParam(':emp_no', $emp_no);
                $stmt2->bindParam(':dept_no', $departamento);
                $stmt2->bindParam(':from_date', $fecha_actual);
                $stmt2->bindParam(':to_date', $to_date_Aux);
                
            $stmt2->execute();

            $nombreNuevoDpto=getDptoNombre($departamento);


            echo "El empleado ".$emp_no." ha sido trasladado de departamento: ".$nombreNuevoDpto;

        }else{
            echo "ERROR: El empleado ya trabaja actualmente en ese departamento";
        }


    }else {
        echo "ERROR: El empleado no existe en la base de datos";
    }
}

# Función 'getFecha'
#   
# Funcionalidad: Consigue la hora del sistema al llamar a la funcion
# 
# Return: Hora
#
# Realizado: 08/02/2021
# 
# Código por Javier Gonzalez    
function getFecha(){
    $fecha=getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
    return $fecha;
}



# Función 'filtrarEmpleados'
#   
# Funcionalidad: Consigue el depto en el que trabaja el empleado
# 
# Return: Hora
#
# Realizado: 08/02/2021
# 
# Código por Javier Gonzalez 

function filtrarEmpleado($emp_no) {
    
    global $conexion;

    $to_date='9999-01-01';

    $stmt = $conexion->prepare("SELECT dept_no FROM dept_emp WHERE emp_no = :user AND to_date=:to_date");
        $stmt->bindParam(":user", $emp_no);
        $stmt->bindParam(":to_date", $to_date);
        $stmt->execute();

        foreach($stmt->fetchAll() as $row) {
            $dpto=$row['dept_no'];
        }

    return $dpto;
}


function getDptoNombre($departamento){
    global $conexion;

    $sql = "SELECT dept_name FROM departments WHERE dept_no='$departamento'";

    foreach ($conexion->query($sql) as $row) {
        $name=$row['dept_name'];
    }


    return $name;
}


?>
