<?php 

session_start();

require_once("../models/model_salario.php");

if (!isset($_POST) || empty($_POST)) {
    
    require_once("../views/salario.php");


}else{

    $emp_no = $_POST['emp_no'];
    $salary = $_POST['salary'];

   if (isset($_POST['modificar'])) {

   		modificarSalario($emp_no, $salary);
   		
   }
   

}


?>