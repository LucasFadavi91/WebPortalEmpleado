<?php 

session_start();

require_once("../models/model_09_bajaempleado.php");

if (!isset($_POST) || empty($_POST)) {
    require_once("../views/view_09_bajaempleado.php");


}else{
	$emp_no = $_POST['emp_no'];

	if (isset($_POST['modificar'])) {	
		bajaEmpleado($emp_no);
	}
}


?>