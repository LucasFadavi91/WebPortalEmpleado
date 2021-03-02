<?php 

require_once("../db/db.php");



# Función 'bajaEmpleado'. 
# Parámetros: $emp_no
#   
# Funcionalidad: Da de baja al empleado, updates en tablas
# 
# Return: DptoId
#
# Realizado: 01/03/2021
# 
# Código por Lucas Fadavi y Javier Gonzalez



function bajaEmpleado($emp_no){

    global $conexion;

    $stmt0 = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no=:emp_no");
                $stmt0->bindParam(':emp_no', $emp_no);
    $stmt0->execute();


    if($stmt0->rowCount() != 0){ //si el empleado existe

        $auxx=filtrarEmpleado($emp_no); //si el emp trabaja actualmente en la empresa fecha to_date='9999-01-01'

        if($auxx == true){

            $fecha_actual=getFecha();

            //Update en la tabla 'dept_emp' 
        	$stmt = $conexion->prepare("UPDATE dept_emp SET to_date=:to_date WHERE emp_no=:emp_no AND to_date='9999-01-01'");
                    $stmt->bindParam(':to_date',$fecha_actual);
                    $stmt->bindParam(':emp_no', $emp_no);
            $stmt->execute();


            //Update en la tabla 'salaries' 
            $stmt1 = $conexion->prepare("UPDATE salaries SET to_date=:to_date WHERE emp_no=:emp_no AND to_date='9999-01-01'");
                    $stmt1->bindParam(':to_date',$fecha_actual);
                    $stmt1->bindParam(':emp_no', $emp_no);
            $stmt1->execute();

            //Update en la tabla 'titles' 
            $stmt2 = $conexion->prepare("UPDATE titles SET to_date=:to_date WHERE emp_no=:emp_no AND to_date='9999-01-01'");
                    $stmt2->bindParam(':to_date',$fecha_actual);
                    $stmt2->bindParam(':emp_no', $emp_no);
            $stmt2->execute();


            /*ES NECESARIO HACER UN ALTER TABLE PARA INSERTAR UNA COLUMNA FECHA_DESPIDO (Modularizar el codigo para que el Alter Table sea lo primero)*/

            //Update en la tabla 'dept_emp' con la fecha despido



            echo "El empleado ".$emp_no." ha sido dado de baja de la empresa";

        }else{
            echo "ERROR: El empleado no trabaja actualmente en la empresa";
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
# Funcionalidad: Para saber si el empleado trabaja ahora en la empresa
# 
# Return: boolean
#
# Realizado: 02/03/2021
# 
# Código por Javier Gonzalez 

function filtrarEmpleado($emp_no) {
    
    global $conexion;

    $to_date='9999-01-01';

    $stmt = $conexion->prepare("SELECT dept_no FROM dept_emp WHERE emp_no = :user AND to_date=:to_date");
        $stmt->bindParam(":user", $emp_no);
        $stmt->bindParam(":to_date", $to_date);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            return true;
        }else{
            return false;
        }
}




?>
