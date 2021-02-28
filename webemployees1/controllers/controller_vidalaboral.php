<?php

session_start();

require_once("../models/model_vidalaboral.php");

if (!isset($_POST) || empty($_POST)) {

    require_once("../views/vidalaboral.php");

}else{

    
    $emp_no = $_POST['emp_no'];
  
   if (isset($_POST['laboral'])) {

   	$empleado=comprobarEmp($emp_no);

	   	if ($empleado==true) {
		
	        $stmt=consultarDatosPersonales($emp_no);
	        $stmt1=consultarSalarios($emp_no);
	        $stmt2=consultarTitulos($emp_no);
	        $stmt3=consultarDepartamentos($emp_no);
	        require_once("../views/tabla_vidalaboral.php");

	    }
	}

}

?>