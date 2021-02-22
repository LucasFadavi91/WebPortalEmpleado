<?php 

require_once("../db/db.php");


function modificarSalario($emp_no, $salary){

	$fecha_actual=getFecha();

	global $conexion;
    
	$stmt = $conexion->prepare("UPDATE salaries set to_date=:to_date where emp_no=:emp_no");
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
