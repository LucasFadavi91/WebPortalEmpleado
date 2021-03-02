<?php

 include_once '../db/db.php';


 function comprobarEmp($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT emp_no from employees WHERE emp_no=:emp_no");

    $stmt->bindParam(':emp_no', $emp_no);
    $stmt->execute(); 

     if($stmt->rowCount() != 0){

        return true;

    }else{
	   	 echo "El empleado no existe en la base de datos o el codigo es erroneo.";
	   	 return false;
	}    

}




function consultarDatosPersonales($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT * from employees WHERE emp_no=:emp_no");

    $stmt->bindParam(':emp_no', $emp_no);
    $stmt->execute(); 

      
   return $stmt;
}

function consultarSalarios($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT * from salaries WHERE emp_no=:emp_no");

    $stmt->bindParam(':emp_no', $emp_no);
    $stmt->execute(); 

    /*select * from salaries where emp_no=10039 and from_date>='1988-01-19' and to_date>='1989-01-18';*/

      
   return $stmt;
}


function consultarTitulos($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT * from titles WHERE emp_no=:emp_no ORDER BY to_date");

    $stmt->bindParam(':emp_no', $emp_no);
    $stmt->execute(); 

      
   return $stmt;
}

function consultarDepartamentos($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT * from dept_emp JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE emp_no=:emp_no ORDER BY to_date");

    $stmt->bindParam(':emp_no', $emp_no);
    $stmt->execute(); 

      
   return $stmt;
}


?>