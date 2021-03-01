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
           background-color: cornflowerblue; 
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
  <h3> Modifica el Salario </h3>

   <form class="formulario" action="../controllers/controller_modificar_salario.php" method="POST">
                <fieldset>  
                    <label for="emp_no">Codigo Empleado:</label>
                    <input type="text" name="emp_no" size="10" required><br><br>
                    <label for="salary">Salario:</label>
                    <input type="text" name="salary" size="10" required><br><br>

                    <input type="submit" value="Modificar Salario" name="modificar">
                </fieldset>
            </form>   


</body>
</html>