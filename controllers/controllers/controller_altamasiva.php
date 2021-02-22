<?php

session_start();

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

        if(!isset($_SESSION['cesta'])){
        //Si no está creada la variable de sesion cesta, la creamos con el empleado dentro
            $_SESSION['cesta'][]=array(
                'birth_date' => $_POST['nacimiento'],
                'first_name' => $_POST['nombre'],
                'last_name'  => $_POST['apellido'],
                'gender'     => $_POST['genero'],
                'hire_date'  => $_POST['altafecha'],
                'salary'     => $_POST['salario'],
                'title'      => $_POST['cargo'],
                'dept_no'    => $dept_no
            ); 

        }else{
        //Si la variable de sesion cesta ya existe hay que añadir el empleado    
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

                array_push($_SESSION['cesta'], $empleado);
                
            }
              
                /*Para comprobar que realmente se esta añadiendo algo a la lista
                descomentar esta dos lineas.
                var_dump($_SESSION['cesta']);
                header('refresh: 2');*/
   
                  
    }else if (isset($_POST['limpiar'])){
    //Para limpiar la variable de sesion cesta hacemos lo siguiente:
        $_SESSION['cesta']=array();
        unset($_SESSION['cesta']);
        header('refresh: 0');

    }else if (isset($_POST['alta'])){
    //Para dar de alta masivamente    
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

                array_push($_SESSION['cesta'], $empleado);

        
        foreach($_SESSION['cesta'] as $emp) {
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
            $_SESSION['cesta']=array();
            unset($_SESSION['cesta']);
            //header('refresh: 0');
    }

  
}

?>