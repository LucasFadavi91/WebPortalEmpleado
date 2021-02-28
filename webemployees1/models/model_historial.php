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


function consultarSalarios($emp_no){

   global $conexion;


    $stmt = $conexion->prepare("SELECT * from salaries WHERE emp_no=:emp_no");

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