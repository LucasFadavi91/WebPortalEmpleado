<?php 
  //session_start();

	if (isset($_SESSION) && isset($_SESSION["userId"]) === false) {
	  exit("No estas logueado, datos incorrectos.");
		//header('location: ../views/controller_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Salario</title>
	<meta charset="utf-8" />
      <style>
        body{
           background-color: silver; 
        }
        .formulario{
    padding: 10px;
    
}

label{
    display: inline-block;
    width: 150px;
}
    </style>
</head>
<body>

<a href="../controllers/controller_login.php"><button>Volver</button></a>
  <h3> Vida laboral </h3>

   <form class="formulario" action="../controllers/controller_vidalaboral.php" method="POST">
                <fieldset>  
                    <label for="emp_no">Codigo Empleado:</label>
                    <input type="text" name="emp_no" size="10" required><br><br>
                
                    <input type="submit" value="Vida laboral" name="laboral">
                </fieldset>
            </form>   


</body>
</html>