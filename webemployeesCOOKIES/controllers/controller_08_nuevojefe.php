<?php 

session_start();

require_once("../models/model_08_nuevojefe.php");

if (!isset($_POST) || empty($_POST)) {

	$departamentos=obtenerDepartamentos();

    require_once("../views/view_08_nuevojefe.php");


}else{

	$emp_no = $_POST['emp_no'];
    $nombredept = $_POST['departamento'];
    $departamento = getDptoId($nombredept);



   if (isset($_POST['modificar'])) {

   		asignarManager($emp_no, $departamento);
   		
   }
   

}


?>