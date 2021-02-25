<?php

session_start();

require_once("../models/model_vidalaboral.php");

if (!isset($_POST) || empty($_POST)) {

    require_once("../views/vidalaboral.php");

}else{

    
    $emp_no = $_POST['emp_no'];
  
   if (isset($_POST['laboral'])) {

        consultarVidaLaboral($emp_no);

        require_once("../views/tabla_vidalaboral.php");
   }
    


}

?>