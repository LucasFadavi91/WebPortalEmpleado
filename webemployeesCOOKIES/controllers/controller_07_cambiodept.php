<?php 

session_start();

require_once("../models/model_07_cambiodept.php");

if (!isset($_POST) || empty($_POST)) {

	$departamentos=obtenerDepartamentos();

    require_once("../views/view_07_cambiodept.php");


}else{

	$emp_no = $_POST['emp_no'];
    $nombredept = $_POST['departamento'];
    $departamento = getDptoId($nombredept);



   if (isset($_POST['modificar'])) {

   		cambioDepartamento($emp_no, $departamento);
   		
   }
   

}


?>