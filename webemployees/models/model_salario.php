<?php 

require_once("../db/db.php");


function modificarSalario($emp_no, $salary){

    global $conexion;

    $stmt0 = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no=:emp_no");
                $stmt0->bindParam(':emp_no', $emp_no);
    $stmt0->execute();


    if($stmt0->rowCount() != 0){ //si rowCount devuelve 0 no hay resultados disponibles

    	$fecha_actual=getFecha();

    	$stmt = $conexion->prepare("UPDATE salaries SET to_date=:to_date WHERE emp_no=:emp_no");
                $stmt->bindParam(':to_date',$fecha_actual);
                $stmt->bindParam(':emp_no', $emp_no);

        $stmt->execute();

        //insertamos en la tabla 'salaries'        

    	$to_date_Aux='9999-01-01';

        $stmt2 = $conexion->prepare("INSERT INTO salaries (emp_no, salary, from_date, to_date) VALUES (:emp_no, :salary, :from_date, :to_date)");

            $stmt2->bindParam(':emp_no', $emp_no);
            $stmt2->bindParam(':salary', $salary);
            $stmt2->bindParam(':from_date', $fecha_actual);
            $stmt2->bindParam(':to_date', $to_date_Aux);
            
        $stmt2->execute();

        echo "Has modificado correctamente el salario del empleado ".$emp_no;


    }else {
        echo "El empleado no existe en la base de datos";
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


?>
