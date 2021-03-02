<?php

//session_start();

require_once("../models/model_altaempleado.php");

if (!isset($_POST) || empty($_POST)) {

    $departamentos=obtenerDepartamentos();
    $cargos=obtenerCargos();

    require_once("../views/altamasiva.php");

}else{

    $birth_date = $_POST['nacimiento'];
    $first_name = $_POST['nombre'];
    $last_name  = $_POST['apellido'];
    $gender     = $_POST['genero'];
    $hire_date  = $_POST['altafecha'];
    $salary     = $_POST['salario'];
    $title      = $_POST['cargo'];

    $departamento = $_POST['departamento'];
    $dept_no = getDptoId($departamento);

    
    if(isset($_POST['agregar'])){

        if(!isset($_COOKIE['cesta'])){
        ////Si no está creada la cookie cesta, la creamos con el empleado dentro

            $empleado=array(
                'birth_date' => $_POST['nacimiento'],
                'first_name' => $_POST['nombre'],
                'last_name'  => $_POST['apellido'],
                'gender'     => $_POST['genero'],
                'hire_date'  => $_POST['altafecha'],
                'salary'     => $_POST['salario'],
                'title'      => $_POST['cargo'],
                'dept_no'    => $dept_no
            );

            setcookie('cesta', serialize(array($empleado)), time() + (86400 * 30), "/");

        }else{
        //Si la cookie de cesta ya existe hay que añadir al empleado
            //pero antes hay que unserializar
            $cesta=unserialize($_COOKIE['cesta']);

                $empleado=array(
                    'birth_date' => $_POST['nacimiento'],
                    'first_name' => $_POST['nombre'],
                    'last_name'  => $_POST['apellido'],
                    'gender'     => $_POST['genero'],
                    'hire_date'  => $_POST['altafecha'],
                    'salary'     => $_POST['salario'],
                    'title'      => $_POST['cargo'],
                    'dept_no'    => $dept_no
                ); 

                array_push($cesta, $empleado);
                //hay que actualizar la cookie 
                setcookie('cesta', serialize($cesta), time() + (86400 * 30), "/");

                
            }
              
                /*Para comprobar que realmente se esta añadiendo algo a la lista
                descomentar esta dos lineas.*/
                //var_dump($_COOKIE['cesta']);
                header('refresh: 0');
   
                  
    }else if (isset($_POST['limpiar'])){
    //Para limpiar la variable de cookie cesta hacemos lo siguiente:
        $cesta=array();
        setcookie('cesta', serialize($cesta), time() - (86400 * 30), "/");
        header('refresh: 0');

    }else if (isset($_POST['alta'])){
    //Para dar de alta masivamente    
        
        if(!empty($_COOKIE['cesta'])){//si la cookie no está vacia
            $cesta=unserialize($_COOKIE['cesta']);
            
            foreach($cesta as $emp) {
                //var_dump($emp); 
                $birth_date=$emp['birth_date'];
                $first_name=$emp['first_name'];
                $last_name=$emp['last_name'];
                $gender=$emp['gender'];
                $hire_date=$emp['hire_date'];
                $salary=$emp['salary'];
                $title=$emp['title'];
                $dept_no=$emp['dept_no'];

                //Damos de alta a los nuevos empleados en la bbdd
                $nuevoEmpleado = altaEmpleado($birth_date, $first_name, $last_name , $gender, $hire_date, $dept_no, $salary, $title);
            }    

                require_once("../views/tabla_cesta.php");
                
                $cesta=array();
                setcookie('cesta', serialize($cesta), time() - (86400 * 30), "/");
                //header('refresh: 0');
        }
        else{//si la cookie esta vacio
            echo "No has agregado empleados a la lista";
        }
    }

  
}

?>