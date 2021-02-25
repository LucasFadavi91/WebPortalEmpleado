<?php

 include_once '../db/db.php';



function consultarVidaLaboral($emp_no){

   global $conexion;

    $stmt = $conexion->prepare("SELECT * from employees join dept_emp on employees.emp_no=dept_emp.emp_no join departments on departments.dept_no=dept_emp.dept_no join titles on titles.emp_no=employees.emp_no join salaries on salaries.emp_no=employees.emp_no where employees.emp_no=:emp_no GROUP BY employees.emp_no");

        $stmt->bindParam(':emp_no', $emp_no);
        $stmt->execute(); 

         /*foreach($stmt->fetchAll() as $row) {
             
                echo $row['emp_no'], $row['first_name'], $row['last_name'], $row['birth_date'];
               
                
            }*/
       

}


?>