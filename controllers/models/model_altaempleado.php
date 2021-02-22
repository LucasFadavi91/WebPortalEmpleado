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
# Código por Javier Gonzalez


function obtenerDepartamentos(){

	global $conexion;

    $dptos = array();
    
    $sql = "SELECT dept_no, dept_name FROM departments ORDER BY dept_no";

    foreach ($conexion->query($sql) as $row) {
        $dptos[]=$row['dept_no']."#".$row['dept_name'];
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
# Código por Javier Gonzalez

function getDptoId($departamento){
    
    $data = explode('#', $departamento);
    
    $id = $data[0];
    return $id;
}


# Función 'obtenerCargos'. 
# Parámetros: Conexión a la bbdd 
#   
# Funcionalidad: Conseguir un Array con las cargos
# 
# Return: Array de cargos
#
# Realizado: 21/02/2021
# 
# Código por Javier Gonzalez

function obtenerCargos(){

	global $conexion;

    $cargos = array();
    
    $sql = "SELECT title FROM titles GROUP BY title";

    foreach ($conexion->query($sql) as $row) {
        $cargos[]=$row['title'];
    }

    return $cargos;
}


# Función 'altaEmpleado'. 
# Parámetros: Conexión a la bbdd 
#   
# Funcionalidad: Dar de alta empleado
# 
# Return: Array de cargos
#
# Realizado: 21/02/2021
# 
# Código por Javier Gonzalez


function altaEmpleado($birth_date, $first_name, $last_name , $gender, $hire_date, $dept_no, $salary, $title){

	global $conexion;
    
    $emp_no=getMaxEmpleado();

    //insertamos en la tabla 'employees'
    $stmt = $conexion->prepare("INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES (:emp_no, :birth_date, :first_name, :last_name, :gender, :hire_date)");

        $stmt->bindParam(':emp_no', $emp_no);
        $stmt->bindParam(':birth_date', $birth_date);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':hire_date', $hire_date);
        

    $stmt->execute();



//insertamos en la tabla 'departments'
    $to_date='9999-01-01';
    
    $stmt1 = $conexion->prepare("INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date) VALUES (:emp_no, :dept_no, :from_date, :to_date)");

        $stmt1->bindParam(':emp_no', $emp_no);
        $stmt1->bindParam(':dept_no', $dept_no);
        $stmt1->bindParam(':from_date', $hire_date);
        $stmt1->bindParam(':to_date', $to_date);
        
    $stmt1->execute();

//insertamos en la tabla 'salaries'

    $to_date='9999-01-01';

    $stmt2 = $conexion->prepare("INSERT INTO salaries (emp_no, salary, from_date, to_date) VALUES (:emp_no, :salary, :from_date, :to_date)");

        $stmt2->bindParam(':emp_no', $emp_no);
        $stmt2->bindParam(':salary', $salary);
        $stmt2->bindParam(':from_date', $hire_date);
        $stmt2->bindParam(':to_date', $to_date);
        
    $stmt2->execute();


//insertamos en la tabla 'titles'

    $to_date='9999-01-01';

    $stmt3 = $conexion->prepare("INSERT INTO titles (emp_no, title, from_date, to_date) VALUES (:emp_no, :title, :from_date, :to_date)");

        $stmt3->bindParam(':emp_no', $emp_no);
        $stmt3->bindParam(':title', $title);
        $stmt3->bindParam(':from_date', $hire_date);
        $stmt3->bindParam(':to_date', $to_date);
        
    $stmt3->execute();
 

    return $emp_no;

}


# Función 'insertarInvoiceLine'. 
# Parámetros:
#   
# Funcionalidad: Obtiene el ultimo InvoiceId
# 
# Return: Maximo InvoiceId+1
#
# Realizado: 12/02/2021
# 
# Código por Javier Gonzalez
function getMaxEmpleado(){

    global $conexion;

    //obtenemos el numpedidomaximo
    $stmt = $conexion->prepare("SELECT MAX(emp_no) as id FROM employees");
    $stmt->execute();

    foreach($stmt->fetchAll() as $row) {
        $max=$row['id'];
    }
    $max=$max+1;

    return $max;

}





function obtenerDepartamentosID(){

	global $conexion;

    $dptos = array();
    
    $sql = "SELECT dept_no FROM departments ORDER BY dept_no";

    foreach ($conexion->query($sql) as $row) {
        $dptos[]=$row['dept_no'];
    }

    return $dptos;
}

function getNombredpto($departamento){

	global $conexion;

    $stmt = $conexion->prepare("SELECT dept_name FROM departments WHERE dept_no= :id");

    $stmt->bindParam(":id", $departamento);

    return $stmt->fetch(PDO::FETCH_ASSOC)["dept_name"];


}


?>