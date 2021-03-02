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
	<title>Cambio de Departamento</title>
	<meta charset="utf-8" />
      <style>
        body{
          background-color: lavender; 
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

  <h3> Baja Empleado </h3>

   <form class="formulario" action="../controllers/controller_09_bajaempleado.php" method="POST">
                <fieldset>  
                    <label for="emp_no">Codigo Empleado:</label>
                    <input type="text" name="emp_no" size="10" required><br><br>


                    <input type="submit" value="Dar de baja" name="modificar">
                </fieldset>
            </form>   


</body>
</html>