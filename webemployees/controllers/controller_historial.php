<?php

session_start();

require_once("../models/model_historial.php");

if (!isset($_POST) || empty($_POST)) {

    require_once("../views/historial.php");

}else{

    
    $emp_no = $_POST['emp_no'];
  
   if (isset($_POST['historial'])) {

   	$empleado=comprobarEmp($emp_no);

	   	if ($empleado==true) {
		
	    
	        $stmt=consultarSalarios($emp_no);
	        $stmt1=consultarDepartamentos($emp_no);
	        require_once("../views/tabla_historial.php");

	    }
	}

}

?>