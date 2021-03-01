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


# Funcionalidad: Obtener el ultimo manager que hay en un dpto
# 
function getLastManager($departamento){

    global $conexion;

    $stmt0 = "SELECT emp_no FROM dept_manager WHERE dept_no='$departamento' AND to_date='9999-01-01'";
    
    foreach ($conexion->query($stmt0) as $row) {
        $emp=$row['emp_no'];
    }

    return $emp;

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



function asignarManager($emp_no, $departamento){

    global $conexion;



    $stmt0 = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no=:emp_no");
                $stmt0->bindParam(':emp_no', $emp_no);
    $stmt0->execute();


    if($stmt0->rowCount() != 0){ //si el empleado existe

        $aux1=filtrarManager($emp_no, $departamento);
        $dptoActual=filtrarEmpleado($emp_no);

        if($aux1->rowCount() == 0 && $dptoActual==$departamento) { // si es 0, significa que el nuevo empleado no era anteriormente el manager de ese dpto
        //y ademas si pertenece al departamento del que va a ser jefe

        	$fecha_actual=getFecha();
            $lastManager=getLastManager($departamento);

            echo "<br>Este es last manager: ".$lastManager ."<br>";


        	$stmt = $conexion->prepare("UPDATE dept_manager SET to_date=:to_date WHERE emp_no=:lastManager");
                    $stmt->bindParam(':to_date',$fecha_actual);
                    $stmt->bindParam(':lastManager', $lastManager);

            $stmt->execute();

                  

        	$to_date_Aux='9999-01-01';

            $stmt2 = $conexion->prepare("INSERT INTO dept_manager (emp_no, dept_no, from_date, to_date) VALUES (:emp_no, :dept_no, :from_date, :to_date)");

                $stmt2->bindParam(':emp_no', $emp_no);
                $stmt2->bindParam(':dept_no', $departamento);
                $stmt2->bindParam(':from_date', $fecha_actual);
                $stmt2->bindParam(':to_date', $to_date_Aux);
                
            $stmt2->execute();

            $nombreNuevoDpto=getDptoNombre($departamento);


            echo "El empleado ".$emp_no." es el nuevo manager del dept: ".$nombreNuevoDpto;

        }else{
            echo "ERROR: El empleado tiene que pertenecer al departamento seleccionado, y no puede ser manager actualmente.";
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



# Función 'filtrarManager'
#   
# Funcionalidad: Es una funcion auxiliar para saber si el empleado ya era manager, la usamos en la funcion asignarManager
# 
# Return: $stmt
#
# Realizado: 01/03/2021
# 
# Código por Javier Gonzalez 

function filtrarManager($emp_no, $departamento) {
    
    global $conexion;

    $to_date='9999-01-01';

    $stmt = $conexion->prepare("SELECT emp_no FROM dept_manager WHERE emp_no=:emp_no AND dept_no=:dept_no AND to_date=:to_date");
        $stmt->bindParam(":emp_no", $emp_no);
        $stmt->bindParam(":dept_no", $departamento);
        $stmt->bindParam(":to_date", $to_date);
        $stmt->execute();

        return $stmt;
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
